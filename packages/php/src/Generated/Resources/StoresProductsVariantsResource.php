<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class StoresProductsVariantsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Variant_variant_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/stores/{storeResourceId}/products/{productResourceId}/variants', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'productResourceId' => $this->boundParams['productResourceId'] ?? null]), query: $query);
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Variant_variant_read => \Easymailing\Sdk\Generated\Dto\Variant_variant_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Variant_variant_create $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Variant_variant_create $body): \Easymailing\Sdk\Generated\Dto\Variant_variant_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/stores/{storeResourceId}/products/{productResourceId}/variants', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'productResourceId' => $this->boundParams['productResourceId'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Variant_variant_read::fromArray($data);
    }

    public function get(string $resourceId): \Easymailing\Sdk\Generated\Dto\Variant_variant_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/stores/{storeResourceId}/products/{productResourceId}/variants/{resourceId}', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'productResourceId' => $this->boundParams['productResourceId'] ?? null, 'resourceId' => $resourceId]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Variant_variant_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Variant_variant_update $body
     */
    public function update(string $resourceId, array|\Easymailing\Sdk\Generated\Dto\Variant_variant_update $body): \Easymailing\Sdk\Generated\Dto\Variant_variant_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/stores/{storeResourceId}/products/{productResourceId}/variants/{resourceId}', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'productResourceId' => $this->boundParams['productResourceId'] ?? null, 'resourceId' => $resourceId]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Variant_variant_read::fromArray($data);
    }

    public function delete(string $resourceId): void
    {
        $this->client->request('DELETE', $this->resolvePath('/stores/{storeResourceId}/products/{productResourceId}/variants/{resourceId}', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'productResourceId' => $this->boundParams['productResourceId'] ?? null, 'resourceId' => $resourceId]));
    }

}
