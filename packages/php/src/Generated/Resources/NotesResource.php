<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class NotesResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Note_note_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/notes', []), query: $query, pathTemplate: '/notes');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Note_note_read => \Easymailing\Sdk\Generated\Dto\Note_note_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Note_NoteCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Note_NoteCreateInput $body): \Easymailing\Sdk\Generated\Dto\Note_note_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/notes', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/notes');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Note_note_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Note_note_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/notes/{uuid}', ['uuid' => $uuid]), pathTemplate: '/notes/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Note_note_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Note_NoteUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Note_NoteUpdateInput $body): \Easymailing\Sdk\Generated\Dto\Note_note_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/notes/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/notes/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Note_note_read::fromArray($data);
    }

    public function delete(string $uuid, ?int $expectedVersion = null): void
    {
        $this->client->request('DELETE', $this->resolvePath('/notes/{uuid}', ['uuid' => $uuid]), query: array_filter(['expected_version' => $expectedVersion], static fn($value): bool => $value !== null), pathTemplate: '/notes/{uuid}');
    }

}
