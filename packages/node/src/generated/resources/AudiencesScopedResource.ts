// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createAudiencesConditionFieldsResource, type AudiencesConditionFieldsResource } from "./AudiencesConditionFieldsResource.js";
import { createAudiencesGroupsResource, type AudiencesGroupsResource } from "./AudiencesGroupsResource.js";
import { createAudiencesListFieldsResource, type AudiencesListFieldsResource } from "./AudiencesListFieldsResource.js";
import { createAudiencesListSegmentsResource, type AudiencesListSegmentsResource } from "./AudiencesListSegmentsResource.js";
import { createAudiencesMembersResource, type AudiencesMembersResource } from "./AudiencesMembersResource.js";
import { createAudiencesMergeTagsResource, type AudiencesMergeTagsResource } from "./AudiencesMergeTagsResource.js";
import { createAudiencesSubscriptionFormsResource, type AudiencesSubscriptionFormsResource } from "./AudiencesSubscriptionFormsResource.js";

export class AudiencesScopedResource {
  public readonly conditionFields: AudiencesConditionFieldsResource;
  public readonly groups: AudiencesGroupsResource;
  public readonly listFields: AudiencesListFieldsResource;
  public readonly listSegments: AudiencesListSegmentsResource;
  public readonly members: AudiencesMembersResource;
  public readonly mergeTags: AudiencesMergeTagsResource;
  public readonly subscriptionForms: AudiencesSubscriptionFormsResource;

  constructor(private readonly client: Easymailing, private readonly audienceUuid: string) {
    this.conditionFields = createAudiencesConditionFieldsResource(client, { audienceUuid: audienceUuid });
    this.groups = createAudiencesGroupsResource(client, { audienceUuid: audienceUuid });
    this.listFields = createAudiencesListFieldsResource(client, { audienceUuid: audienceUuid });
    this.listSegments = createAudiencesListSegmentsResource(client, { audienceUuid: audienceUuid });
    this.members = createAudiencesMembersResource(client, { audienceUuid: audienceUuid });
    this.mergeTags = createAudiencesMergeTagsResource(client, { audienceUuid: audienceUuid });
    this.subscriptionForms = createAudiencesSubscriptionFormsResource(client, { audienceUuid: audienceUuid });
  }
}
