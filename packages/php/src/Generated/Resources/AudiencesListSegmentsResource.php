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
