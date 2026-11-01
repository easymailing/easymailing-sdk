// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailBatchesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(uuid: string): Promise<components["schemas"]["EmailBatch-email_batch.read"]> {
    const result = await this.client.request<components["schemas"]["EmailBatch-email_batch.read"]>({
      method: "GET",
      path: pathWithParams("/email_batches/{uuid}", { uuid: uuid }),
      pathTemplate: "/email_batches/{uuid}",
    });
    return result.data;
  }

  async cancel(uuid: string): Promise<components["schemas"]["EmailBatch-email_batch.read"]> {
    const result = await this.client.request<components["schemas"]["EmailBatch-email_batch.read"]>({
      method: "PUT",
      path: pathWithParams("/email_batches/{uuid}/actions/cancel", { uuid: uuid }),
      pathTemplate: "/email_batches/{uuid}/actions/cancel",
    });
    return result.data;
  }

  async schedule(body: components["schemas"]["EmailBatch.EmailBatchScheduleInput"]): Promise<components["schemas"]["EmailBatch-email_batch.read"]> {
    const result = await this.client.request<components["schemas"]["EmailBatch-email_batch.read"]>({
      method: "POST",
      path: pathWithParams("/email_batches/actions/schedule", {  }),
      pathTemplate: "/email_batches/actions/schedule",
      body,
    });
    return result.data;
  }

  async send(body: components["schemas"]["EmailBatch.EmailBatchSendInput"]): Promise<components["schemas"]["EmailBatch-email_batch.read"]> {
    const result = await this.client.request<components["schemas"]["EmailBatch-email_batch.read"]>({
      method: "POST",
      path: pathWithParams("/email_batches/actions/send", {  }),
      pathTemplate: "/email_batches/actions/send",
      body,
    });
    return result.data;
  }

  async sendNow(uuid: string): Promise<components["schemas"]["EmailBatch-email_batch.read"]> {
    const result = await this.client.request<components["schemas"]["EmailBatch-email_batch.read"]>({
      method: "PUT",
      path: pathWithParams("/email_batches/{uuid}/actions/send_now", { uuid: uuid }),
      pathTemplate: "/email_batches/{uuid}/actions/send_now",
    });
    return result.data;
  }

}

export function createEmailBatchesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailBatchesResource {
  return new EmailBatchesResource(client, boundParams);
}
