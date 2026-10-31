<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class TasksResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Task_task_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/tasks', []), query: $query, pathTemplate: '/tasks');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Task_task_read => \Easymailing\Sdk\Generated\Dto\Task_task_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Task_TaskCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Task_TaskCreateInput $body): \Easymailing\Sdk\Generated\Dto\Task_task_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/tasks', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/tasks');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Task_task_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Task_task_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/tasks/{uuid}', ['uuid' => $uuid]), pathTemplate: '/tasks/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Task_task_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Task_TaskUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Task_TaskUpdateInput $body): \Easymailing\Sdk\Generated\Dto\Task_task_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/tasks/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/tasks/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Task_task_read::fromArray($data);
    }

    public function delete(string $uuid, ?int $expectedVersion = null): void
    {
        $this->client->request('DELETE', $this->resolvePath('/tasks/{uuid}', ['uuid' => $uuid]), query: array_filter(['expected_version' => $expectedVersion], static fn($value): bool => $value !== null), pathTemplate: '/tasks/{uuid}');
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Task_TaskAssignInput $body
     */
    public function assign(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Task_TaskAssignInput $body): \Easymailing\Sdk\Generated\Dto\Task_task_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/tasks/{uuid}/actions/assign', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/tasks/{uuid}/actions/assign');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Task_task_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Task_TaskVersionInput $body
     */
    public function complete(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Task_TaskVersionInput $body): \Easymailing\Sdk\Generated\Dto\Task_task_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/tasks/{uuid}/actions/complete', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/tasks/{uuid}/actions/complete');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Task_task_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Task_TaskReopenInput $body
     */
    public function reopen(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Task_TaskReopenInput $body): \Easymailing\Sdk\Generated\Dto\Task_task_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/tasks/{uuid}/actions/reopen', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/tasks/{uuid}/actions/reopen');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Task_task_read::fromArray($data);
    }

}
