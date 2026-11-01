<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class SentEmailsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\SentEmail_sent_email_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/sent_emails', []), query: $query, pathTemplate: '/sent_emails');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\SentEmail_sent_email_read => \Easymailing\Sdk\Generated\Dto\SentEmail_sent_email_read::fromArray($item));
    }

}
