<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AudiencesListSegmentsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/list_segments', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), query: $query, pathTemplate: '/audiences/{audienceUuid}/list_segments');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_read => \Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_write $body): \Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/list_segments', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/list_segments');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/list_segments/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/list_segments/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_write $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_write $body): \Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/list_segments/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/list_segments/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListSegment_list_segment_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/audiences/{audienceUuid}/list_segments/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/list_segments/{uuid}');
    }

    public function addToGroup(string $uuid): \Easymailing\Sdk\Generated\Dto\ListSegment_AsyncTaskResource
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/list_segments/{uuid}/actions/add_to_group', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/list_segments/{uuid}/actions/add_to_group');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListSegment_AsyncTaskResource::fromArray($data);
    }

    public function deleteContacts(string $uuid): \Easymailing\Sdk\Generated\Dto\ListSegment_AsyncTaskResource
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/list_segments/{uuid}/actions/delete_contacts', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/list_segments/{uuid}/actions/delete_contacts');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListSegment_AsyncTaskResource::fromArray($data);
    }

    public function export(string $uuid): \Easymailing\Sdk\Generated\Dto\ListSegment_AsyncTaskResource
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/list_segments/{uuid}/actions/export', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/list_segments/{uuid}/actions/export');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListSegment_AsyncTaskResource::fromArray($data);
    }

    public function removeFromGroup(string $uuid): \Easymailing\Sdk\Generated\Dto\ListSegment_AsyncTaskResource
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/list_segments/{uuid}/actions/remove_from_group', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/list_segments/{uuid}/actions/remove_from_group');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListSegment_AsyncTaskResource::fromArray($data);
    }

    public function unsubscribe(string $uuid): \Easymailing\Sdk\Generated\Dto\ListSegment_AsyncTaskResource
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/list_segments/{uuid}/actions/unsubscribe', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/list_segments/{uuid}/actions/unsubscribe');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListSegment_AsyncTaskResource::fromArray($data);
    }

}
