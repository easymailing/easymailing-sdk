// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createActivitiesResource, type ActivitiesResource } from "./ActivitiesResource.js";
import { createActivityHistoryStatusResource, type ActivityHistoryStatusResource } from "./ActivityHistoryStatusResource.js";
import { createAsyncTasksResource, type AsyncTasksResource } from "./AsyncTasksResource.js";
import { createAudiencesResource, type AudiencesResource } from "./AudiencesResource.js";
import { createAutomationsResource, type AutomationsResource } from "./AutomationsResource.js";
import { createBatchOperationsResource, type BatchOperationsResource } from "./BatchOperationsResource.js";
import { createBookingCalendarsResource, type BookingCalendarsResource } from "./BookingCalendarsResource.js";
import { createBookingEmailSendersResource, type BookingEmailSendersResource } from "./BookingEmailSendersResource.js";
import { createBookingFieldsResource, type BookingFieldsResource } from "./BookingFieldsResource.js";
import { createBookingPageImagesResource, type BookingPageImagesResource } from "./BookingPageImagesResource.js";
import { createBookingPagesResource, type BookingPagesResource } from "./BookingPagesResource.js";
import { createCampaignsResource, type CampaignsResource } from "./CampaignsResource.js";
import { createCompaniesResource, type CompaniesResource } from "./CompaniesResource.js";
import { createCompanyAttributesResource, type CompanyAttributesResource } from "./CompanyAttributesResource.js";
import { createCompanyIndustriesResource, type CompanyIndustriesResource } from "./CompanyIndustriesResource.js";
import { createContactAttributesResource, type ContactAttributesResource } from "./ContactAttributesResource.js";
import { createContactFilterFieldsResource, type ContactFilterFieldsResource } from "./ContactFilterFieldsResource.js";
import { createContactsResource, type ContactsResource } from "./ContactsResource.js";
import { createContactSegmentsResource, type ContactSegmentsResource } from "./ContactSegmentsResource.js";
import { createContactTagsResource, type ContactTagsResource } from "./ContactTagsResource.js";
import { createDataManagersResource, type DataManagersResource } from "./DataManagersResource.js";
import { createDesignSettingsResource, type DesignSettingsResource } from "./DesignSettingsResource.js";
import { createEmailAccessGranteesResource, type EmailAccessGranteesResource } from "./EmailAccessGranteesResource.js";
import { createEmailAttachmentsResource, type EmailAttachmentsResource } from "./EmailAttachmentsResource.js";
import { createEmailBatchesResource, type EmailBatchesResource } from "./EmailBatchesResource.js";
import { createEmailDraftsResource, type EmailDraftsResource } from "./EmailDraftsResource.js";
import { createEmailMailboxesResource, type EmailMailboxesResource } from "./EmailMailboxesResource.js";
import { createEmailPersonalizationPreviewsResource, type EmailPersonalizationPreviewsResource } from "./EmailPersonalizationPreviewsResource.js";
import { createEmailPersonalizationTagsResource, type EmailPersonalizationTagsResource } from "./EmailPersonalizationTagsResource.js";
import { createEmailRecipientCandidatesResource, type EmailRecipientCandidatesResource } from "./EmailRecipientCandidatesResource.js";
import { createEmailRecipientChecksResource, type EmailRecipientChecksResource } from "./EmailRecipientChecksResource.js";
import { createEmailsResource, type EmailsResource } from "./EmailsResource.js";
import { createEmailSenderLimitsResource, type EmailSenderLimitsResource } from "./EmailSenderLimitsResource.js";
import { createEmailSendersResource, type EmailSendersResource } from "./EmailSendersResource.js";
import { createEmailSendsResource, type EmailSendsResource } from "./EmailSendsResource.js";
import { createEmailSequencesResource, type EmailSequencesResource } from "./EmailSequencesResource.js";
import { createFilesResource, type FilesResource } from "./FilesResource.js";
import { createInvoicesResource, type InvoicesResource } from "./InvoicesResource.js";
import { createMasterTemplatesResource, type MasterTemplatesResource } from "./MasterTemplatesResource.js";
import { createMeetingCalendarsResource, type MeetingCalendarsResource } from "./MeetingCalendarsResource.js";
import { createMeetingsResource, type MeetingsResource } from "./MeetingsResource.js";
import { createMeetingWriteReceiptsResource, type MeetingWriteReceiptsResource } from "./MeetingWriteReceiptsResource.js";
import { createMembersResource, type MembersResource } from "./MembersResource.js";
import { createMySubscriptionResource, type MySubscriptionResource } from "./MySubscriptionResource.js";
import { createNotesResource, type NotesResource } from "./NotesResource.js";
import { createOpportunitiesResource, type OpportunitiesResource } from "./OpportunitiesResource.js";
import { createOpportunityAttributesResource, type OpportunityAttributesResource } from "./OpportunityAttributesResource.js";
import { createPipelinesResource, type PipelinesResource } from "./PipelinesResource.js";
import { createPipelineTemplatesResource, type PipelineTemplatesResource } from "./PipelineTemplatesResource.js";
import { createSenderDomainsResource, type SenderDomainsResource } from "./SenderDomainsResource.js";
import { createSendersResource, type SendersResource } from "./SendersResource.js";
import { createSentEmailsResource, type SentEmailsResource } from "./SentEmailsResource.js";
import { createSmsCampaignsResource, type SmsCampaignsResource } from "./SmsCampaignsResource.js";
import { createSmsSendersResource, type SmsSendersResource } from "./SmsSendersResource.js";
import { createStoresResource, type StoresResource } from "./StoresResource.js";
import { createSupportResource, type SupportResource } from "./SupportResource.js";
import { createTaskAssigneesResource, type TaskAssigneesResource } from "./TaskAssigneesResource.js";
import { createTasksResource, type TasksResource } from "./TasksResource.js";
import { createTemplatesResource, type TemplatesResource } from "./TemplatesResource.js";
import { createTemplatesSchemaResource, type TemplatesSchemaResource } from "./TemplatesSchemaResource.js";
import { createThemeIndustriesResource, type ThemeIndustriesResource } from "./ThemeIndustriesResource.js";
import { createThemesResource, type ThemesResource } from "./ThemesResource.js";
import { createThemeTypesResource, type ThemeTypesResource } from "./ThemeTypesResource.js";
import { createTreatmentPurposesResource, type TreatmentPurposesResource } from "./TreatmentPurposesResource.js";
import { createUsableBookingPagesResource, type UsableBookingPagesResource } from "./UsableBookingPagesResource.js";
import { createWebhookConfigsResource, type WebhookConfigsResource } from "./WebhookConfigsResource.js";

