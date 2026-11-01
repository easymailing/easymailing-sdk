<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class BookingEmailSendersResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    public function get(): \Easymailing\Sdk\Generated\Dto\BookingEmailSenderCatalog_booking_email_sender_catalog_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/booking_email_senders', []), pathTemplate: '/booking_email_senders');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BookingEmailSenderCatalog_booking_email_sender_catalog_read::fromArray($data);
    }

}
