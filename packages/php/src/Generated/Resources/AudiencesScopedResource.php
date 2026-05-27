<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

final class AudiencesScopedResource
{
    public readonly AudiencesConditionFieldsResource $conditionFields;
    public readonly AudiencesGroupsResource $groups;
    public readonly AudiencesListFieldsResource $listFields;
    public readonly AudiencesListSegmentsResource $listSegments;
    public readonly AudiencesMembersResource $members;
    public readonly AudiencesMergeTagsResource $mergeTags;
    public readonly AudiencesSubscriptionFormsResource $subscriptionForms;

    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        private readonly string $audienceUuid
    ) {
        $this->conditionFields = new AudiencesConditionFieldsResource($client, ['audienceUuid' => $this->audienceUuid]);
        $this->groups = new AudiencesGroupsResource($client, ['audienceUuid' => $this->audienceUuid]);
        $this->listFields = new AudiencesListFieldsResource($client, ['audienceUuid' => $this->audienceUuid]);
        $this->listSegments = new AudiencesListSegmentsResource($client, ['audienceUuid' => $this->audienceUuid]);
        $this->members = new AudiencesMembersResource($client, ['audienceUuid' => $this->audienceUuid]);
        $this->mergeTags = new AudiencesMergeTagsResource($client, ['audienceUuid' => $this->audienceUuid]);
        $this->subscriptionForms = new AudiencesSubscriptionFormsResource($client, ['audienceUuid' => $this->audienceUuid]);
    }

    public function members(string $memberUuid): AudiencesMembersScopedResource
    {
        return new AudiencesMembersScopedResource($this->client, $this->audienceUuid, $memberUuid);
    }

}
