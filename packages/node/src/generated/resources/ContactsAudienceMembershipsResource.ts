// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class ContactsAudienceMembershipsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_contact_audience_memberships"]["parameters"]["query"]>): Promise<Page<components["schemas"]["ContactAudienceMembership-contact_audience_membership.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/contacts/{contactUuid}/audience_memberships", { contactUuid: this.boundParams["contactUuid"]! }),
      pathTemplate: "/contacts/{contactUuid}/audience_memberships",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async update(audienceUuid: string, body: components["schemas"]["ContactAudienceMembership.ContactMembershipChannelsInput"], query?: NonNullable<operations["subscribe_contact_to_audience"]["parameters"]["query"]>): Promise<components["schemas"]["ContactAudienceMembership-contact_audience_membership.read"]> {
    const result = await this.client.request<components["schemas"]["ContactAudienceMembership-contact_audience_membership.read"]>({
      method: "PUT",
      path: pathWithParams("/contacts/{contactUuid}/audience_memberships/{audienceUuid}", { contactUuid: this.boundParams["contactUuid"]!, audienceUuid: audienceUuid }),
      pathTemplate: "/contacts/{contactUuid}/audience_memberships/{audienceUuid}",
      query: query as Record<string, string | number | boolean> | undefined,
      body,
    });
    return result.data;
  }

  async delete(audienceUuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/contacts/{contactUuid}/audience_memberships/{audienceUuid}", { contactUuid: this.boundParams["contactUuid"]!, audienceUuid: audienceUuid }),
      pathTemplate: "/contacts/{contactUuid}/audience_memberships/{audienceUuid}",
    });
    return;
  }

  async unsubscribe(audienceUuid: string, body: components["schemas"]["ContactAudienceMembership.ContactMembershipChannelsInput.unsubscribe_contact_from_audience"]): Promise<components["schemas"]["ContactAudienceMembership-contact_audience_membership.read"]> {
    const result = await this.client.request<components["schemas"]["ContactAudienceMembership-contact_audience_membership.read"]>({
      method: "PUT",
      path: pathWithParams("/contacts/{contactUuid}/audience_memberships/{audienceUuid}/actions/unsubscribe", { contactUuid: this.boundParams["contactUuid"]!, audienceUuid: audienceUuid }),
      pathTemplate: "/contacts/{contactUuid}/audience_memberships/{audienceUuid}/actions/unsubscribe",
      body,
    });
    return result.data;
  }

}

export function createContactsAudienceMembershipsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ContactsAudienceMembershipsResource {
  return new ContactsAudienceMembershipsResource(client, boundParams);
}
