// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class SenderDomainsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_sender_domains"]["parameters"]["query"]>): Promise<Page<components["schemas"]["SenderDomain-sender_domain.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/sender_domains", {  }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["SenderDomain-sender_domain.write"]): Promise<components["schemas"]["SenderDomain-sender_domain.read"]> {
    const result = await this.client.request<components["schemas"]["SenderDomain-sender_domain.read"]>({
      method: "POST",
      path: pathWithParams("/sender_domains", {  }),
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["SenderDomain-sender_domain.read"]> {
    const result = await this.client.request<components["schemas"]["SenderDomain-sender_domain.read"]>({
      method: "GET",
      path: pathWithParams("/sender_domains/{uuid}", { uuid: uuid }),
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/sender_domains/{uuid}", { uuid: uuid }),
    });
    return;
  }

  async authenticate(uuid: string): Promise<components["schemas"]["SenderDomain.SenderDomainAuthenticateOutput-sender_domain.read"]> {
    const result = await this.client.request<components["schemas"]["SenderDomain.SenderDomainAuthenticateOutput-sender_domain.read"]>({
      method: "PUT",
      path: pathWithParams("/sender_domains/{uuid}/actions/authenticate", { uuid: uuid }),
    });
    return result.data;
  }

  async resendVerification(uuid: string): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "POST",
      path: pathWithParams("/sender_domains/{uuid}/actions/resend_verification", { uuid: uuid }),
    });
    return result.data;
  }

}

export function createSenderDomainsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): SenderDomainsResource {
  return new SenderDomainsResource(client, boundParams);
}
