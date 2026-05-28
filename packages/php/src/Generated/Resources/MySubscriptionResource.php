<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class MySubscriptionResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    public function get(): \Easymailing\Sdk\Generated\Dto\MySuscription_my_suscription_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/my_suscription', []), pathTemplate: '/my_suscription');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\MySuscription_my_suscription_read::fromArray($data);
    }

}
