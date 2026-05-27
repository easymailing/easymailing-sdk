// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class AutomationsAutomationStepsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_automation_steps"]["parameters"]["query"]>): Promise<Page<components["schemas"]["AutomationStep-automation_step.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/automations/{automationUuid}/automation_steps", { automationUuid: this.boundParams["automationUuid"]! }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["AutomationStep-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep-automation_step.read"]>({
      method: "GET",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async delete(uuid: string, query?: NonNullable<operations["delete_automation_step"]["parameters"]["query"]>): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return;
  }

  async createAddToGroup(body: components["schemas"]["AutomationStep.AutomationStepAddToGroup-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepAddToGroupResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepAddToGroupResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/add_to_group", { automationUuid: this.boundParams["automationUuid"]! }),
      body,
    });
    return result.data;
  }

  async createCondition(body: components["schemas"]["AutomationStep.AutomationStepCondition-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepConditionResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepConditionResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/condition", { automationUuid: this.boundParams["automationUuid"]! }),
      body,
    });
    return result.data;
  }

  async createDelay(body: components["schemas"]["AutomationStep.AutomationStepDelay-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepDelayResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepDelayResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/delay", { automationUuid: this.boundParams["automationUuid"]! }),
      body,
    });
    return result.data;
  }

  async createMoveToStep(body: components["schemas"]["AutomationStep.AutomationStepMoveToStep-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepMoveToStepResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepMoveToStepResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/move_to_step", { automationUuid: this.boundParams["automationUuid"]! }),
      body,
    });
    return result.data;
  }

  async createRemoveFromGroup(body: components["schemas"]["AutomationStep.AutomationStepRemoveFromGroup-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepRemoveFromGroupResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepRemoveFromGroupResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/remove_from_group", { automationUuid: this.boundParams["automationUuid"]! }),
      body,
    });
    return result.data;
  }

  async createSendCampaign(body: components["schemas"]["AutomationStep.AutomationStepSendCampaign-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepSendCampaignResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepSendCampaignResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/send_campaign", { automationUuid: this.boundParams["automationUuid"]! }),
      body,
    });
    return result.data;
  }

  async createSendNotification(body: components["schemas"]["AutomationStep.AutomationStepSendNotification-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepSendNotificationResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepSendNotificationResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/send_notification", { automationUuid: this.boundParams["automationUuid"]! }),
      body,
    });
    return result.data;
  }

  async createSendSms(): Promise<components["schemas"]["AutomationStep.AutomationStepSendSmsResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepSendSmsResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/send_sms", { automationUuid: this.boundParams["automationUuid"]! }),
    });
    return result.data;
  }

  async createSendWebhook(body: components["schemas"]["AutomationStep.AutomationStepSendWebhook-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepSendWebhookResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepSendWebhookResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/send_webhook", { automationUuid: this.boundParams["automationUuid"]! }),
      body,
    });
    return result.data;
  }

  async createTriggerAutomation(body: components["schemas"]["AutomationStep.AutomationStepTriggerAutomation-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepTriggerAutomationResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepTriggerAutomationResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/trigger_automation", { automationUuid: this.boundParams["automationUuid"]! }),
      body,
    });
    return result.data;
  }

  async createUnsubscribe(body: components["schemas"]["AutomationStep.AutomationStepUnsubscribe-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepUnsubscribeResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepUnsubscribeResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/unsubscribe", { automationUuid: this.boundParams["automationUuid"]! }),
      body,
    });
    return result.data;
  }

  async createUpdateCustomField(body: components["schemas"]["AutomationStep.AutomationStepUpdateCustomField-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepUpdateCustomFieldResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepUpdateCustomFieldResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/update_custom_field", { automationUuid: this.boundParams["automationUuid"]! }),
      body,
    });
    return result.data;
  }

  async createUpdateScore(body: components["schemas"]["AutomationStep.AutomationStepUpdateScore-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepUpdateScoreResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepUpdateScoreResource-automation_step.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/update_score", { automationUuid: this.boundParams["automationUuid"]! }),
      body,
    });
    return result.data;
  }

  async updateAddToGroup(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepAddToGroup-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepAddToGroupResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepAddToGroupResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/add_to_group", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateCondition(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepCondition-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepConditionResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepConditionResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/condition", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateDelay(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepDelay-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepDelayResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepDelayResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/delay", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateMoveToStep(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepMoveToStep-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepMoveToStepResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepMoveToStepResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/move_to_step", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updatePosition(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepPosition-automation_step.write"]): Promise<components["schemas"]["AutomationStep-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/position", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateRemoveFromGroup(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepRemoveFromGroup-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepRemoveFromGroupResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepRemoveFromGroupResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/remove_from_group", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateSendCampaign(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepSendCampaign-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepSendCampaignResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepSendCampaignResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/send_campaign", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateSendNotification(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepSendNotification-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepSendNotificationResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepSendNotificationResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/send_notification", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateSendSms(uuid: string): Promise<components["schemas"]["AutomationStep.AutomationStepSendSmsResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepSendSmsResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/send_sms", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async updateSendWebhook(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepSendWebhook-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepSendWebhookResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepSendWebhookResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/send_webhook", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateTriggerAutomation(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepTriggerAutomation-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepTriggerAutomationResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepTriggerAutomationResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/trigger_automation", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateUnsubscribe(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepUnsubscribe-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepUnsubscribeResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepUnsubscribeResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/unsubscribe", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateUpdateCustomField(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepUpdateCustomField-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepUpdateCustomFieldResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepUpdateCustomFieldResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/update_custom_field", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateUpdateScore(uuid: string, body: components["schemas"]["AutomationStep.AutomationStepUpdateScore-automation_step.write"]): Promise<components["schemas"]["AutomationStep.AutomationStepUpdateScoreResource-automation_step.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationStep.AutomationStepUpdateScoreResource-automation_step.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{automationUuid}/automation_steps/{uuid}/update_score", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

}

export function createAutomationsAutomationStepsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AutomationsAutomationStepsResource {
  return new AutomationsAutomationStepsResource(client, boundParams);
}
