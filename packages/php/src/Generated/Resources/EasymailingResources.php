<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

trait EasymailingResources
{
    public readonly ActivitiesResource $activities;
    public readonly ActivityHistoryStatusResource $activityHistoryStatus;
    public readonly AsyncTasksResource $asyncTasks;
    public readonly AudiencesResource $audiences;
    public readonly AutomationsResource $automations;
    public readonly BatchOperationsResource $batchOperations;
    public readonly BookingCalendarsResource $bookingCalendars;
    public readonly BookingEmailSendersResource $bookingEmailSenders;
    public readonly BookingFieldsResource $bookingFields;
    public readonly BookingPageImagesResource $bookingPageImages;
    public readonly BookingPagesResource $bookingPages;
    public readonly CampaignsResource $campaigns;
    public readonly CompaniesResource $companies;
    public readonly CompanyAttributesResource $companyAttributes;
    public readonly CompanyIndustriesResource $companyIndustries;
    public readonly ContactAttributesResource $contactAttributes;
    public readonly ContactFilterFieldsResource $contactFilterFields;
    public readonly ContactsResource $contacts;
    public readonly ContactSegmentsResource $contactSegments;
    public readonly ContactTagsResource $contactTags;
    public readonly DataManagersResource $dataManagers;
    public readonly DesignSettingsResource $designSettings;
    public readonly EmailAccessGranteesResource $emailAccessGrantees;
    public readonly EmailAttachmentsResource $emailAttachments;
    public readonly EmailBatchesResource $emailBatches;
    public readonly EmailDraftsResource $emailDrafts;
    public readonly EmailMailboxesResource $emailMailboxes;
    public readonly EmailPersonalizationPreviewsResource $emailPersonalizationPreviews;
    public readonly EmailPersonalizationTagsResource $emailPersonalizationTags;
    public readonly EmailRecipientCandidatesResource $emailRecipientCandidates;
    public readonly EmailRecipientChecksResource $emailRecipientChecks;
    public readonly EmailsResource $emails;
    public readonly EmailSenderLimitsResource $emailSenderLimits;
    public readonly EmailSendersResource $emailSenders;
    public readonly EmailSendsResource $emailSends;
    public readonly EmailSequencesResource $emailSequences;
    public readonly FilesResource $files;
    public readonly InvoicesResource $invoices;
    public readonly MasterTemplatesResource $masterTemplates;
    public readonly MeetingCalendarsResource $meetingCalendars;
    public readonly MeetingsResource $meetings;
    public readonly MeetingWriteReceiptsResource $meetingWriteReceipts;
    public readonly MembersResource $members;
    public readonly MySubscriptionResource $mySubscription;
    public readonly NotesResource $notes;
    public readonly OpportunitiesResource $opportunities;
    public readonly OpportunityAttributesResource $opportunityAttributes;
    public readonly PipelinesResource $pipelines;
    public readonly PipelineTemplatesResource $pipelineTemplates;
    public readonly SenderDomainsResource $senderDomains;
    public readonly SendersResource $senders;
    public readonly SentEmailsResource $sentEmails;
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
    public readonly UsableBookingPagesResource $usableBookingPages;
    public readonly WebhookConfigsResource $webhookConfigs;

    private function wireGeneratedResources(): void
    {
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->activities = new ActivitiesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->activityHistoryStatus = new ActivityHistoryStatusResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->asyncTasks = new AsyncTasksResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->audiences = new AudiencesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->automations = new AutomationsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->batchOperations = new BatchOperationsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->bookingCalendars = new BookingCalendarsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->bookingEmailSenders = new BookingEmailSendersResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->bookingFields = new BookingFieldsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->bookingPageImages = new BookingPageImagesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->bookingPages = new BookingPagesResource($this);
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
        $this->contactFilterFields = new ContactFilterFieldsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->contacts = new ContactsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->contactSegments = new ContactSegmentsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->contactTags = new ContactTagsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->dataManagers = new DataManagersResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->designSettings = new DesignSettingsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailAccessGrantees = new EmailAccessGranteesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailAttachments = new EmailAttachmentsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailBatches = new EmailBatchesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailDrafts = new EmailDraftsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailMailboxes = new EmailMailboxesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailPersonalizationPreviews = new EmailPersonalizationPreviewsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailPersonalizationTags = new EmailPersonalizationTagsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailRecipientCandidates = new EmailRecipientCandidatesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailRecipientChecks = new EmailRecipientChecksResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emails = new EmailsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailSenderLimits = new EmailSenderLimitsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailSenders = new EmailSendersResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailSends = new EmailSendsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->emailSequences = new EmailSequencesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->files = new FilesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->invoices = new InvoicesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->masterTemplates = new MasterTemplatesResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->meetingCalendars = new MeetingCalendarsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->meetings = new MeetingsResource($this);
        /** @phpstan-ignore-next-line property.readOnlyAssignNotInConstructor */
        $this->meetingWriteReceipts = new MeetingWriteReceiptsResource($this);
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
        $this->sentEmails = new SentEmailsResource($this);
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
        $this->usableBookingPages = new UsableBookingPagesResource($this);
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

    public function bookingPages(string $uuid): BookingPagesScopedResource
    {
        return new BookingPagesScopedResource($this, $uuid);
    }

    public function contactFilterFields(string $fieldId): ContactFilterFieldsScopedResource
    {
        return new ContactFilterFieldsScopedResource($this, $fieldId);
    }

    public function contacts(string $contactUuid): ContactsScopedResource
    {
        return new ContactsScopedResource($this, $contactUuid);
    }

    public function emails(string $emailUuid): EmailsScopedResource
    {
        return new EmailsScopedResource($this, $emailUuid);
    }

    public function emailSequences(string $uuid): EmailSequencesScopedResource
    {
        return new EmailSequencesScopedResource($this, $uuid);
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
