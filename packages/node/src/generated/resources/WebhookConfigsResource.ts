// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";
import { WebhookConfigsScopedResource } from "./WebhookConfigsScopedResource.js";

export class WebhookConfigsCollectionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_webhooks"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Webhook-webhook.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/webhooks", {  }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Webhook-webhook.write"]): Promise<components["schemas"]["Webhook-webhook.read"]> {
    const result = await this.client.request<components["schemas"]["Webhook-webhook.read"]>({
      method: "POST",
      path: pathWithParams("/webhooks", {  }),
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Webhook-webhook.read"]> {
    const result = await this.client.request<components["schemas"]["Webhook-webhook.read"]>({
      method: "GET",
      path: pathWithParams("/webhooks/{uuid}", { uuid: uuid }),
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Webhook-webhook.write"]): Promise<components["schemas"]["Webhook-webhook.read"]> {
    const result = await this.client.request<components["schemas"]["Webhook-webhook.read"]>({
      method: "PUT",
      path: pathWithParams("/webhooks/{uuid}", { uuid: uuid }),
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/webhooks/{uuid}", { uuid: uuid }),
    });
    return;
  }

}

export type WebhookConfigsResource = WebhookConfigsCollectionResource & ((webhookUuid: string) => WebhookConfigsScopedResource);

export function createWebhookConfigsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): WebhookConfigsResource {
  const collection = new WebhookConfigsCollectionResource(client, boundParams);
  const callable = ((webhookUuid: string) =>
    new WebhookConfigsScopedResource(client, webhookUuid)) as WebhookConfigsResource;
  Object.setPrototypeOf(callable, WebhookConfigsCollectionResource.prototype);
  Object.assign(callable, collection);
  return callable;
}
