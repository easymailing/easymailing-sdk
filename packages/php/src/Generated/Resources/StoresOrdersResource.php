<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class StoresOrdersResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Order_order_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/stores/{storeResourceId}/orders', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null]), query: $query, pathTemplate: '/stores/{storeResourceId}/orders');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Order_order_read => \Easymailing\Sdk\Generated\Dto\Order_order_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Order_order_create $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Order_order_create $body): \Easymailing\Sdk\Generated\Dto\Order_order_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/stores/{storeResourceId}/orders', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/stores/{storeResourceId}/orders');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Order_order_read::fromArray($data);
    }

    public function get(string $resourceId): \Easymailing\Sdk\Generated\Dto\Order_order_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/stores/{storeResourceId}/orders/{resourceId}', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'resourceId' => $resourceId]), pathTemplate: '/stores/{storeResourceId}/orders/{resourceId}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Order_order_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Order_order_update $body
     */
    public function update(string $resourceId, array|\Easymailing\Sdk\Generated\Dto\Order_order_update $body): \Easymailing\Sdk\Generated\Dto\Order_order_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/stores/{storeResourceId}/orders/{resourceId}', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'resourceId' => $resourceId]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/stores/{storeResourceId}/orders/{resourceId}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Order_order_read::fromArray($data);
    }

    public function delete(string $resourceId): void
    {
        $this->client->request('DELETE', $this->resolvePath('/stores/{storeResourceId}/orders/{resourceId}', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'resourceId' => $resourceId]), pathTemplate: '/stores/{storeResourceId}/orders/{resourceId}');
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\OrderResource_order_cancel_order $body
     */
    public function cancel(string $resourceId, array|\Easymailing\Sdk\Generated\Dto\OrderResource_order_cancel_order $body): \Easymailing\Sdk\Generated\Dto\OrderResource_order_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/stores/{storeResourceId}/orders/{resourceId}/actions/cancel_order', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'resourceId' => $resourceId]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/stores/{storeResourceId}/orders/{resourceId}/actions/cancel_order');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\OrderResource_order_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Order_order_import $body
     */
    public function import(array|\Easymailing\Sdk\Generated\Dto\Order_order_import $body): \Easymailing\Sdk\Generated\Dto\Order_order_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/stores/{storeResourceId}/orders/import', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/stores/{storeResourceId}/orders/import');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Order_order_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\OrderResource_order_pay_order $body
     */
    public function pay(string $resourceId, array|\Easymailing\Sdk\Generated\Dto\OrderResource_order_pay_order $body): \Easymailing\Sdk\Generated\Dto\OrderResource_order_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/stores/{storeResourceId}/orders/{resourceId}/actions/pay_order', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'resourceId' => $resourceId]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/stores/{storeResourceId}/orders/{resourceId}/actions/pay_order');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\OrderResource_order_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\OrderResource_order_process_order $body
     */
    public function process(string $resourceId, array|\Easymailing\Sdk\Generated\Dto\OrderResource_order_process_order $body): \Easymailing\Sdk\Generated\Dto\OrderResource_order_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/stores/{storeResourceId}/orders/{resourceId}/actions/process_order', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'resourceId' => $resourceId]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/stores/{storeResourceId}/orders/{resourceId}/actions/process_order');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\OrderResource_order_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\OrderResource_order_refund_order $body
     */
    public function refund(string $resourceId, array|\Easymailing\Sdk\Generated\Dto\OrderResource_order_refund_order $body): \Easymailing\Sdk\Generated\Dto\OrderResource_order_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/stores/{storeResourceId}/orders/{resourceId}/actions/refund_order', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'resourceId' => $resourceId]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/stores/{storeResourceId}/orders/{resourceId}/actions/refund_order');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\OrderResource_order_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\OrderResource_order_ship_order $body
     */
    public function ship(string $resourceId, array|\Easymailing\Sdk\Generated\Dto\OrderResource_order_ship_order $body): \Easymailing\Sdk\Generated\Dto\OrderResource_order_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/stores/{storeResourceId}/orders/{resourceId}/actions/ship_order', ['storeResourceId' => $this->boundParams['storeResourceId'] ?? null, 'resourceId' => $resourceId]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/stores/{storeResourceId}/orders/{resourceId}/actions/ship_order');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\OrderResource_order_read::fromArray($data);
    }

}