export interface GeneratedResources {
  activities: ActivitiesResource;
  activityHistoryStatus: ActivityHistoryStatusResource;
  asyncTasks: AsyncTasksResource;
  audiences: AudiencesResource;
  automations: AutomationsResource;
  batchOperations: BatchOperationsResource;
  bookingCalendars: BookingCalendarsResource;
  bookingEmailSenders: BookingEmailSendersResource;
  bookingFields: BookingFieldsResource;
  bookingPageImages: BookingPageImagesResource;
  bookingPages: BookingPagesResource;
  campaigns: CampaignsResource;
  companies: CompaniesResource;
  companyAttributes: CompanyAttributesResource;
  companyIndustries: CompanyIndustriesResource;
  contactAttributes: ContactAttributesResource;
  contactFilterFields: ContactFilterFieldsResource;
  contacts: ContactsResource;
  contactSegments: ContactSegmentsResource;
  contactTags: ContactTagsResource;
  dataManagers: DataManagersResource;
  designSettings: DesignSettingsResource;
  emailAccessGrantees: EmailAccessGranteesResource;
  emailAttachments: EmailAttachmentsResource;
  emailBatches: EmailBatchesResource;
  emailDrafts: EmailDraftsResource;
  emailMailboxes: EmailMailboxesResource;
  emailPersonalizationPreviews: EmailPersonalizationPreviewsResource;
  emailPersonalizationTags: EmailPersonalizationTagsResource;
  emailRecipientCandidates: EmailRecipientCandidatesResource;
  emailRecipientChecks: EmailRecipientChecksResource;
  emails: EmailsResource;
  emailSenderLimits: EmailSenderLimitsResource;
  emailSenders: EmailSendersResource;
  emailSends: EmailSendsResource;
  emailSequences: EmailSequencesResource;
  files: FilesResource;
  invoices: InvoicesResource;
  masterTemplates: MasterTemplatesResource;
  meetingCalendars: MeetingCalendarsResource;
  meetings: MeetingsResource;
  meetingWriteReceipts: MeetingWriteReceiptsResource;
  members: MembersResource;
  mySubscription: MySubscriptionResource;
  notes: NotesResource;
  opportunities: OpportunitiesResource;
  opportunityAttributes: OpportunityAttributesResource;
  pipelines: PipelinesResource;
  pipelineTemplates: PipelineTemplatesResource;
  senderDomains: SenderDomainsResource;
  senders: SendersResource;
  sentEmails: SentEmailsResource;
  smsCampaigns: SmsCampaignsResource;
  smsSenders: SmsSendersResource;
  stores: StoresResource;
  support: SupportResource;
  taskAssignees: TaskAssigneesResource;
  tasks: TasksResource;
  templates: TemplatesResource;
  templatesSchema: TemplatesSchemaResource;
  themeIndustries: ThemeIndustriesResource;
  themes: ThemesResource;
  themeTypes: ThemeTypesResource;
  treatmentPurposes: TreatmentPurposesResource;
  usableBookingPages: UsableBookingPagesResource;
  webhookConfigs: WebhookConfigsResource;
}

