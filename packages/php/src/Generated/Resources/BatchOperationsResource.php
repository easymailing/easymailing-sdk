<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class BatchOperationsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\BatchOperation_batch_operation_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/batch_operations', []), query: $query, pathTemplate: '/batch_operations');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\BatchOperation_batch_operation_read => \Easymailing\Sdk\Generated\Dto\BatchOperation_batch_operation_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\BatchOperation_batch_operation_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\BatchOperation_batch_operation_write $body): \Easymailing\Sdk\Generated\Dto\BatchOperation_batch_operation_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/batch_operations', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/batch_operations');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BatchOperation_batch_operation_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\BatchOperation_batch_operation_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/batch_operations/{uuid}', ['uuid' => $uuid]), pathTemplate: '/batch_operations/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BatchOperation_batch_operation_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/batch_operations/{uuid}', ['uuid' => $uuid]), pathTemplate: '/batch_operations/{uuid}');
    }

    public function regenerateResponseBodyUrl(string $uuid): \Easymailing\Sdk\Generated\Dto\BatchOperationResource
    {
        $result = $this->client->request('PUT', $this->resolvePath('/batch_operations/{uuid}/actions/regenerate_response_body_url', ['uuid' => $uuid]), pathTemplate: '/batch_operations/{uuid}/actions/regenerate_response_body_url');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BatchOperationResource::fromArray($data);
    }

    public function getErrors(string $uuid): \Easymailing\Sdk\Generated\Dto\BatchOperationResource_BatchOperationErrorsResource_batch_operation_errors_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/batch_operations/{uuid}/errors', ['uuid' => $uuid]), pathTemplate: '/batch_operations/{uuid}/errors');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\BatchOperationResource_BatchOperationErrorsResource_batch_operation_errors_read::fromArray($data);
    }

}
