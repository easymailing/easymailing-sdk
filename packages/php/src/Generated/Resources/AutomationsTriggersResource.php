<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

use Easymailing\Sdk\Pagination\Page;

final class AutomationsTriggersResource extends AbstractResource
{
    public function __construct(
        private readonly \Easymailing\Sdk\Easymailing $client,
        /** @var array<string, string> */
        private readonly array $boundParams,
    ) {
    }

    /**
     * @param array<string, string|int|float|bool>|null $query
     * @return Page<\Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read>
     */
    public function list(?array $query = null): Page
    {
        $result = $this->client->request('GET', $this->resolvePath('/automations/{automationUuid}/automation_triggers', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), query: $query);
        return $this->toMappedPage($result, static fn(array $item): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read => \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($item));
    }

    public function get(string $uuid): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('GET', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    public function delete(string $uuid): void
    {
        $this->client->request('DELETE', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]));
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerAbandonedCart_automation_trigger_write $body
     */
    public function createAbandonedCart(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerAbandonedCart_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/abandoned_cart', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerAdminManual_automation_trigger_write $body
     */
    public function createAdminManual(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerAdminManual_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/admin_manual', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerAniversaryDate_automation_trigger_write $body
     */
    public function createAniversaryDate(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerAniversaryDate_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/aniversary_date', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerBuyAProduct_automation_trigger_write $body
     */
    public function createBuyAProduct(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerBuyAProduct_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/buy_a_product', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerClickOnCampaign_automation_trigger_write $body
     */
    public function createClickOnCampaign(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerClickOnCampaign_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/click_on_campaign', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerClickOnCampaignLink_automation_trigger_write $body
     */
    public function createClickOnCampaignLink(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerClickOnCampaignLink_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/click_on_campaign_link', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerContactAddedToGroup_automation_trigger_write $body
     */
    public function createContactAddedToGroup(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerContactAddedToGroup_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/contact_added_to_group', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerContactRemovedFromGroup_automation_trigger_write $body
     */
    public function createContactRemovedFromGroup(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerContactRemovedFromGroup_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/contact_removed_from_group', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerContactSubscribed_automation_trigger_write $body
     */
    public function createContactSubscribed(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerContactSubscribed_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/contact_subscribed', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerCustomApi_automation_trigger_write $body
     */
    public function createCustomApi(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerCustomApi_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/custom_api', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerFormCompleted_automation_trigger_write $body
     */
    public function createFormCompleted(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerFormCompleted_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/form_completed', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerNotClickOnCampaign_automation_trigger_write $body
     */
    public function createNotClickOnCampaign(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerNotClickOnCampaign_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/not_click_on_campaign', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerNotOpenOnCampaign_automation_trigger_write $body
     */
    public function createNotOpenOnCampaign(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerNotOpenOnCampaign_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/not_open_on_campaign', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOpenOnCampaign_automation_trigger_write $body
     */
    public function createOpenOnCampaign(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOpenOnCampaign_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/open_on_campaign', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderCancelled_automation_trigger_write $body
     */
    public function createOrderCancelled(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderCancelled_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/order_cancelled', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderPaid_automation_trigger_write $body
     */
    public function createOrderPaid(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderPaid_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/order_paid', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderProcessed_automation_trigger_write $body
     */
    public function createOrderProcessed(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderProcessed_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/order_processed', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderRefunded_automation_trigger_write $body
     */
    public function createOrderRefunded(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderRefunded_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/order_refunded', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderShipped_automation_trigger_write $body
     */
    public function createOrderShipped(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderShipped_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/order_shipped', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerPaymentReminder_automation_trigger_write $body
     */
    public function createPaymentReminder(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerPaymentReminder_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/payment_reminder', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSendACampaign_automation_trigger_write $body
     */
    public function createSendACampaign(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSendACampaign_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/send_a_campaign', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSpecificDate_automation_trigger_write $body
     */
    public function createSpecificDate(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSpecificDate_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/specific_date', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSuscriberRevalidation_automation_trigger_write $body
     */
    public function createSuscriberRevalidation(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSuscriberRevalidation_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/suscriber_revalidation', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSuscriptionDate_automation_trigger_write $body
     */
    public function createSuscriptionDate(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSuscriptionDate_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/suscription_date', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerTimeSinceLastPurchase_automation_trigger_write $body
     */
    public function createTimeSinceLastPurchase(array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerTimeSinceLastPurchase_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('POST', $this->resolvePath('/automations/{automationUuid}/automation_triggers/time_since_last_purchase', ['automationUuid' => $this->boundParams['automationUuid'] ?? null]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerAbandonedCart_automation_trigger_write $body
     */
    public function updateAbandonedCart(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerAbandonedCart_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/abandoned_cart', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerAdminManual_automation_trigger_write $body
     */
    public function updateAdminManual(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerAdminManual_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/admin_manual', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerAniversaryDate_automation_trigger_write $body
     */
    public function updateAniversaryDate(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerAniversaryDate_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/aniversary_date', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerBuyAProduct_automation_trigger_write $body
     */
    public function updateBuyAProduct(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerBuyAProduct_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/buy_a_product', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerClickOnCampaign_automation_trigger_write $body
     */
    public function updateClickOnCampaign(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerClickOnCampaign_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/click_on_campaign', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerClickOnCampaignLink_automation_trigger_write $body
     */
    public function updateClickOnCampaignLink(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerClickOnCampaignLink_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/click_on_campaign_link', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerContactAddedToGroup_automation_trigger_write $body
     */
    public function updateContactAddedToGroup(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerContactAddedToGroup_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/contact_added_to_group', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerContactRemovedFromGroup_automation_trigger_write $body
     */
    public function updateContactRemovedFromGroup(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerContactRemovedFromGroup_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/contact_removed_from_group', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerContactSubscribed_automation_trigger_write $body
     */
    public function updateContactSubscribed(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerContactSubscribed_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/contact_subscribed', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerCustomApi_automation_trigger_write $body
     */
    public function updateCustomApi(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerCustomApi_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/custom_api', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    public function updateEnable(string $uuid): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/enable', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerFormCompleted_automation_trigger_write $body
     */
    public function updateFormCompleted(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerFormCompleted_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/form_completed', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerNotClickOnCampaign_automation_trigger_write $body
     */
    public function updateNotClickOnCampaign(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerNotClickOnCampaign_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/not_click_on_campaign', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerNotOpenOnCampaign_automation_trigger_write $body
     */
    public function updateNotOpenOnCampaign(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerNotOpenOnCampaign_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/not_open_on_campaign', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOpenOnCampaign_automation_trigger_write $body
     */
    public function updateOpenOnCampaign(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOpenOnCampaign_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/open_on_campaign', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderCancelled_automation_trigger_write $body
     */
    public function updateOrderCancelled(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderCancelled_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/order_cancelled', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderPaid_automation_trigger_write $body
     */
    public function updateOrderPaid(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderPaid_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/order_paid', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderProcessed_automation_trigger_write $body
     */
    public function updateOrderProcessed(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderProcessed_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/order_processed', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderRefunded_automation_trigger_write $body
     */
    public function updateOrderRefunded(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderRefunded_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/order_refunded', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderShipped_automation_trigger_write $body
     */
    public function updateOrderShipped(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerOrderShipped_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/order_shipped', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    public function updatePause(string $uuid): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/pause', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]));
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerPaymentReminder_automation_trigger_write $body
     */
    public function updatePaymentReminder(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerPaymentReminder_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/payment_reminder', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSendACampaign_automation_trigger_write $body
     */
    public function updateSendACampaign(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSendACampaign_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/send_a_campaign', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSpecificDate_automation_trigger_write $body
     */
    public function updateSpecificDate(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSpecificDate_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/specific_date', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSuscriberRevalidation_automation_trigger_write $body
     */
    public function updateSuscriberRevalidation(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSuscriberRevalidation_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/suscriber_revalidation', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSuscriptionDate_automation_trigger_write $body
     */
    public function updateSuscriptionDate(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerSuscriptionDate_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/suscription_date', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

    /**
     * @param array<string, mixed>|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerTimeSinceLastPurchase_automation_trigger_write $body
     */
    public function updateTimeSinceLastPurchase(string $uuid, array|\Easymailing\Sdk\Generated\Dto\AutomationTrigger_AutomationTriggerTimeSinceLastPurchase_automation_trigger_write $body): \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read
    {
        $result = $this->client->request('PUT', $this->resolvePath('/automations/{automationUuid}/automation_triggers/{uuid}/time_since_last_purchase', ['automationUuid' => $this->boundParams['automationUuid'] ?? null, 'uuid' => $uuid]), body: is_array($body) ? $body : $body->toArray());
        $data = is_array($result['data']) ? $result['data'] : [];
        return \Easymailing\Sdk\Generated\Dto\AutomationTrigger_automation_trigger_read::fromArray($data);
    }

}
