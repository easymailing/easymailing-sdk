<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

final class AudiencesMembersScopedResource
{
    public readonly AudiencesMembersActivitiesResource $activities;

    public function __construct(
        \Easymailing\Sdk\Easymailing $client,
        private readonly string $audienceUuid,
        private readonly string $memberUuid
    ) {
        $this->activities = new AudiencesMembersActivitiesResource($client, ['audienceUuid' => $this->audienceUuid, 'memberUuid' => $this->memberUuid]);
    }

}
