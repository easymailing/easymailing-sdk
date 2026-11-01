// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";
import { ContactFilterFieldsScopedResource } from "./ContactFilterFieldsScopedResource.js";

export class ContactFilterFieldsCollectionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_contact_filter_fields"]["parameters"]["query"]>): Promise<Page<components["schemas"]["ContactFilterField-contact_filter_field.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/contact_filter_fields", {  }),
      pathTemplate: "/contact_filter_fields",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(fieldId: string): Promise<components["schemas"]["ContactFilterField-contact_filter_field.read"]> {
    const result = await this.client.request<components["schemas"]["ContactFilterField-contact_filter_field.read"]>({
      method: "GET",
      path: pathWithParams("/contact_filter_fields/{fieldId}", { fieldId: fieldId }),
      pathTemplate: "/contact_filter_fields/{fieldId}",
    });
    return result.data;
  }

}

export type ContactFilterFieldsResource = ContactFilterFieldsCollectionResource & ((fieldId: string) => ContactFilterFieldsScopedResource);

export function createContactFilterFieldsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ContactFilterFieldsResource {
  const collection = new ContactFilterFieldsCollectionResource(client, boundParams);
  const callable = ((fieldId: string) =>
    new ContactFilterFieldsScopedResource(client, fieldId)) as ContactFilterFieldsResource;
  Object.setPrototypeOf(callable, ContactFilterFieldsCollectionResource.prototype);
  Object.assign(callable, collection);
  return callable;
}
