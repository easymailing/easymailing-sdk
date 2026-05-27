// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createAsyncTasksResource, type AsyncTasksResource } from "./AsyncTasksResource.js";
import { createAudiencesResource, type AudiencesResource } from "./AudiencesResource.js";
import { createAutomationsResource, type AutomationsResource } from "./AutomationsResource.js";
import { createBatchOperationsResource, type BatchOperationsResource } from "./BatchOperationsResource.js";
import { createCampaignsResource, type CampaignsResource } from "./CampaignsResource.js";
import { createDataManagersResource, type DataManagersResource } from "./DataManagersResource.js";
import { createDesignSettingsResource, type DesignSettingsResource } from "./DesignSettingsResource.js";
import { createInvoicesResource, type InvoicesResource } from "./InvoicesResource.js";
import { createListSegmentConditionsResource, type ListSegmentConditionsResource } from "./ListSegmentConditionsResource.js";
import { createMasterTemplatesResource, type MasterTemplatesResource } from "./MasterTemplatesResource.js";
import { createMemberCampaignDeliveredEventsResource, type MemberCampaignDeliveredEventsResource } from "./MemberCampaignDeliveredEventsResource.js";
import { createMembersResource, type MembersResource } from "./MembersResource.js";
import { createMemberSmsBouncedEventsResource, type MemberSmsBouncedEventsResource } from "./MemberSmsBouncedEventsResource.js";
import { createMemberSmsClickedEventsResource, type MemberSmsClickedEventsResource } from "./MemberSmsClickedEventsResource.js";
import { createMemberSmsDeliveredEventsResource, type MemberSmsDeliveredEventsResource } from "./MemberSmsDeliveredEventsResource.js";
import { createMemberSmsRepliedEventsResource, type MemberSmsRepliedEventsResource } from "./MemberSmsRepliedEventsResource.js";
import { createMemberSmsSubscribedEventsResource, type MemberSmsSubscribedEventsResource } from "./MemberSmsSubscribedEventsResource.js";
import { createMemberSmsUnsubscribedEventsResource, type MemberSmsUnsubscribedEventsResource } from "./MemberSmsUnsubscribedEventsResource.js";
import { createMySubscriptionResource, type MySubscriptionResource } from "./MySubscriptionResource.js";
import { createSenderDomainsResource, type SenderDomainsResource } from "./SenderDomainsResource.js";
import { createSendersResource, type SendersResource } from "./SendersResource.js";
import { createSmsCampaignsResource, type SmsCampaignsResource } from "./SmsCampaignsResource.js";
import { createSmsSendersResource, type SmsSendersResource } from "./SmsSendersResource.js";
import { createStoresResource, type StoresResource } from "./StoresResource.js";
import { createSupportResource, type SupportResource } from "./SupportResource.js";
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
  dataManagers: DataManagersResource;
  designSettings: DesignSettingsResource;
  invoices: InvoicesResource;
  listSegmentConditions: ListSegmentConditionsResource;
  masterTemplates: MasterTemplatesResource;
  memberCampaignDeliveredEvents: MemberCampaignDeliveredEventsResource;
  members: MembersResource;
  memberSmsBouncedEvents: MemberSmsBouncedEventsResource;
  memberSmsClickedEvents: MemberSmsClickedEventsResource;
  memberSmsDeliveredEvents: MemberSmsDeliveredEventsResource;
  memberSmsRepliedEvents: MemberSmsRepliedEventsResource;
  memberSmsSubscribedEvents: MemberSmsSubscribedEventsResource;
  memberSmsUnsubscribedEvents: MemberSmsUnsubscribedEventsResource;
  mySubscription: MySubscriptionResource;
  senderDomains: SenderDomainsResource;
  senders: SendersResource;
  smsCampaigns: SmsCampaignsResource;
  smsSenders: SmsSendersResource;
  stores: StoresResource;
  support: SupportResource;
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
    dataManagers: createDataManagersResource(client),
    designSettings: createDesignSettingsResource(client),
    invoices: createInvoicesResource(client),
    listSegmentConditions: createListSegmentConditionsResource(client),
    masterTemplates: createMasterTemplatesResource(client),
    memberCampaignDeliveredEvents: createMemberCampaignDeliveredEventsResource(client),
    members: createMembersResource(client),
    memberSmsBouncedEvents: createMemberSmsBouncedEventsResource(client),
    memberSmsClickedEvents: createMemberSmsClickedEventsResource(client),
    memberSmsDeliveredEvents: createMemberSmsDeliveredEventsResource(client),
    memberSmsRepliedEvents: createMemberSmsRepliedEventsResource(client),
    memberSmsSubscribedEvents: createMemberSmsSubscribedEventsResource(client),
    memberSmsUnsubscribedEvents: createMemberSmsUnsubscribedEventsResource(client),
    mySubscription: createMySubscriptionResource(client),
    senderDomains: createSenderDomainsResource(client),
    senders: createSendersResource(client),
    smsCampaigns: createSmsCampaignsResource(client),
    smsSenders: createSmsSendersResource(client),
    stores: createStoresResource(client),
    support: createSupportResource(client),
    templates: createTemplatesResource(client),
    templatesSchema: createTemplatesSchemaResource(client),
    themeIndustries: createThemeIndustriesResource(client),
    themes: createThemesResource(client),
    themeTypes: createThemeTypesResource(client),
    treatmentPurposes: createTreatmentPurposesResource(client),
    webhookConfigs: createWebhookConfigsResource(client),
  };
}
