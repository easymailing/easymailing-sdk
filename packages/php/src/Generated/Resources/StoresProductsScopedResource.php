<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

final class StoresProductsScopedResource
{
    public readonly StoresProductsVariantsResource $variants;

    public function __construct(
        \Easymailing\Sdk\Easymailing $client,
        private readonly string $storeResourceId,
        private readonly string $productResourceId
    ) {
        $this->variants = new StoresProductsVariantsResource($client, ['storeResourceId' => $this->storeResourceId, 'productResourceId' => $this->productResourceId]);
    }

}
