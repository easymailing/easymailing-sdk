<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class ListSegmentConditionsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    public function get(): \Easymailing\Sdk\Generated\Dto\ListSegmentCondition
    {
        $result = $this->client->request('GET', $this->resolvePath('/list_segment_conditions', []));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListSegmentCondition::fromArray($data);
    }

}
