<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

final class ContactsScopedResource
{
    public readonly ContactsAudienceMembershipsResource $audienceMemberships;

    public function __construct(
        \Easymailing\Sdk\Easymailing $client,
        private readonly string $contactUuid
    ) {
        $this->audienceMemberships = new ContactsAudienceMembershipsResource($client, ['contactUuid' => $this->contactUuid]);
    }

}
