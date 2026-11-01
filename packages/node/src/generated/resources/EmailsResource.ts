// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";
import { EmailsScopedResource } from "./EmailsScopedResource.js";

export class EmailsCollectionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_emails"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Email-email.list"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/emails", {  }),
      pathTemplate: "/emails",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string, query?: NonNullable<operations["get_email"]["parameters"]["query"]>): Promise<components["schemas"]["Email-email.read"]> {
    const result = await this.client.request<components["schemas"]["Email-email.read"]>({
      method: "GET",
      path: pathWithParams("/emails/{uuid}", { uuid: uuid }),
      pathTemplate: "/emails/{uuid}",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return result.data;
  }

  async getAccessGrants(uuid: string, query?: NonNullable<operations["get_email_access_grants"]["parameters"]["query"]>): Promise<components["schemas"]["EmailAccessGrants-email_access_grants.read"]> {
    const result = await this.client.request<components["schemas"]["EmailAccessGrants-email_access_grants.read"]>({
      method: "GET",
      path: pathWithParams("/emails/{uuid}/access_grants", { uuid: uuid }),
      pathTemplate: "/emails/{uuid}/access_grants",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return result.data;
  }

  async getInlineImages(uuid: string, query?: NonNullable<operations["get_email_inline_images"]["parameters"]["query"]>): Promise<components["schemas"]["EmailInlineImages-email_inline_images.read"]> {
    const result = await this.client.request<components["schemas"]["EmailInlineImages-email_inline_images.read"]>({
      method: "GET",
      path: pathWithParams("/emails/{uuid}/inline_images", { uuid: uuid }),
      pathTemplate: "/emails/{uuid}/inline_images",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return result.data;
  }

  async updateAccessGrants(uuid: string, body: components["schemas"]["EmailAccessGrants.EmailAccessGrantsInput"], query?: NonNullable<operations["set_email_access_grants"]["parameters"]["query"]>): Promise<components["schemas"]["EmailAccessGrants-email_access_grants.read"]> {
    const result = await this.client.request<components["schemas"]["EmailAccessGrants-email_access_grants.read"]>({
      method: "PUT",
      path: pathWithParams("/emails/{uuid}/access_grants", { uuid: uuid }),
      pathTemplate: "/emails/{uuid}/access_grants",
      query: query as Record<string, string | number | boolean> | undefined,
      body,
    });
    return result.data;
  }

}

export type EmailsResource = EmailsCollectionResource & ((emailUuid: string) => EmailsScopedResource);

export function createEmailsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailsResource {
  const collection = new EmailsCollectionResource(client, boundParams);
  const callable = ((emailUuid: string) =>
    new EmailsScopedResource(client, emailUuid)) as EmailsResource;
  Object.setPrototypeOf(callable, EmailsCollectionResource.prototype);
  Object.assign(callable, collection);
  return callable;
}
