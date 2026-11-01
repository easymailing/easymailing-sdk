<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailDraftsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\EmailDraft_email_draft_list>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_drafts', []), query: $query, pathTemplate: '/email_drafts');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\EmailDraft_email_draft_list => \Easymailing\Sdk\Generated\Dto\EmailDraft_email_draft_list::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailDraft_EmailDraftCreateInput $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\EmailDraft_EmailDraftCreateInput $body): \Easymailing\Sdk\Generated\Dto\EmailDraft_email_draft_list
    {
        $result = $this->client->request('POST', $this->resolvePath('/email_drafts', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_drafts');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailDraft_email_draft_list::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\EmailDraft_email_draft_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_drafts/{uuid}', ['uuid' => $uuid]), pathTemplate: '/email_drafts/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailDraft_email_draft_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\EmailDraft_EmailDraftUpdateInput $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\EmailDraft_EmailDraftUpdateInput $body): \Easymailing\Sdk\Generated\Dto\EmailDraft_email_draft_list
    {
        $result = $this->client->request('PUT', $this->resolvePath('/email_drafts/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/email_drafts/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailDraft_email_draft_list::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/email_drafts/{uuid}', ['uuid' => $uuid]), pathTemplate: '/email_drafts/{uuid}');
    }

}
