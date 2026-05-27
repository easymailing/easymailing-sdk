<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class DataManagersResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\DataManager_data_manager_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/data_managers', []), query: $query);
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\DataManager_data_manager_read => \Easymailing\Sdk\Generated\Dto\DataManager_data_manager_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\DataManager_data_manager_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\DataManager_data_manager_write $body): \Easymailing\Sdk\Generated\Dto\DataManager_data_manager_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/data_managers', []), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\DataManager_data_manager_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\DataManager_data_manager_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/data_managers/{uuid}', ['uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\DataManager_data_manager_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\DataManager_data_manager_write $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\DataManager_data_manager_write $body): \Easymailing\Sdk\Generated\Dto\DataManager_data_manager_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/data_managers/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\DataManager_data_manager_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/data_managers/{uuid}', ['uuid' => $uuid]));
    }

}
