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
        $this->asyncTasks = new AsyncTasksResource($this);
        $this->audiences = new AudiencesResource($this);
        $this->automations = new AutomationsResource($this);
        $this->batchOperations = new BatchOperationsResource($this);
        $this->campaigns = new CampaignsResource($this);
        $this->dataManagers = new DataManagersResource($this);
        $this->designSettings = new DesignSettingsResource($this);
        $this->invoices = new InvoicesResource($this);
        $this->listSegmentConditions = new ListSegmentConditionsResource($this);
        $this->masterTemplates = new MasterTemplatesResource($this);
        $this->memberCampaignDeliveredEvents = new MemberCampaignDeliveredEventsResource($this);
        $this->members = new MembersResource($this);
        $this->memberSmsBouncedEvents = new MemberSmsBouncedEventsResource($this);
        $this->memberSmsClickedEvents = new MemberSmsClickedEventsResource($this);
        $this->memberSmsDeliveredEvents = new MemberSmsDeliveredEventsResource($this);
        $this->memberSmsRepliedEvents = new MemberSmsRepliedEventsResource($this);
        $this->memberSmsSubscribedEvents = new MemberSmsSubscribedEventsResource($this);
        $this->memberSmsUnsubscribedEvents = new MemberSmsUnsubscribedEventsResource($this);
        $this->mySubscription = new MySubscriptionResource($this);
        $this->senderDomains = new SenderDomainsResource($this);
        $this->senders = new SendersResource($this);
        $this->smsCampaigns = new SmsCampaignsResource($this);
        $this->smsSenders = new SmsSendersResource($this);
        $this->stores = new StoresResource($this);
        $this->support = new SupportResource($this);
        $this->templates = new TemplatesResource($this);
        $this->templatesSchema = new TemplatesSchemaResource($this);
        $this->themeIndustries = new ThemeIndustriesResource($this);
        $this->themes = new ThemesResource($this);
        $this->themeTypes = new ThemeTypesResource($this);
        $this->treatmentPurposes = new TreatmentPurposesResource($this);
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