export function wireResources(client: Easymailing): GeneratedResources {
  return {
    activities: createActivitiesResource(client),
    activityHistoryStatus: createActivityHistoryStatusResource(client),
    asyncTasks: createAsyncTasksResource(client),
    audiences: createAudiencesResource(client),
    automations: createAutomationsResource(client),
    batchOperations: createBatchOperationsResource(client),
    bookingCalendars: createBookingCalendarsResource(client),
    bookingEmailSenders: createBookingEmailSendersResource(client),
    bookingFields: createBookingFieldsResource(client),
    bookingPageImages: createBookingPageImagesResource(client),
    bookingPages: createBookingPagesResource(client),
    campaigns: createCampaignsResource(client),
    companies: createCompaniesResource(client),
    companyAttributes: createCompanyAttributesResource(client),
    companyIndustries: createCompanyIndustriesResource(client),
    contactAttributes: createContactAttributesResource(client),
    contactFilterFields: createContactFilterFieldsResource(client),
    contacts: createContactsResource(client),
    contactSegments: createContactSegmentsResource(client),
    contactTags: createContactTagsResource(client),
    dataManagers: createDataManagersResource(client),
    designSettings: createDesignSettingsResource(client),
    emailAccessGrantees: createEmailAccessGranteesResource(client),
    emailAttachments: createEmailAttachmentsResource(client),
    emailBatches: createEmailBatchesResource(client),
    emailDrafts: createEmailDraftsResource(client),
    emailMailboxes: createEmailMailboxesResource(client),
    emailPersonalizationPreviews: createEmailPersonalizationPreviewsResource(client),
    emailPersonalizationTags: createEmailPersonalizationTagsResource(client),
    emailRecipientCandidates: createEmailRecipientCandidatesResource(client),
    emailRecipientChecks: createEmailRecipientChecksResource(client),
    emails: createEmailsResource(client),
    emailSenderLimits: createEmailSenderLimitsResource(client),
    emailSenders: createEmailSendersResource(client),
    emailSends: createEmailSendsResource(client),
    emailSequences: createEmailSequencesResource(client),
    files: createFilesResource(client),
    invoices: createInvoicesResource(client),
    masterTemplates: createMasterTemplatesResource(client),
    meetingCalendars: createMeetingCalendarsResource(client),
    meetings: createMeetingsResource(client),
    meetingWriteReceipts: createMeetingWriteReceiptsResource(client),
    members: createMembersResource(client),
    mySubscription: createMySubscriptionResource(client),
    notes: createNotesResource(client),
    opportunities: createOpportunitiesResource(client),
    opportunityAttributes: createOpportunityAttributesResource(client),
    pipelines: createPipelinesResource(client),
    pipelineTemplates: createPipelineTemplatesResource(client),
    senderDomains: createSenderDomainsResource(client),
    senders: createSendersResource(client),
    sentEmails: createSentEmailsResource(client),
    smsCampaigns: createSmsCampaignsResource(client),
    smsSenders: createSmsSendersResource(client),
    stores: createStoresResource(client),
    support: createSupportResource(client),
    taskAssignees: createTaskAssigneesResource(client),
    tasks: createTasksResource(client),
    templates: createTemplatesResource(client),
    templatesSchema: createTemplatesSchemaResource(client),
    themeIndustries: createThemeIndustriesResource(client),
    themes: createThemesResource(client),
    themeTypes: createThemeTypesResource(client),
    treatmentPurposes: createTreatmentPurposesResource(client),
    usableBookingPages: createUsableBookingPagesResource(client),
    webhookConfigs: createWebhookConfigsResource(client),
  };
}
