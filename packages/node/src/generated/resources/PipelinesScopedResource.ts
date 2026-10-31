// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createPipelinesLossReasonsResource, type PipelinesLossReasonsResource } from "./PipelinesLossReasonsResource.js";
import { createPipelinesStagesResource, type PipelinesStagesResource } from "./PipelinesStagesResource.js";

export class PipelinesScopedResource {
  public readonly lossReasons: PipelinesLossReasonsResource;
  public readonly stages: PipelinesStagesResource;

  constructor(private readonly client: Easymailing, private readonly pipelineUuid: string) {
    this.lossReasons = createPipelinesLossReasonsResource(client, { pipelineUuid: pipelineUuid });
    this.stages = createPipelinesStagesResource(client, { pipelineUuid: pipelineUuid });
  }
}
