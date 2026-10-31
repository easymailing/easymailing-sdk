// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createAsyncTasksResource, type AsyncTasksResource } from "./AsyncTasksResource.js";
import { createAudiencesResource, type AudiencesResource } from "./AudiencesResource.js";
import { createAutomationsResource, type AutomationsResource } from "./AutomationsResource.js";
import { createBatchOperationsResource, type BatchOperationsResource } from "./BatchOperationsResource.js";
import { createCampaignsResource, type CampaignsResource } from "./CampaignsResource.js";
import { createCompaniesResource, type CompaniesResource } from "./CompaniesResource.js";
import { createCompanyAttributesResource, type CompanyAttributesResource } from "./CompanyAttributesResource.js";
import { createCompanyIndustriesResource, type CompanyIndustriesResource } from "./CompanyIndustriesResource.js";
import { createContactAttributesResource, type ContactAttributesResource } from "./ContactAttributesResource.js";
import { createContactsResource, type ContactsResource } from "./ContactsResource.js";
import { createContactTagsResource, type ContactTagsResource } from "./ContactTagsResource.js";
import { createDataManagersResource, type DataManagersResource } from "./DataManagersResource.js";
import { createDesignSettingsResource, type DesignSettingsResource } from "./DesignSettingsResource.js";
import { createInvoicesResource, type InvoicesResource } from "./InvoicesResource.js";
import { createMasterTemplatesResource, type MasterTemplatesResource } from "./MasterTemplatesResource.js";
import { createMembersResource, type MembersResource } from "./MembersResource.js";
import { createMySubscriptionResource, type MySubscriptionResource } from "./MySubscriptionResource.js";
import { createNotesResource, type NotesResource } from "./NotesResource.js";
import { createOpportunitiesResource, type OpportunitiesResource } from "./OpportunitiesResource.js";
import { createOpportunityAttributesResource, type OpportunityAttributesResource } from "./OpportunityAttributesResource.js";
import { createPipelinesResource, type PipelinesResource } from "./PipelinesResource.js";
import { createPipelineTemplatesResource, type PipelineTemplatesResource } from "./PipelineTemplatesResource.js";
import { createSenderDomainsResource, type SenderDomainsResource } from "./SenderDomainsResource.js";
import { createSendersResource, type SendersResource } from "./SendersResource.js";
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
import { createWebhookConfigsResource, type WebhookConfigsResource } from "./WebhookConfigsResource.js";

export interface GeneratedResources {
  asyncTasks: AsyncTasksResource;
  audiences: AudiencesResource;
  automations: AutomationsResource;
  batchOperations: BatchOperationsResource;
  campaigns: CampaignsResource;
  companies: CompaniesResource;
  companyAttributes: CompanyAttributesResource;
  companyIndustries: CompanyIndustriesResource;
  contactAttributes: ContactAttributesResource;
  contacts: ContactsResource;
  contactTags: ContactTagsResource;
  dataManagers: DataManagersResource;
  designSettings: DesignSettingsResource;
  invoices: InvoicesResource;
  masterTemplates: MasterTemplatesResource;
  members: MembersResource;
  mySubscription: MySubscriptionResource;
  notes: NotesResource;
  opportunities: OpportunitiesResource;
  opportunityAttributes: OpportunityAttributesResource;
  pipelines: PipelinesResource;
  pipelineTemplates: PipelineTemplatesResource;
  senderDomains: SenderDomainsResource;
  senders: SendersResource;
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
  webhookConfigs: WebhookConfigsResource;
}

export function wireResources(client: Easymailing): GeneratedResources {
  return {
    asyncTasks: createAsyncTasksResource(client),
    audiences: createAudiencesResource(client),
    automations: createAutomationsResource(client),
    batchOperations: createBatchOperationsResource(client),
    campaigns: createCampaignsResource(client),
    companies: createCompaniesResource(client),
    companyAttributes: createCompanyAttributesResource(client),
    companyIndustries: createCompanyIndustriesResource(client),
    contactAttributes: createContactAttributesResource(client),
    contacts: createContactsResource(client),
    contactTags: createContactTagsResource(client),
    dataManagers: createDataManagersResource(client),
    designSettings: createDesignSettingsResource(client),
    invoices: createInvoicesResource(client),
    masterTemplates: createMasterTemplatesResource(client),
    members: createMembersResource(client),
    mySubscription: createMySubscriptionResource(client),
    notes: createNotesResource(client),
    opportunities: createOpportunitiesResource(client),
    opportunityAttributes: createOpportunityAttributesResource(client),
    pipelines: createPipelinesResource(client),
    pipelineTemplates: createPipelineTemplatesResource(client),
    senderDomains: createSenderDomainsResource(client),
    senders: createSendersResource(client),
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
    webhookConfigs: createWebhookConfigsResource(client),
  };
}
