<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class ContactsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Contact_contact_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/contacts', []), query: $query, pathTemplate: '/contacts');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Contact_contact_read => \Easymailing\Sdk\Generated\Dto\Contact_contact_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Contact_ContactCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Contact_ContactCreateInput $body): \Easymailing\Sdk\Generated\Dto\Contact_contact_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/contacts', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/contacts');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Contact_contact_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Contact_contact_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/contacts/{uuid}', ['uuid' => $uuid]), pathTemplate: '/contacts/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Contact_contact_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Contact_ContactUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Contact_ContactUpdateInput $body): \Easymailing\Sdk\Generated\Dto\Contact_contact_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/contacts/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/contacts/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Contact_contact_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/contacts/{uuid}', ['uuid' => $uuid]), pathTemplate: '/contacts/{uuid}');
    }

}
