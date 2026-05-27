// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class AudiencesMergeTagsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_audience_merge_tags"]["parameters"]["query"]>): Promise<Page<components["schemas"]["MergeTag-merge_tag.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/merge_tags", { audienceUuid: this.boundParams["audienceUuid"]! }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createAudiencesMergeTagsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AudiencesMergeTagsResource {
  return new AudiencesMergeTagsResource(client, boundParams);
}
