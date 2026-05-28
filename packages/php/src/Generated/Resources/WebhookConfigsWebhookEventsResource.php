<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class WebhookConfigsWebhookEventsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\WebhookEvent_webhook_event_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/webhooks/{webhookUuid}/webhook_events', ['webhookUuid' => $this->boundParams['webhookUuid'] ?? null]), query: $query, pathTemplate: '/webhooks/{webhookUuid}/webhook_events');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\WebhookEvent_webhook_event_read => \Easymailing\Sdk\Generated\Dto\WebhookEvent_webhook_event_read::fromArray($item));
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\WebhookEvent_webhook_event_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/webhooks/{webhookUuid}/webhook_events/{uuid}', ['webhookUuid' => $this->boundParams['webhookUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/webhooks/{webhookUuid}/webhook_events/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\WebhookEvent_webhook_event_read::fromArray($data);
    }

}
