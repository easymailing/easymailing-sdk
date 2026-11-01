<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class ContactFilterFieldsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\ContactFilterField_contact_filter_field_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/contact_filter_fields', []), query: $query, pathTemplate: '/contact_filter_fields');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\ContactFilterField_contact_filter_field_read => \Easymailing\Sdk\Generated\Dto\ContactFilterField_contact_filter_field_read::fromArray($item));
    }

    public function get(string $fieldId): \Easymailing\Sdk\Generated\Dto\ContactFilterField_contact_filter_field_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/contact_filter_fields/{fieldId}', ['fieldId' => $fieldId]), pathTemplate: '/contact_filter_fields/{fieldId}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\ContactFilterField_contact_filter_field_read::fromArray($data);
    }

}
