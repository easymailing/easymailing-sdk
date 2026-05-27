// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createAutomationsAutomationQueuesResource, type AutomationsAutomationQueuesResource } from "./AutomationsAutomationQueuesResource.js";
import { createAutomationsAutomationStepsResource, type AutomationsAutomationStepsResource } from "./AutomationsAutomationStepsResource.js";
import { createAutomationsTriggersResource, type AutomationsTriggersResource } from "./AutomationsTriggersResource.js";

export class AutomationsScopedResource {
  public readonly automationQueues: AutomationsAutomationQueuesResource;
  public readonly automationSteps: AutomationsAutomationStepsResource;
  public readonly triggers: AutomationsTriggersResource;

  constructor(private readonly client: Easymailing, private readonly automationUuid: string) {
    this.automationQueues = createAutomationsAutomationQueuesResource(client, { automationUuid: automationUuid });
    this.automationSteps = createAutomationsAutomationStepsResource(client, { automationUuid: automationUuid });
    this.triggers = createAutomationsTriggersResource(client, { automationUuid: automationUuid });
  }
}
