<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class BookingPagesEmailDesignsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\BookingEmailDesign_BookingEmailRestoreInput $body
     */
    public function restoreDefault(string $type, array|\Easymailing\Sdk\Generated\Dto\BookingEmailDesign_BookingEmailRestoreInput $body): \Easymailing\Sdk\Generated\Dto\BookingEmailDesign_booking_email_design_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/booking_pages/{uuid}/email_designs/{type}/actions/restore_default', ['uuid' => $this->boundParams['uuid'] ?? null, 'type' => $type]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/booking_pages/{uuid}/email_designs/{type}/actions/restore_default');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingEmailDesign_booking_email_design_read::fromArray($data);
    }

}
