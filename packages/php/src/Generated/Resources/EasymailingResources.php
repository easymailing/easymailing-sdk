<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

trait EasymailingResources
{
    public readonly AsyncTasksResource $asyncTasks;
    public readonly AudiencesResource $audiences;
    public readonly AutomationsResource $automations;
    public readonly BatchOperationsResource $batchOperations;
    public readonly CampaignsResource $campaigns;
    public readonly DataManagersResource $dataManagers;
    public readonly DesignSettingsResource $designSettings;
    public readonly InvoicesResource $invoices;
    public readonly ListSegmentConditionsResource $listSegmentConditions;
    public readonly MasterTemplatesResource $masterTemplates;
    public readonly MemberCampaignDeliveredEventsResource $memberCampaignDeliveredEvents;
    public readonly MembersResource $members;
    public readonly MemberSmsBouncedEventsResource $memberSmsBouncedEvents;
    public readonly MemberSmsClickedEventsResource $memberSmsClickedEvents;
    public readonly MemberSmsDeliveredEventsResource $memberSmsDeliveredEvents;
    public readonly MemberSmsRepliedEventsResource $memberSmsRepliedEvents;
    public readonly MemberSmsSubscribedEventsResource $memberSmsSubscribedEvents;
    public readonly MemberSmsUnsubscribedEventsResource $memberSmsUnsubscribedEvents;
    public readonly MySubscriptionResource $mySubscription;
    public readonly SenderDomainsResource $senderDomains;
    public readonly SendersResource $senders;
    public readonly SmsCampaignsResource $smsCampaigns;
    public readonly SmsSendersResource $smsSenders;
    public readonly StoresResource $stores;
    public readonly SupportResource $support;
    public readonly TemplatesResource $templates;
    public readonly TemplatesSchemaResource $templatesSchema;
    public readonly ThemeIndustriesResource $themeIndustries;
    public readonly ThemesResource $themes;
    public readonly ThemeTypesResource $themeTypes;
    public readonly TreatmentPurposesResource $treatmentPurposes;
    public readonly WebhookConfigsResource $webhookConfigs;

    private function wireGeneratedResources(): void
    {
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->asyncTasks = new AsyncTasksResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->audiences = new AudiencesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->automations = new AutomationsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->batchOperations = new BatchOperationsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->campaigns = new CampaignsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->dataManagers = new DataManagersResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->designSettings = new DesignSettingsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->invoices = new InvoicesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->listSegmentConditions = new ListSegmentConditionsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->masterTemplates = new MasterTemplatesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->memberCampaignDeliveredEvents = new MemberCampaignDeliveredEventsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->members = new MembersResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->memberSmsBouncedEvents = new MemberSmsBouncedEventsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->memberSmsClickedEvents = new MemberSmsClickedEventsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->memberSmsDeliveredEvents = new MemberSmsDeliveredEventsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->memberSmsRepliedEvents = new MemberSmsRepliedEventsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->memberSmsSubscribedEvents = new MemberSmsSubscribedEventsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->memberSmsUnsubscribedEvents = new MemberSmsUnsubscribedEventsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->mySubscription = new MySubscriptionResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->senderDomains = new SenderDomainsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->senders = new SendersResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->smsCampaigns = new SmsCampaignsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->smsSenders = new SmsSendersResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->stores = new StoresResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->support = new SupportResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->templates = new TemplatesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->templatesSchema = new TemplatesSchemaResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->themeIndustries = new ThemeIndustriesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->themes = new ThemesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->themeTypes = new ThemeTypesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->treatmentPurposes = new TreatmentPurposesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->webhookConfigs = new WebhookConfigsResource($this);
    }

    public function audiences(string $audienceUuid): AudiencesScopedResource
    {
        return new AudiencesScopedResource($this, $audienceUuid);
    }

    public function automations(string $automationUuid): AutomationsScopedResource
    {
        return new AutomationsScopedResource($this, $automationUuid);
    }

    public function stores(string $storeResourceId): StoresScopedResource
    {
        return new StoresScopedResource($this, $storeResourceId);
    }

    public function webhookConfigs(string $webhookUuid): WebhookConfigsScopedResource
    {
        return new WebhookConfigsScopedResource($this, $webhookUuid);
    }
}
