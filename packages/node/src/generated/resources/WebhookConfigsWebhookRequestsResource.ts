// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class WebhookConfigsWebhookRequestsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_webhook_requests"]["parameters"]["query"]>): Promise<Page<components["schemas"]["WebhookRequest-webhook_request.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/webhooks/{webhookUuid}/webhook_requests", { webhookUuid: this.boundParams["webhookUuid"]! }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["WebhookRequest-webhook_request.read"]> {
    const result = await this.client.request<components["schemas"]["WebhookRequest-webhook_request.read"]>({
      method: "GET",
      path: pathWithParams("/webhooks/{webhookUuid}/webhook_requests/{uuid}", { webhookUuid: this.boundParams["webhookUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

}

export function createWebhookConfigsWebhookRequestsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): WebhookConfigsWebhookRequestsResource {
  return new WebhookConfigsWebhookRequestsResource(client, boundParams);
}
