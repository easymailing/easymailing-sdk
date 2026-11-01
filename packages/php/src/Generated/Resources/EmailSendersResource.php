<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class EmailSendersResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\EmailSender_email_sender_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_senders', []), query: $query, pathTemplate: '/email_senders');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\EmailSender_email_sender_read => \Easymailing\Sdk\Generated\Dto\EmailSender_email_sender_read::fromArray($item));
    }

    public function getSendEstimate(string $senderUuid, int $count, ?bool $separate = null): \Easymailing\Sdk\Generated\Dto\EmailSendEstimate_email_send_estimate_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/email_senders/{senderUuid}/send_estimate', ['senderUuid' => $senderUuid]), query: array_filter(['count' => $count, 'separate' => $separate], static fn($value): bool => $value !== null), pathTemplate: '/email_senders/{senderUuid}/send_estimate');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\EmailSendEstimate_email_send_estimate_read::fromArray($data);
    }

}
