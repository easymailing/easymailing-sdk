<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AudiencesListFieldsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\ListField_list_field_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/list_fields', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), query: $query, pathTemplate: '/audiences/{audienceUuid}/list_fields');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\ListField_list_field_read => \Easymailing\Sdk\Generated\Dto\ListField_list_field_read::fromArray($item));
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\ListField_list_field_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/audiences/{audienceUuid}/list_fields/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/list_fields/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListField_list_field_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/audiences/{audienceUuid}/list_fields/{uuid}', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/audiences/{audienceUuid}/list_fields/{uuid}');
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ListField_CustomFieldMultiselect_list_field_write $body
     */
    public function createMultiselect(array|\Easymailing\Sdk\Generated\Dto\ListField_CustomFieldMultiselect_list_field_write $body): \Easymailing\Sdk\Generated\Dto\ListField_list_field_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/list_fields/multiselect', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/list_fields/multiselect');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListField_list_field_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ListField_CustomFieldSelect_list_field_write $body
     */
    public function createSelect(array|\Easymailing\Sdk\Generated\Dto\ListField_CustomFieldSelect_list_field_write $body): \Easymailing\Sdk\Generated\Dto\ListField_list_field_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/list_fields/select', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/list_fields/select');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListField_list_field_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ListField_CustomFieldSimple_list_field_write $body
     */
    public function createSimple(array|\Easymailing\Sdk\Generated\Dto\ListField_CustomFieldSimple_list_field_write $body): \Easymailing\Sdk\Generated\Dto\ListField_list_field_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/audiences/{audienceUuid}/list_fields/simple', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/list_fields/simple');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListField_list_field_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ListField_CustomFieldMultiselect_list_field_write $body
     */
    public function updateMultiselect(string $uuid, array|\Easymailing\Sdk\Generated\Dto\ListField_CustomFieldMultiselect_list_field_write $body): \Easymailing\Sdk\Generated\Dto\ListField_list_field_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/list_fields/{uuid}/multiselect', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/list_fields/{uuid}/multiselect');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListField_list_field_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ListField_CustomFieldSelect_list_field_write $body
     */
    public function updateSelect(string $uuid, array|\Easymailing\Sdk\Generated\Dto\ListField_CustomFieldSelect_list_field_write $body): \Easymailing\Sdk\Generated\Dto\ListField_list_field_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/list_fields/{uuid}/select', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/list_fields/{uuid}/select');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListField_list_field_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ListField_CustomFieldSimple_list_field_write $body
     */
    public function updateSimple(string $uuid, array|\Easymailing\Sdk\Generated\Dto\ListField_CustomFieldSimple_list_field_write $body): \Easymailing\Sdk\Generated\Dto\ListField_list_field_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/audiences/{audienceUuid}/list_fields/{uuid}/simple', ['audienceUuid' => $this->boundParams['audienceUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/audiences/{audienceUuid}/list_fields/{uuid}/simple');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ListField_list_field_read::fromArray($data);
    }

}
