<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

final class WebhookConfigsScopedResource
{
    public readonly WebhookConfigsWebhookEventsResource $webhookEvents;
    public readonly WebhookConfigsWebhookRequestsResource $webhookRequests;

    public function __construct(
        \Easymailing\Sdk\Easymailing $client,
        private readonly string $webhookUuid
    ) {
        $this->webhookEvents = new WebhookConfigsWebhookEventsResource($client, ['webhookUuid' => $this->webhookUuid]);
        $this->webhookRequests = new WebhookConfigsWebhookRequestsResource($client, ['webhookUuid' => $this->webhookUuid]);
    }

}
