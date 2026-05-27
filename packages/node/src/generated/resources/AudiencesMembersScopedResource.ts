// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createAudiencesMembersActivitiesResource, type AudiencesMembersActivitiesResource } from "./AudiencesMembersActivitiesResource.js";

export class AudiencesMembersScopedResource {
  public readonly activities: AudiencesMembersActivitiesResource;

  constructor(private readonly client: Easymailing, private readonly audienceUuid: string, private readonly memberUuid: string) {
    this.activities = createAudiencesMembersActivitiesResource(client, { audienceUuid: audienceUuid, memberUuid: memberUuid });
  }
}
