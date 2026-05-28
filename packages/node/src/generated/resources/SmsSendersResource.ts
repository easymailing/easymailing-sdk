// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class SmsSendersResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_sms_senders"]["parameters"]["query"]>): Promise<Page<components["schemas"]["SmsSender-sms_sender.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/sms_senders", {  }),
      pathTemplate: "/sms_senders",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["SmsSender-sms_sender.write"]): Promise<components["schemas"]["SmsSender-sms_sender.read"]> {
    const result = await this.client.request<components["schemas"]["SmsSender-sms_sender.read"]>({
      method: "POST",
      path: pathWithParams("/sms_senders", {  }),
      pathTemplate: "/sms_senders",
      body,
    });
    return result.data;
  }

  async get(id: string): Promise<components["schemas"]["SmsSender-sms_sender.read"]> {
    const result = await this.client.request<components["schemas"]["SmsSender-sms_sender.read"]>({
      method: "GET",
      path: pathWithParams("/sms_senders/{id}", { id: id }),
      pathTemplate: "/sms_senders/{id}",
    });
    return result.data;
  }

  async delete(id: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/sms_senders/{id}", { id: id }),
      pathTemplate: "/sms_senders/{id}",
    });
    return;
  }

}

export function createSmsSendersResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): SmsSendersResource {
  return new SmsSendersResource(client, boundParams);
}
