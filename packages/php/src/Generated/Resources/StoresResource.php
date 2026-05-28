<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class StoresResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Store_store_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/stores', []), query: $query, pathTemplate: '/stores');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Store_store_read => \Easymailing\Sdk\Generated\Dto\Store_store_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Store_store_create $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Store_store_create $body): \Easymailing\Sdk\Generated\Dto\Store_store_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/stores', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/stores');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Store_store_read::fromArray($data);
    }

    public function get(string $resourceId): \Easymailing\Sdk\Generated\Dto\Store_store_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/stores/{resourceId}', ['resourceId' => $resourceId]), pathTemplate: '/stores/{resourceId}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Store_store_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Store_store_update $body
     */
    public function update(string $resourceId, array|\Easymailing\Sdk\Generated\Dto\Store_store_update $body): \Easymailing\Sdk\Generated\Dto\Store_store_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/stores/{resourceId}', ['resourceId' => $resourceId]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/stores/{resourceId}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Store_store_read::fromArray($data);
    }

    public function delete(string $resourceId): void
    {
        $this->client->request('DELETE', $this->resolvePath('/stores/{resourceId}', ['resourceId' => $resourceId]), pathTemplate: '/stores/{resourceId}');
    }

}
