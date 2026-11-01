// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailSendsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_email_sends"]["parameters"]["query"]>): Promise<Page<components["schemas"]["EmailSend-email_send.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/email_sends", {  }),
      pathTemplate: "/email_sends",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["EmailSend-email_send.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSend-email_send.read"]>({
      method: "GET",
      path: pathWithParams("/email_sends/{uuid}", { uuid: uuid }),
      pathTemplate: "/email_sends/{uuid}",
    });
    return result.data;
  }

  async cancel(uuid: string): Promise<components["schemas"]["EmailSend-email_send.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSend-email_send.read"]>({
      method: "PUT",
      path: pathWithParams("/email_sends/{uuid}/actions/cancel", { uuid: uuid }),
      pathTemplate: "/email_sends/{uuid}/actions/cancel",
    });
    return result.data;
  }

  async cancelAll(): Promise<components["schemas"]["EmailSendCancellation-email_send_cancellation.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSendCancellation-email_send_cancellation.read"]>({
      method: "PUT",
      path: pathWithParams("/email_sends/actions/cancel_all", {  }),
      pathTemplate: "/email_sends/actions/cancel_all",
    });
    return result.data;
  }

  async discard(uuid: string): Promise<components["schemas"]["EmailSend-email_send.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSend-email_send.read"]>({
      method: "PUT",
      path: pathWithParams("/email_sends/{uuid}/actions/discard", { uuid: uuid }),
      pathTemplate: "/email_sends/{uuid}/actions/discard",
    });
    return result.data;
  }

  async reopen(uuid: string): Promise<components["schemas"]["EmailSendReopening-email_send_reopening.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSendReopening-email_send_reopening.read"]>({
      method: "POST",
      path: pathWithParams("/email_sends/{uuid}/actions/reopen", { uuid: uuid }),
      pathTemplate: "/email_sends/{uuid}/actions/reopen",
    });
    return result.data;
  }

  async retry(uuid: string): Promise<components["schemas"]["EmailSend-email_send.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSend-email_send.read"]>({
      method: "PUT",
      path: pathWithParams("/email_sends/{uuid}/actions/retry", { uuid: uuid }),
      pathTemplate: "/email_sends/{uuid}/actions/retry",
    });
    return result.data;
  }

  async schedule(body: components["schemas"]["EmailSend.EmailScheduleInput"]): Promise<components["schemas"]["EmailSend-email_send.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSend-email_send.read"]>({
      method: "POST",
      path: pathWithParams("/email_sends/actions/schedule", {  }),
      pathTemplate: "/email_sends/actions/schedule",
      body,
    });
    return result.data;
  }

  async send(body: components["schemas"]["EmailSend.EmailSendInput"]): Promise<components["schemas"]["EmailSend-email_send.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSend-email_send.read"]>({
      method: "POST",
      path: pathWithParams("/email_sends/actions/send", {  }),
      pathTemplate: "/email_sends/actions/send",
      body,
    });
    return result.data;
  }

  async sendNow(uuid: string): Promise<components["schemas"]["EmailSend-email_send.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSend-email_send.read"]>({
      method: "PUT",
      path: pathWithParams("/email_sends/{uuid}/actions/send_now", { uuid: uuid }),
      pathTemplate: "/email_sends/{uuid}/actions/send_now",
    });
    return result.data;
  }

}

export function createEmailSendsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailSendsResource {
  return new EmailSendsResource(client, boundParams);
}
