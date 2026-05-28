<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class SmsSendersResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\SmsSender_sms_sender_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/sms_senders', []), query: $query, pathTemplate: '/sms_senders');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\SmsSender_sms_sender_read => \Easymailing\Sdk\Generated\Dto\SmsSender_sms_sender_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\SmsSender_sms_sender_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\SmsSender_sms_sender_write $body): \Easymailing\Sdk\Generated\Dto\SmsSender_sms_sender_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/sms_senders', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/sms_senders');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SmsSender_sms_sender_read::fromArray($data);
    }

    public function get(string $id): \Easymailing\Sdk\Generated\Dto\SmsSender_sms_sender_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/sms_senders/{id}', ['id' => $id]), pathTemplate: '/sms_senders/{id}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\SmsSender_sms_sender_read::fromArray($data);
    }

    public function delete(string $id): void
    {
        $this->client->request('DELETE', $this->resolvePath('/sms_senders/{id}', ['id' => $id]), pathTemplate: '/sms_senders/{id}');
    }

}
