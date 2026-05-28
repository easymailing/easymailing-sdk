<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class SendersResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Sender_sender_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/senders', []), query: $query, pathTemplate: '/senders');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Sender_sender_read => \Easymailing\Sdk\Generated\Dto\Sender_sender_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Sender_sender_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Sender_sender_write $body): \Easymailing\Sdk\Generated\Dto\Sender_sender_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/senders', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/senders');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Sender_sender_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Sender_sender_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/senders/{uuid}', ['uuid' => $uuid]), pathTemplate: '/senders/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Sender_sender_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/senders/{uuid}', ['uuid' => $uuid]), pathTemplate: '/senders/{uuid}');
    }

    /**
     * @return array<string, mixed>
     */
    public function resendVerification(string $uuid): array
    {
        $result = $this->client->request('POST', $this->resolvePath('/senders/{uuid}/actions/resend_verification', ['uuid' => $uuid]), pathTemplate: '/senders/{uuid}/actions/resend_verification');
        $data = is_array($result['data']) ? $result['data'] : [];
        return $data;
    }

}
