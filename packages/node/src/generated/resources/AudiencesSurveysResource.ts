// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class AudiencesSurveysResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_surveys"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Survey-survey.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/surveys", { audienceUuid: this.boundParams["audienceUuid"]! }),
      pathTemplate: "/audiences/{audienceUuid}/surveys",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Survey.CreateSurveyInput-survey.write.create_survey"]): Promise<components["schemas"]["Survey-survey.read_survey.read.detail"]> {
    const result = await this.client.request<components["schemas"]["Survey-survey.read_survey.read.detail"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/surveys", { audienceUuid: this.boundParams["audienceUuid"]! }),
      pathTemplate: "/audiences/{audienceUuid}/surveys",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Survey-survey.read_survey.read.detail"]> {
    const result = await this.client.request<components["schemas"]["Survey-survey.read_survey.read.detail"]>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/surveys/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/surveys/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Survey.UpdateSurveyInput-survey.write.update_survey"]): Promise<components["schemas"]["Survey-survey.read_survey.read.detail"]> {
    const result = await this.client.request<components["schemas"]["Survey-survey.read_survey.read.detail"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/surveys/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/surveys/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/audiences/{audienceUuid}/surveys/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/surveys/{uuid}",
    });
    return;
  }

  async activate(uuid: string): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/surveys/{uuid}/actions/activate", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/surveys/{uuid}/actions/activate",
    });
    return result.data;
  }

  async close(uuid: string): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/surveys/{uuid}/actions/close", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/surveys/{uuid}/actions/close",
    });
    return result.data;
  }

  async getStats(uuid: string): Promise<components["schemas"]["Survey.SurveyStatsOutput-survey.stats"]> {
    const result = await this.client.request<components["schemas"]["Survey.SurveyStatsOutput-survey.stats"]>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/surveys/{uuid}/stats", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/surveys/{uuid}/stats",
    });
    return result.data;
  }

}

export function createAudiencesSurveysResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AudiencesSurveysResource {
  return new AudiencesSurveysResource(client, boundParams);
}
