<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AudiencesGroupsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Group_group_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/groups', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), query: $query);
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Group_group_read => \Easymailing\Sdk\Generated\Dto\Group_group_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Group_group_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Group_group_write $body): \Easymailing\Sdk\Generated\Dto\Group_group_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/groups', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Group_group_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Group_group_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/groups/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Group_group_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Group_group_write $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Group_group_write $body): \Easymailing\Sdk\Generated\Dto\Group_group_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/groups/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Group_group_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/audiences/{audienceUuid}/groups/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]));
    }

    public function addFromConditions(string $uuid): \Easymailing\Sdk\Generated\Dto\Group_AsyncTaskResource
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/groups/{uuid}/actions/add_from_conditions', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Group_AsyncTaskResource::fromArray($data);
    }

    public function clear(string $uuid): \Easymailing\Sdk\Generated\Dto\Group_AsyncTaskResource
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/groups/{uuid}/actions/clear', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Group_AsyncTaskResource::fromArray($data);
    }

    public function export(string $uuid): \Easymailing\Sdk\Generated\Dto\Group_AsyncTaskResource
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/groups/{uuid}/actions/export', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Group_AsyncTaskResource::fromArray($data);
    }

    public function removeFromConditions(string $uuid): \Easymailing\Sdk\Generated\Dto\Group_AsyncTaskResource
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/groups/{uuid}/actions/remove_from_conditions', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Group_AsyncTaskResource::fromArray($data);
    }

    public function removeFromSegment(string $uuid): \Easymailing\Sdk\Generated\Dto\Group_AsyncTaskResource
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/groups/{uuid}/actions/remove_from_segment', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Group_AsyncTaskResource::fromArray($data);
    }

}
