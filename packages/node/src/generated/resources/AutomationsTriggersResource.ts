// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class AutomationsTriggersResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_automation_triggers"]["parameters"]["query"]>): Promise<Page<components["schemas"]["AutomationTrigger-automation_trigger.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "GET",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}",
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}",
    });
    return;
  }

  async createAbandonedCart(body: components["schemas"]["AutomationTrigger.AutomationTriggerAbandonedCart-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/abandoned_cart", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/abandoned_cart",
      body,
    });
    return result.data;
  }

  async createAdminManual(body: components["schemas"]["AutomationTrigger.AutomationTriggerAdminManual-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/admin_manual", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/admin_manual",
      body,
    });
    return result.data;
  }

  async createAniversaryDate(body: components["schemas"]["AutomationTrigger.AutomationTriggerAniversaryDate-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/aniversary_date", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/aniversary_date",
      body,
    });
    return result.data;
  }

  async createBuyAProduct(body: components["schemas"]["AutomationTrigger.AutomationTriggerBuyAProduct-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/buy_a_product", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/buy_a_product",
      body,
    });
    return result.data;
  }

  async createClickOnCampaign(body: components["schemas"]["AutomationTrigger.AutomationTriggerClickOnCampaign-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/click_on_campaign", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/click_on_campaign",
      body,
    });
    return result.data;
  }

  async createClickOnCampaignLink(body: components["schemas"]["AutomationTrigger.AutomationTriggerClickOnCampaignLink-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/click_on_campaign_link", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/click_on_campaign_link",
      body,
    });
    return result.data;
  }

  async createContactAddedToGroup(body: components["schemas"]["AutomationTrigger.AutomationTriggerContactAddedToGroup-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/contact_added_to_group", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/contact_added_to_group",
      body,
    });
    return result.data;
  }

  async createContactRemovedFromGroup(body: components["schemas"]["AutomationTrigger.AutomationTriggerContactRemovedFromGroup-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/contact_removed_from_group", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/contact_removed_from_group",
      body,
    });
    return result.data;
  }

  async createContactSubscribed(body: components["schemas"]["AutomationTrigger.AutomationTriggerContactSubscribed-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/contact_subscribed", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/contact_subscribed",
      body,
    });
    return result.data;
  }

  async createCustomApi(body: components["schemas"]["AutomationTrigger.AutomationTriggerCustomApi-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/custom_api", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/custom_api",
      body,
    });
    return result.data;
  }

  async createFormCompleted(body: components["schemas"]["AutomationTrigger.AutomationTriggerFormCompleted-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/form_completed", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/form_completed",
      body,
    });
    return result.data;
  }

  async createNotClickOnCampaign(body: components["schemas"]["AutomationTrigger.AutomationTriggerNotClickOnCampaign-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/not_click_on_campaign", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/not_click_on_campaign",
      body,
    });
    return result.data;
  }

  async createNotOpenOnCampaign(body: components["schemas"]["AutomationTrigger.AutomationTriggerNotOpenOnCampaign-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/not_open_on_campaign", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/not_open_on_campaign",
      body,
    });
    return result.data;
  }

  async createOpenOnCampaign(body: components["schemas"]["AutomationTrigger.AutomationTriggerOpenOnCampaign-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/open_on_campaign", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/open_on_campaign",
      body,
    });
    return result.data;
  }

  async createOrderCancelled(body: components["schemas"]["AutomationTrigger.AutomationTriggerOrderCancelled-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/order_cancelled", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/order_cancelled",
      body,
    });
    return result.data;
  }

  async createOrderPaid(body: components["schemas"]["AutomationTrigger.AutomationTriggerOrderPaid-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/order_paid", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/order_paid",
      body,
    });
    return result.data;
  }

  async createOrderProcessed(body: components["schemas"]["AutomationTrigger.AutomationTriggerOrderProcessed-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/order_processed", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/order_processed",
      body,
    });
    return result.data;
  }

  async createOrderRefunded(body: components["schemas"]["AutomationTrigger.AutomationTriggerOrderRefunded-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/order_refunded", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/order_refunded",
      body,
    });
    return result.data;
  }

  async createOrderShipped(body: components["schemas"]["AutomationTrigger.AutomationTriggerOrderShipped-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/order_shipped", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/order_shipped",
      body,
    });
    return result.data;
  }

  async createPaymentReminder(body: components["schemas"]["AutomationTrigger.AutomationTriggerPaymentReminder-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/payment_reminder", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/payment_reminder",
      body,
    });
    return result.data;
  }

  async createSendACampaign(body: components["schemas"]["AutomationTrigger.AutomationTriggerSendACampaign-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/send_a_campaign", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/send_a_campaign",
      body,
    });
    return result.data;
  }

  async createSpecificDate(body: components["schemas"]["AutomationTrigger.AutomationTriggerSpecificDate-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/specific_date", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/specific_date",
      body,
    });
    return result.data;
  }

  async createSuscriberRevalidation(body: components["schemas"]["AutomationTrigger.AutomationTriggerSuscriberRevalidation-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/suscriber_revalidation", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/suscriber_revalidation",
      body,
    });
    return result.data;
  }

  async createSuscriptionDate(body: components["schemas"]["AutomationTrigger.AutomationTriggerSuscriptionDate-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/suscription_date", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/suscription_date",
      body,
    });
    return result.data;
  }

  async createTimeSinceLastPurchase(body: components["schemas"]["AutomationTrigger.AutomationTriggerTimeSinceLastPurchase-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/time_since_last_purchase", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/time_since_last_purchase",
      body,
    });
    return result.data;
  }

  async updateAbandonedCart(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerAbandonedCart-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/abandoned_cart", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/abandoned_cart",
      body,
    });
    return result.data;
  }

  async updateAdminManual(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerAdminManual-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/admin_manual", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/admin_manual",
      body,
    });
    return result.data;
  }

  async updateAniversaryDate(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerAniversaryDate-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/aniversary_date", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/aniversary_date",
      body,
    });
    return result.data;
  }

  async updateBuyAProduct(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerBuyAProduct-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/buy_a_product", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/buy_a_product",
      body,
    });
    return result.data;
  }

  async updateClickOnCampaign(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerClickOnCampaign-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/click_on_campaign", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/click_on_campaign",
      body,
    });
    return result.data;
  }

  async updateClickOnCampaignLink(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerClickOnCampaignLink-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/click_on_campaign_link", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/click_on_campaign_link",
      body,
    });
    return result.data;
  }

  async updateContactAddedToGroup(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerContactAddedToGroup-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/contact_added_to_group", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/contact_added_to_group",
      body,
    });
    return result.data;
  }

  async updateContactRemovedFromGroup(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerContactRemovedFromGroup-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/contact_removed_from_group", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/contact_removed_from_group",
      body,
    });
    return result.data;
  }

  async updateContactSubscribed(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerContactSubscribed-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/contact_subscribed", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/contact_subscribed",
      body,
    });
    return result.data;
  }

  async updateCustomApi(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerCustomApi-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/custom_api", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/custom_api",
      body,
    });
    return result.data;
  }

  async updateEnable(uuid: string): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/enable", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/enable",
    });
    return result.data;
  }

  async updateFormCompleted(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerFormCompleted-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/form_completed", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/form_completed",
      body,
    });
    return result.data;
  }

  async updateNotClickOnCampaign(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerNotClickOnCampaign-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/not_click_on_campaign", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/not_click_on_campaign",
      body,
    });
    return result.data;
  }

  async updateNotOpenOnCampaign(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerNotOpenOnCampaign-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/not_open_on_campaign", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/not_open_on_campaign",
      body,
    });
    return result.data;
  }

  async updateOpenOnCampaign(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerOpenOnCampaign-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/open_on_campaign", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/open_on_campaign",
      body,
    });
    return result.data;
  }

  async updateOrderCancelled(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerOrderCancelled-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/order_cancelled", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/order_cancelled",
      body,
    });
    return result.data;
  }

  async updateOrderPaid(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerOrderPaid-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/order_paid", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/order_paid",
      body,
    });
    return result.data;
  }

  async updateOrderProcessed(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerOrderProcessed-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/order_processed", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/order_processed",
      body,
    });
    return result.data;
  }

  async updateOrderRefunded(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerOrderRefunded-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/order_refunded", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/order_refunded",
      body,
    });
    return result.data;
  }

  async updateOrderShipped(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerOrderShipped-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/order_shipped", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/order_shipped",
      body,
    });
    return result.data;
  }

  async updatePause(uuid: string): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/pause", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/pause",
    });
    return result.data;
  }

  async updatePaymentReminder(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerPaymentReminder-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/payment_reminder", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/payment_reminder",
      body,
    });
    return result.data;
  }

  async updateSendACampaign(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerSendACampaign-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/send_a_campaign", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/send_a_campaign",
      body,
    });
    return result.data;
  }

  async updateSpecificDate(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerSpecificDate-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/specific_date", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/specific_date",
      body,
    });
    return result.data;
  }

  async updateSuscriberRevalidation(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerSuscriberRevalidation-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/suscriber_revalidation", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/suscriber_revalidation",
      body,
    });
    return result.data;
  }

  async updateSuscriptionDate(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerSuscriptionDate-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/suscription_date", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/suscription_date",
      body,
    });
    return result.data;
  }

  async updateTimeSinceLastPurchase(uuid: string, body: components["schemas"]["AutomationTrigger.AutomationTriggerTimeSinceLastPurchase-automation_trigger.write"]): Promise<components["schemas"]["AutomationTrigger-automation_trigger.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationTrigger-automation_trigger.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_triggers/{uuid}/time_since_last_purchase", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_triggers/{uuid}/time_since_last_purchase",
      body,
    });
    return result.data;
  }

}

export function createAutomationsTriggersResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AutomationsTriggersResource {
  return new AutomationsTriggersResource(client, boundParams);
}
