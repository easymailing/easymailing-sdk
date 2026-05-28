<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class MemberSmsDeliveredEventsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    public function get(): \Easymailing\Sdk\Generated\Dto\MemberSmsDeliveredEvent
    {
        $result = $this->client->request('GET', $this->resolvePath('/member_sms_delivered_events', []), pathTemplate: '/member_sms_delivered_events');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\MemberSmsDeliveredEvent::fromArray($data);
    }

}
