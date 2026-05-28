<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AsyncTasksResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\AsyncTask_async_task_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/async_tasks', []), query: $query, pathTemplate: '/async_tasks');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\AsyncTask_async_task_read => \Easymailing\Sdk\Generated\Dto\AsyncTask_async_task_read::fromArray($item));
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\AsyncTask_async_task_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/async_tasks/{uuid}', ['uuid' => $uuid]), pathTemplate: '/async_tasks/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AsyncTask_async_task_read::fromArray($data);
    }

}
