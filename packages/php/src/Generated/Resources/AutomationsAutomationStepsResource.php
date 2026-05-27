<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AutomationsAutomationStepsResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\AutomationStep_automation_step_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/automations/{automationUuid}/automation_steps', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), query: $query);
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\AutomationStep_automation_step_read => \Easymailing\Sdk\Generated\Dto\AutomationStep_automation_step_read::fromArray($item));
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\AutomationStep_automation_step_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_automation_step_read::fromArray($data);
    }

    public function delete(string $uuid, ?string $mode = null): void
    {
        $this->client->request('DELETE', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), query: array_filter(['mode' => $mode], static fn($value): bool => $value !== null));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepAddToGroup_automation_step_write $body
     */
    public function createAddToGroup(array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepAddToGroup_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepAddToGroupResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/add_to_group', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepAddToGroupResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepCondition_automation_step_write $body
     */
    public function createCondition(array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepCondition_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepConditionResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/condition', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepConditionResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepDelay_automation_step_write $body
     */
    public function createDelay(array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepDelay_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepDelayResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/delay', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepDelayResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepMoveToStep_automation_step_write $body
     */
    public function createMoveToStep(array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepMoveToStep_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepMoveToStepResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/move_to_step', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepMoveToStepResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepRemoveFromGroup_automation_step_write $body
     */
    public function createRemoveFromGroup(array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepRemoveFromGroup_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepRemoveFromGroupResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/remove_from_group', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepRemoveFromGroupResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendCampaign_automation_step_write $body
     */
    public function createSendCampaign(array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendCampaign_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendCampaignResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/send_campaign', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendCampaignResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendNotification_automation_step_write $body
     */
    public function createSendNotification(array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendNotification_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendNotificationResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/send_notification', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendNotificationResource_automation_step_read::fromArray($data);
    }

    public function createSendSms(): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendSmsResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/send_sms', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendSmsResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendWebhook_automation_step_write $body
     */
    public function createSendWebhook(array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendWebhook_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendWebhookResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/send_webhook', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendWebhookResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepTriggerAutomation_automation_step_write $body
     */
    public function createTriggerAutomation(array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepTriggerAutomation_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepTriggerAutomationResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/trigger_automation', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepTriggerAutomationResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUnsubscribe_automation_step_write $body
     */
    public function createUnsubscribe(array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUnsubscribe_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUnsubscribeResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/unsubscribe', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUnsubscribeResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateCustomField_automation_step_write $body
     */
    public function createUpdateCustomField(array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateCustomField_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateCustomFieldResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/update_custom_field', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateCustomFieldResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateScore_automation_step_write $body
     */
    public function createUpdateScore(array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateScore_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateScoreResource_automation_step_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_steps/update_score', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateScoreResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepAddToGroup_automation_step_write $body
     */
    public function updateAddToGroup(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepAddToGroup_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepAddToGroupResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/add_to_group', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepAddToGroupResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepCondition_automation_step_write $body
     */
    public function updateCondition(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepCondition_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepConditionResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/condition', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepConditionResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepDelay_automation_step_write $body
     */
    public function updateDelay(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepDelay_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepDelayResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/delay', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepDelayResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepMoveToStep_automation_step_write $body
     */
    public function updateMoveToStep(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepMoveToStep_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepMoveToStepResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/move_to_step', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepMoveToStepResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepPosition_automation_step_write $body
     */
    public function updatePosition(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepPosition_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/position', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepRemoveFromGroup_automation_step_write $body
     */
    public function updateRemoveFromGroup(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepRemoveFromGroup_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepRemoveFromGroupResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/remove_from_group', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepRemoveFromGroupResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendCampaign_automation_step_write $body
     */
    public function updateSendCampaign(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendCampaign_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendCampaignResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/send_campaign', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendCampaignResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendNotification_automation_step_write $body
     */
    public function updateSendNotification(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendNotification_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendNotificationResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/send_notification', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendNotificationResource_automation_step_read::fromArray($data);
    }

    public function updateSendSms(string $uuid): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendSmsResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/send_sms', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendSmsResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendWebhook_automation_step_write $body
     */
    public function updateSendWebhook(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendWebhook_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendWebhookResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/send_webhook', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepSendWebhookResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepTriggerAutomation_automation_step_write $body
     */
    public function updateTriggerAutomation(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepTriggerAutomation_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepTriggerAutomationResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/trigger_automation', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepTriggerAutomationResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUnsubscribe_automation_step_write $body
     */
    public function updateUnsubscribe(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUnsubscribe_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUnsubscribeResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/unsubscribe', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUnsubscribeResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateCustomField_automation_step_write $body
     */
    public function updateUpdateCustomField(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateCustomField_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateCustomFieldResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/update_custom_field', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateCustomFieldResource_automation_step_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateScore_automation_step_write $body
     */
    public function updateUpdateScore(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateScore_automation_step_write $body): \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateScoreResource_automation_step_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_steps/{uuid}/update_score', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationStep_AutomationStepUpdateScoreResource_automation_step_read::fromArray($data);
    }

}
