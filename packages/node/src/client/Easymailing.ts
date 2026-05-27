import { FetchTransport } from "../transport/FetchTransport.js";
import type { Transport } from "../transport/Transport.js";
import type {
  HttpMethod,
  TransportRequest,
  TransportResponse,
} from "../transport/types.js";
import { fromResponse } from "../errors/fromResponse.js";
import { NetworkError } from "../errors/NetworkError.js";
import { MalformedResponseError } from "../errors/MalformedResponseError.js";
import { RateLimitError } from "../errors/RateLimitError.js";
import { RetryPolicy } from "../retry/RetryPolicy.js";
import { shouldRetry } from "../retry/shouldRetry.js";
import {
  parseRateLimit,
  type RateLimitInfo,
} from "../ratelimit/parseRateLimit.js";
import { buildUserAgent } from "../telemetry/userAgent.js";
import type { RequestHook, ResponseHook } from "../telemetry/hooks.js";
import { BatchClient } from "../batch/BatchClient.js";
import { WebhooksClient } from "../webhooks/WebhooksClient.js";
import { parseCollection } from "../hydra/parseCollection.js";
import { parseEntity } from "../hydra/parseEntity.js";
import { wireResources, type GeneratedResources } from "../generated/resources/wire.js";

export interface EasymailingOptions {
  apiKey?: string;
  accessToken?: string;
  baseUrl?: string;
  transport?: Transport;
  maxRetries?: number;
  debug?: boolean;
  onRequest?: RequestHook;
  onResponse?: ResponseHook;
  version?: string;
}

export interface RequestArgs {
  method: HttpMethod;
  path: string;
  query?: Record<string, string | number | boolean>;
  body?: unknown;
  headers?: Record<string, string>;
}

export interface RequestResult<T> {
  data: T;
  rateLimit: RateLimitInfo;
  raw: unknown;
}

/**
 * Main SDK entry point. Composes transport, retries, error mapping, Hydra parsing
 * and exposes a generic `request()` plus a `batch` sub-client.
 */
export interface Easymailing extends GeneratedResources {}

export class Easymailing {
  public readonly batch: BatchClient;
  public readonly webhooks: WebhooksClient;
  private readonly transport: Transport;
  private readonly baseUrl: string;
  private readonly retryPolicy: RetryPolicy;
  private readonly authHeader: () => Record<string, string>;
  private readonly userAgent: string;
  private readonly onRequest?: RequestHook;
  private readonly onResponse?: ResponseHook;
  private readonly debug: boolean;

  constructor(options: EasymailingOptions) {
    if (options.apiKey === undefined && options.accessToken === undefined) {
      throw new Error("Easymailing: provide either apiKey or accessToken");
    }
    if (options.apiKey !== undefined && options.accessToken !== undefined) {
      throw new Error("Easymailing: provide either apiKey OR accessToken, not both");
    }
    if (options.apiKey !== undefined && options.apiKey === "") {
      throw new Error("Easymailing: apiKey cannot be empty");
    }
    if (options.accessToken !== undefined && options.accessToken === "") {
      throw new Error("Easymailing: accessToken cannot be empty");
    }
    this.baseUrl = (options.baseUrl ?? "https://api.easymailing.com").replace(/\/$/, "");
    this.transport = options.transport ?? new FetchTransport();
    this.retryPolicy = new RetryPolicy({ maxRetries: options.maxRetries });
    this.userAgent = buildUserAgent(options.version ?? "0.0.0");
    this.onRequest = options.onRequest;
    this.onResponse = options.onResponse;
    this.debug = options.debug ?? false;

    if (options.apiKey) {
      const key = options.apiKey;
      this.authHeader = () => ({ "X-Auth-Token": key });
    } else {
      const token = options.accessToken!;
      this.authHeader = () => ({ Authorization: `Bearer ${token}` });
    }

    this.batch = new BatchClient({
      client: this,
      transport: this.transport,
    });
    this.webhooks = new WebhooksClient();
    Object.assign(this, wireResources(this));
  }

  async request<T = unknown>(args: RequestArgs): Promise<RequestResult<T>> {
    const url = this.buildUrl(args.path, args.query);
    const request: TransportRequest = {
      method: args.method,
      url,
      headers: { ...this.commonHeaders(), ...(args.headers ?? {}) },
      body: args.body === undefined ? undefined : JSON.stringify(args.body),
    };

    let attempt = 0;
    while (true) {
      let response: TransportResponse;
      if (this.debug) console.error(`[easymailing] → ${args.method} ${url}`);
      this.onRequest?.(request);
      try {
        response = await this.transport.send(request);
      } catch (err) {
        throw new NetworkError("Network request failed", err);
      }
      this.onResponse?.(response, request);
      if (this.debug) console.error(`[easymailing] ← ${response.status} ${url}`);

      if (response.status >= 200 && response.status < 300) {
        const rateLimit = parseRateLimit(response.headers);
        let raw: unknown = null;
        if (response.body !== "") {
          try {
            raw = JSON.parse(response.body);
          } catch (err) {
            throw new MalformedResponseError(
              `Response body is not valid JSON (status ${response.status})`,
              response.status,
              response.body,
              err,
            );
          }
        }
        const data = parseAsHydraIfPossible<T>(raw);
        return { data, rateLimit, raw };
      }

      if (attempt < this.retryPolicy.maxRetries && shouldRetry(args.method, response.status)) {
        const err = fromResponse(response);
        const retryAfter = err instanceof RateLimitError ? err.retryAfterSeconds : null;
        const delay = this.retryPolicy.computeDelay(attempt, retryAfter);
        attempt++;
        await new Promise((r) => setTimeout(r, delay));
        continue;
      }

      throw fromResponse(response);
    }
  }

  private commonHeaders(): Record<string, string> {
    return {
      ...this.authHeader(),
      Accept: "application/ld+json",
      "User-Agent": this.userAgent,
    };
  }

  private buildUrl(
    path: string,
    query: Record<string, string | number | boolean> | undefined,
  ): string {
    // Normalize path: ensure single leading slash, collapse any "//" run after.
    let cleanPath = path.startsWith("/") ? path : `/${path}`;
    cleanPath = cleanPath.replace(/\/{2,}/g, "/");

    // Encode path segments (keep "/" as separator). Skip if path already contains
    // a query string — we'll merge on the existing separator.
    const parts = cleanPath.split("?", 2);
    const pathOnly = parts[0] ?? "/";
    const existingQs = parts[1] ?? "";
    const encodedPath = pathOnly
      .split("/")
      .map((s) => encodeURIComponent(s))
      .join("/");

    if ((!query || Object.keys(query).length === 0) && existingQs === "") {
      return `${this.baseUrl}${encodedPath}`;
    }

    const params = new URLSearchParams(existingQs);
    if (query) {
      for (const [k, v] of Object.entries(query)) {
        // Booleans serialize as "true"/"false" for parity with PHP (which we normalize
        // explicitly below). Numbers via String(). Strings as-is.
        const serialized = typeof v === "boolean" ? (v ? "true" : "false") : String(v);
        params.set(k, serialized);
      }
    }
    return `${this.baseUrl}${encodedPath}?${params.toString()}`;
  }
}

function parseAsHydraIfPossible<T>(raw: unknown): T {
  if (raw === null || typeof raw !== "object") return raw as T;
  const obj = raw as Record<string, unknown>;
  if (obj["hydra:member"] !== undefined) {
    return parseCollection(obj) as unknown as T;
  }
  return parseEntity(obj) as unknown as T;
}
