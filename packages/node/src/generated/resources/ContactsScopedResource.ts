// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createContactsAudienceMembershipsResource, type ContactsAudienceMembershipsResource } from "./ContactsAudienceMembershipsResource.js";

export class ContactsScopedResource {
  public readonly audienceMemberships: ContactsAudienceMembershipsResource;

  constructor(private readonly client: Easymailing, private readonly contactUuid: string) {
    this.audienceMemberships = createContactsAudienceMembershipsResource(client, { contactUuid: contactUuid });
  }
}
