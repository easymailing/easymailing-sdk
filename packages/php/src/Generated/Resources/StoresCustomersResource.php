<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class StoresCustomersResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Customer_customer_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/stores/{storeResourceId}/customers', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null]), query: $query);
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Customer_customer_read => \Easymailing\Sdk\Generated\Dto\Customer_customer_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Customer_customer_create $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Customer_customer_create $body, ?bool $disableDoubleOptIn = null, ?bool $disableWelcomeEmail = null, ?bool $disableSmsDoubleOptIn = null): \Easymailing\Sdk\Generated\Dto\Customer_customer_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/stores/{storeResourceId}/customers', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null]), body: is_array($body) ? $body : $body->toArray(), query: array_filter(['disableDoubleOptIn' => $disableDoubleOptIn, 'disableWelcomeEmail' => $disableWelcomeEmail, 'disableSmsDoubleOptIn' => $disableSmsDoubleOptIn], static fn($value): bool => $value !== null));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Customer_customer_read::fromArray($data);
    }

    public function get(string $resourceId): \Easymailing\Sdk\Generated\Dto\Customer_customer_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/stores/{storeResourceId}/customers/{resourceId}', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'resourceId' => $resourceId]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Customer_customer_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Customer_customer_update $body
     */
    public function update(string $resourceId, array|\Easymailing\Sdk\Generated\Dto\Customer_customer_update $body): \Easymailing\Sdk\Generated\Dto\Customer_customer_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/stores/{storeResourceId}/customers/{resourceId}', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'resourceId' => $resourceId]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Customer_customer_read::fromArray($data);
    }

    public function delete(string $resourceId, ?bool $unsubscribe = null): void
    {
        $this->client->request('DELETE', $this->resolvePath('/stores/{storeResourceId}/customers/{resourceId}', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'resourceId' => $resourceId]), query: array_filter(['unsubscribe' => $unsubscribe], static fn($value): bool => $value !== null));
    }

}
