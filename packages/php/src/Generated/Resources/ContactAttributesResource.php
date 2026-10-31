<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class ContactAttributesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/contact_attributes', []), query: $query, pathTemplate: '/contact_attributes');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read => \Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ContactAttribute_ContactAttributeCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\ContactAttribute_ContactAttributeCreateInput $body): \Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/contact_attributes', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/contact_attributes');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/contact_attributes/{uuid}', ['uuid' => $uuid]), pathTemplate: '/contact_attributes/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ContactAttribute_ContactAttributeUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\ContactAttribute_ContactAttributeUpdateInput $body): \Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/contact_attributes/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/contact_attributes/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ContactAttribute_ContactAttributeVersionInput $body
     */
    public function archive(string $uuid, array|\Easymailing\Sdk\Generated\Dto\ContactAttribute_ContactAttributeVersionInput $body): \Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/contact_attributes/{uuid}/actions/archive', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/contact_attributes/{uuid}/actions/archive');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\ContactAttribute_ContactAttributeVersionInput $body
     */
    public function restore(string $uuid, array|\Easymailing\Sdk\Generated\Dto\ContactAttribute_ContactAttributeVersionInput $body): \Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/contact_attributes/{uuid}/actions/restore', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/contact_attributes/{uuid}/actions/restore');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ContactAttribute_contact_attribute_read::fromArray($data);
    }

}
