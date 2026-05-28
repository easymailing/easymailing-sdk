<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class WebhookConfigsResource extends AbstractResource
{
    public function __construct(private readonly \Easymailing\Sdk\Easymailing $client)
    {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\Webhook_webhook_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/webhooks', []), query: $query, pathTemplate: '/webhooks');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\Webhook_webhook_read => \Easymailing\Sdk\Generated\Dto\Webhook_webhook_read::fromArray($item));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Webhook_webhook_write $body
     */
    public function create(array|\Easymailing\Sdk\Generated\Dto\Webhook_webhook_write $body): \Easymailing\Sdk\Generated\Dto\Webhook_webhook_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/webhooks', []), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/webhooks');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Webhook_webhook_read::fromArray($data);
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\Webhook_webhook_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/webhooks/{uuid}', ['uuid' => $uuid]), pathTemplate: '/webhooks/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Webhook_webhook_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\Webhook_webhook_write $body
     */
    public function update(string $uuid, array|\Easymailing\Sdk\Generated\Dto\Webhook_webhook_write $body): \Easymailing\Sdk\Generated\Dto\Webhook_webhook_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/webhooks/{uuid}', ['uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/webhooks/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\Webhook_webhook_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/webhooks/{uuid}', ['uuid' => $uuid]), pathTemplate: '/webhooks/{uuid}');
    }

}
