// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class WebhookConfigsWebhookEventsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_webhook_events"]["parameters"]["query"]>): Promise<Page<components["schemas"]["WebhookEvent-webhook_event.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/webhooks/{webhookUuid}/webhook_events", { webhookUuid: this.boundParams["webhookUuid"]! }),
      pathTemplate: "/webhooks/{webhookUuid}/webhook_events",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["WebhookEvent-webhook_event.read"]> {
    const result = await this.client.request<components["schemas"]["WebhookEvent-webhook_event.read"]>({
      method: "GET",
      path: pathWithParams("/webhooks/{webhookUuid}/webhook_events/{uuid}", { webhookUuid: this.boundParams["webhookUuid"]!, uuid: uuid }),
      pathTemplate: "/webhooks/{webhookUuid}/webhook_events/{uuid}",
    });
    return result.data;
  }

}

export function createWebhookConfigsWebhookEventsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): WebhookConfigsWebhookEventsResource {
  return new WebhookConfigsWebhookEventsResource(client, boundParams);
}
