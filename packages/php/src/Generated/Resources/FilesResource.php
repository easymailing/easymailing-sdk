<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class FilesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\File_file_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/files', []), query: $query, pathTemplate: '/files');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\File_file_read => \Easymailing\Sdk\Generated\Dto\File_file_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\File_FileCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\File_FileCreateInput $body): \Easymailing\Sdk\Generated\Dto\File_file_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/files', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/files');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\File_file_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\File_file_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/files/{uuid}', ['uuid' => $uuid]), pathTemplate: '/files/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\File_file_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\File_FileUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\File_FileUpdateInput $body): \Easymailing\Sdk\Generated\Dto\File_file_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/files/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/files/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\File_file_read::fromArray($data);
    }

    public function delete(string $uuid, ?int $expectedVersion = null): void
    {
        $this->client->request('DELETE', $this->resolvePath('/files/{uuid}', ['uuid' => $uuid]), query: array_filter(['expected_version' => $expectedVersion], static fn($value): bool => $value !== null), pathTemplate: '/files/{uuid}');
    }

    /**
     * @return array<string, mixed>
     */
    public function getContent(string $uuid): array
    {
        $result = $this->client->request('GET', $this->resolvePath('/files/{uuid}/content', ['uuid' => $uuid]), pathTemplate: '/files/{uuid}/content');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

    public function getStorageUsage(): \Easymailing\Sdk\Generated\Dto\FileStorageUsage_file_storage_usage_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/files/storage_usage', []), pathTemplate: '/files/storage_usage');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\FileStorageUsage_file_storage_usage_read::fromArray($data);
    }

    public function updateContent(string $uuid): \Easymailing\Sdk\Generated\Dto\File_file_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/files/{uuid}/content', ['uuid' => $uuid]), pathTemplate: '/files/{uuid}/content');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\File_file_read::fromArray($data);
    }

}
