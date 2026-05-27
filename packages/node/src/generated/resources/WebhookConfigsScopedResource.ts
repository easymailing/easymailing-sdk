// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createWebhookConfigsWebhookEventsResource, type WebhookConfigsWebhookEventsResource } from "./WebhookConfigsWebhookEventsResource.js";
import { createWebhookConfigsWebhookRequestsResource, type WebhookConfigsWebhookRequestsResource } from "./WebhookConfigsWebhookRequestsResource.js";

export class WebhookConfigsScopedResource {
  public readonly webhookEvents: WebhookConfigsWebhookEventsResource;
  public readonly webhookRequests: WebhookConfigsWebhookRequestsResource;

  constructor(private readonly client: Easymailing, private readonly webhookUuid: string) {
    this.webhookEvents = createWebhookConfigsWebhookEventsResource(client, { webhookUuid: webhookUuid });
    this.webhookRequests = createWebhookConfigsWebhookRequestsResource(client, { webhookUuid: webhookUuid });
  }
}
