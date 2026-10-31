// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class ContactAttributesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_contact_attributes"]["parameters"]["query"]>): Promise<Page<components["schemas"]["ContactAttribute-contact_attribute.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/contact_attributes", {  }),
      pathTemplate: "/contact_attributes",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["ContactAttribute.ContactAttributeCreateInput"]): Promise<components["schemas"]["ContactAttribute-contact_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["ContactAttribute-contact_attribute.read"]>({
      method: "POST",
      path: pathWithParams("/contact_attributes", {  }),
      pathTemplate: "/contact_attributes",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["ContactAttribute-contact_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["ContactAttribute-contact_attribute.read"]>({
      method: "GET",
      path: pathWithParams("/contact_attributes/{uuid}", { uuid: uuid }),
      pathTemplate: "/contact_attributes/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["ContactAttribute.ContactAttributeUpdateInput"]): Promise<components["schemas"]["ContactAttribute-contact_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["ContactAttribute-contact_attribute.read"]>({
      method: "PUT",
      path: pathWithParams("/contact_attributes/{uuid}", { uuid: uuid }),
      pathTemplate: "/contact_attributes/{uuid}",
      body,
    });
    return result.data;
  }

  async archive(uuid: string, body: components["schemas"]["ContactAttribute.ContactAttributeVersionInput"]): Promise<components["schemas"]["ContactAttribute-contact_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["ContactAttribute-contact_attribute.read"]>({
      method: "PUT",
      path: pathWithParams("/contact_attributes/{uuid}/actions/archive", { uuid: uuid }),
      pathTemplate: "/contact_attributes/{uuid}/actions/archive",
      body,
    });
    return result.data;
  }

  async restore(uuid: string, body: components["schemas"]["ContactAttribute.ContactAttributeVersionInput"]): Promise<components["schemas"]["ContactAttribute-contact_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["ContactAttribute-contact_attribute.read"]>({
      method: "PUT",
      path: pathWithParams("/contact_attributes/{uuid}/actions/restore", { uuid: uuid }),
      pathTemplate: "/contact_attributes/{uuid}/actions/restore",
      body,
    });
    return result.data;
  }

}

export function createContactAttributesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ContactAttributesResource {
  return new ContactAttributesResource(client, boundParams);
}
