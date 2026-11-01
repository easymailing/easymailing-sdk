<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class BookingPagesOffersResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\BookingOffer_BookingOfferInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\BookingOffer_BookingOfferInput $body): \Easymailing\Sdk\Generated\Dto\BookingOffer_booking_offer_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/booking_pages/{uuid}/offers', ['uuid' => $this->boundParams['uuid'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/booking_pages/{uuid}/offers');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingOffer_booking_offer_read::fromArray($data);
    }

}
