<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class ActivityHistoryStatusResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    public function get(): \Easymailing\Sdk\Generated\Dto\ActivityHistoryStatus_activity_history_status_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/activity_history_status', []), pathTemplate: '/activity_history_status');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ActivityHistoryStatus_activity_history_status_read::fromArray($data);
    }

}
