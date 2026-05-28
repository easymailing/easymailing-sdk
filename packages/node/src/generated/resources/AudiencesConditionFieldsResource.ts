// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class AudiencesConditionFieldsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_audience_condition_fields"]["parameters"]["query"]>): Promise<Page<components["schemas"]["ConditionField-condition_field.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/condition_fields", { audienceUuid: this.boundParams["audienceUuid"]! }),
      pathTemplate: "/audiences/{audienceUuid}/condition_fields",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["ConditionField-condition_field.read"]> {
    const result = await this.client.request<components["schemas"]["ConditionField-condition_field.read"]>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/condition_fields/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/condition_fields/{uuid}",
    });
    return result.data;
  }

}

export function createAudiencesConditionFieldsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AudiencesConditionFieldsResource {
  return new AudiencesConditionFieldsResource(client, boundParams);
}
