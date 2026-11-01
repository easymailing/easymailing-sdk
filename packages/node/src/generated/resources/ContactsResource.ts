// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";
import { ContactsScopedResource } from "./ContactsScopedResource.js";

export class ContactsCollectionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_contacts"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Contact-contact.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/contacts", {  }),
      pathTemplate: "/contacts",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Contact.ContactCreateInput"]): Promise<components["schemas"]["Contact-contact.read"]> {
    const result = await this.client.request<components["schemas"]["Contact-contact.read"]>({
      method: "POST",
      path: pathWithParams("/contacts", {  }),
      pathTemplate: "/contacts",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Contact-contact.read"]> {
    const result = await this.client.request<components["schemas"]["Contact-contact.read"]>({
      method: "GET",
      path: pathWithParams("/contacts/{uuid}", { uuid: uuid }),
      pathTemplate: "/contacts/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Contact.ContactUpdateInput"]): Promise<components["schemas"]["Contact-contact.read"]> {
    const result = await this.client.request<components["schemas"]["Contact-contact.read"]>({
      method: "PUT",
      path: pathWithParams("/contacts/{uuid}", { uuid: uuid }),
      pathTemplate: "/contacts/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/contacts/{uuid}", { uuid: uuid }),
      pathTemplate: "/contacts/{uuid}",
    });
    return;
  }

  async count(body: components["schemas"]["ContactCount.ContactCountInput"]): Promise<components["schemas"]["ContactCount-contact_count.read"]> {
    const result = await this.client.request<components["schemas"]["ContactCount-contact_count.read"]>({
      method: "POST",
      path: pathWithParams("/contacts/actions/count", {  }),
      pathTemplate: "/contacts/actions/count",
      body,
    });
    return result.data;
  }

  async search(body: components["schemas"]["ContactSearch.ContactSearchInput"]): Promise<components["schemas"]["ContactSearch-contact_search.read_contact.read"]> {
    const result = await this.client.request<components["schemas"]["ContactSearch-contact_search.read_contact.read"]>({
      method: "POST",
      path: pathWithParams("/contacts/actions/search", {  }),
      pathTemplate: "/contacts/actions/search",
      body,
    });
    return result.data;
  }

  async getEmailOptOut(contactUuid: string): Promise<components["schemas"]["ContactEmailOptOut-contact_email_opt_out.read"]> {
    const result = await this.client.request<components["schemas"]["ContactEmailOptOut-contact_email_opt_out.read"]>({
      method: "GET",
      path: pathWithParams("/contacts/{contactUuid}/email_opt_out", { contactUuid: contactUuid }),
      pathTemplate: "/contacts/{contactUuid}/email_opt_out",
    });
    return result.data;
  }

  async updateEmailOptOut(contactUuid: string): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/contacts/{contactUuid}/email_opt_out", { contactUuid: contactUuid }),
      pathTemplate: "/contacts/{contactUuid}/email_opt_out",
    });
    return result.data;
  }

}

export type ContactsResource = ContactsCollectionResource & ((contactUuid: string) => ContactsScopedResource);

export function createContactsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ContactsResource {
  const collection = new ContactsCollectionResource(client, boundParams);
  const callable = ((contactUuid: string) =>
    new ContactsScopedResource(client, contactUuid)) as ContactsResource;
  Object.setPrototypeOf(callable, ContactsCollectionResource.prototype);
  Object.assign(callable, collection);
  return callable;
}
