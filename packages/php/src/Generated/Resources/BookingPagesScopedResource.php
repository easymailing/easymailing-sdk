<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

final class BookingPagesScopedResource
{
    public readonly BookingPagesEmailDesignsResource $emailDesigns;
    public readonly BookingPagesOffersResource $offers;
    public readonly BookingPagesSharingCandidatesResource $sharingCandidates;

    public function __construct(
        \Easymailing\Sdk\Easymailing $client,
        private readonly string $uuid
    ) {
        $this->emailDesigns = new BookingPagesEmailDesignsResource($client, ['uuid' => $this->uuid]);
        $this->offers = new BookingPagesOffersResource($client, ['uuid' => $this->uuid]);
        $this->sharingCandidates = new BookingPagesSharingCandidatesResource($client, ['uuid' => $this->uuid]);
    }

}
