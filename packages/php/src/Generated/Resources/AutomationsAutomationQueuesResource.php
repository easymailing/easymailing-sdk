<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AutomationsAutomationQueuesResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\AutomationQueue_automation_queue_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/automations/{automationUuid}/automation_queues', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), query: $query, pathTemplate: '/automations/{automationUuid}/automation_queues');
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\AutomationQueue_automation_queue_read => \Easymailing\Sdk\Generated\Dto\AutomationQueue_automation_queue_read::fromArray($item));
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\AutomationQueue_automation_queue_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/automations/{automationUuid}/automation_queues/{uuid}', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), pathTemplate: '/automations/{automationUuid}/automation_queues/{uuid}');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationQueue_automation_queue_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationQueue_AutomationQueueTriggerInput_automation_queue_write $body
     */
    public function createTriggerCustomApi(array|\Easymailing\Sdk\Generated\Dto\AutomationQueue_AutomationQueueTriggerInput_automation_queue_write $body): \Easymailing\Sdk\Generated\Dto\AutomationQueue_automation_queue_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_queues/trigger_custom_api', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray(), pathTemplate: '/automations/{automationUuid}/automation_queues/trigger_custom_api');
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationQueue_automation_queue_read::fromArray($data);
    }

}
