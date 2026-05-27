<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

final class StoresScopedResource
{
    public readonly StoresCategoriesResource $categories;
    public readonly StoresCustomersResource $customers;
    public readonly StoresOrdersResource $orders;
    public readonly StoresProductsResource $products;

    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        private readonly string $storeResourceId
    ) {
        $this->categories = new StoresCategoriesResource($client, ['storeResourceId' => $this->storeResourceId]);
        $this->customers = new StoresCustomersResource($client, ['storeResourceId' => $this->storeResourceId]);
        $this->orders = new StoresOrdersResource($client, ['storeResourceId' => $this->storeResourceId]);
        $this->products = new StoresProductsResource($client, ['storeResourceId' => $this->storeResourceId]);
    }

    public function products(string $productResourceId): StoresProductsScopedResource
    {
        return new StoresProductsScopedResource($this->client, $this->storeResourceId, $productResourceId);
    }

}
