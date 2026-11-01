<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailsAttachmentsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function getContent(string $uuid, ?string $contact = null, ?string $company = null, ?string $opportunity = null): array
    {
        $result = $this->client->request('GET', $this->resolvePath('/emails/{emailUuid}/attachments/{uuid}/content', ['emailUuid' => $this->boundParams['emailUuid'] ?? null, 'uuid' => $uuid]), query: array_filter(['contact' => $contact, 'company' => $company, 'opportunity' => $opportunity], static fn($value): bool => $value !== null), pathTemplate: '/emails/{emailUuid}/attachments/{uuid}/content');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

}
