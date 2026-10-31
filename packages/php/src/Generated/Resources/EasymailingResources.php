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
    public readonly CompaniesResource $companies;
    public readonly CompanyAttributesResource $companyAttributes;
    public readonly CompanyIndustriesResource $companyIndustries;
    public readonly ContactAttributesResource $contactAttributes;
    public readonly ContactsResource $contacts;
    public readonly ContactTagsResource $contactTags;
    public readonly DataManagersResource $dataManagers;
    public readonly DesignSettingsResource $designSettings;
    public readonly InvoicesResource $invoices;
    public readonly MasterTemplatesResource $masterTemplates;
    public readonly MembersResource $members;
    public readonly MySubscriptionResource $mySubscription;
    public readonly NotesResource $notes;
    public readonly OpportunitiesResource $opportunities;
    public readonly OpportunityAttributesResource $opportunityAttributes;
    public readonly PipelinesResource $pipelines;
    public readonly PipelineTemplatesResource $pipelineTemplates;
    public readonly SenderDomainsResource $senderDomains;
    public readonly SendersResource $senders;
    public readonly SmsCampaignsResource $smsCampaigns;
    public readonly SmsSendersResource $smsSenders;
    public readonly StoresResource $stores;
    public readonly SupportResource $support;
    public readonly TaskAssigneesResource $taskAssignees;
    public readonly TasksResource $tasks;
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
        $this->companies = new CompaniesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->companyAttributes = new CompanyAttributesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->companyIndustries = new CompanyIndustriesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->contactAttributes = new ContactAttributesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->contacts = new ContactsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->contactTags = new ContactTagsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->dataManagers = new DataManagersResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->designSettings = new DesignSettingsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->invoices = new InvoicesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->masterTemplates = new MasterTemplatesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->members = new MembersResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->mySubscription = new MySubscriptionResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->notes = new NotesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->opportunities = new OpportunitiesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->opportunityAttributes = new OpportunityAttributesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->pipelines = new PipelinesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->pipelineTemplates = new PipelineTemplatesResource($this);
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
        $this->taskAssignees = new TaskAssigneesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->tasks = new TasksResource($this);
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

    public function contacts(string $contactUuid): ContactsScopedResource
    {
        return new ContactsScopedResource($this, $contactUuid);
    }

    public function pipelines(string $pipelineUuid): PipelinesScopedResource
    {
        return new PipelinesScopedResource($this, $pipelineUuid);
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
