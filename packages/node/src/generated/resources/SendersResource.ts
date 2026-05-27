// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class SendersResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_senders"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Sender-sender.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/senders", {  }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Sender-sender.write"]): Promise<components["schemas"]["Sender-sender.read"]> {
    const result = await this.client.request<components["schemas"]["Sender-sender.read"]>({
      method: "POST",
      path: pathWithParams("/senders", {  }),
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Sender-sender.read"]> {
    const result = await this.client.request<components["schemas"]["Sender-sender.read"]>({
      method: "GET",
      path: pathWithParams("/senders/{uuid}", { uuid: uuid }),
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/senders/{uuid}", { uuid: uuid }),
    });
    return;
  }

  async resendVerification(uuid: string): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "POST",
      path: pathWithParams("/senders/{uuid}/actions/resend_verification", { uuid: uuid }),
    });
    return result.data;
  }

}

export function createSendersResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): SendersResource {
  return new SendersResource(client, boundParams);
}
