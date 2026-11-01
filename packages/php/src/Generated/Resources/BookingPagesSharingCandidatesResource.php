<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class BookingPagesSharingCandidatesResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\BookingPageSharingCandidate_booking_page_sharing_candidate_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/booking_pages/{uuid}/sharing_candidates', ['uuid' => $this->boundParams['uuid'] ?? null]), query: $query, pathTemplate: '/booking_pages/{uuid}/sharing_candidates');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\BookingPageSharingCandidate_booking_page_sharing_candidate_read => \Easymailing\Sdk\Generated\Dto\BookingPageSharingCandidate_booking_page_sharing_candidate_read::fromArray($item));
    }

}
