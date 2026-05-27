import type { Transport } from "./Transport.js";
import type { TransportRequest, TransportResponse } from "./types.js";

export interface FetchTransportOptions {
  fetch?: typeof globalThis.fetch;
}

/**
 * Default Transport implementation using the global `fetch` API
 * (Node 20+ ships it natively). Pass a custom `fetch` for testing.
 */
export class FetchTransport implements Transport {
  private readonly fetchImpl: typeof globalThis.fetch;

  constructor(options: FetchTransportOptions = {}) {
    this.fetchImpl = options.fetch ?? globalThis.fetch;
  }

  async send(request: TransportRequest): Promise<TransportResponse> {
    const response = await this.fetchImpl(request.url, {
      method: request.method,
      headers: request.headers,
      body: request.body,
      signal: request.signal,
    });

    const headers: Record<string, string> = {};
    response.headers.forEach((value: string, key: string) => {
      headers[key] = value;
    });

    return {
      status: response.status,
      headers,
      body: await response.text(),
    };
  }
}
