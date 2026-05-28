// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";
import { AudiencesScopedResource } from "./AudiencesScopedResource.js";

export class AudiencesCollectionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_audiences"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Audience-audience.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/audiences", {  }),
      pathTemplate: "/audiences",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Audience-audience.write"]): Promise<components["schemas"]["Audience-audience.read"]> {
    const result = await this.client.request<components["schemas"]["Audience-audience.read"]>({
      method: "POST",
      path: pathWithParams("/audiences", {  }),
      pathTemplate: "/audiences",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Audience-audience.read"]> {
    const result = await this.client.request<components["schemas"]["Audience-audience.read"]>({
      method: "GET",
      path: pathWithParams("/audiences/{uuid}", { uuid: uuid }),
      pathTemplate: "/audiences/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Audience-audience.write"]): Promise<components["schemas"]["Audience-audience.read"]> {
    const result = await this.client.request<components["schemas"]["Audience-audience.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{uuid}", { uuid: uuid }),
      pathTemplate: "/audiences/{uuid}",
      body,
    });
    return result.data;
  }

}

export type AudiencesResource = AudiencesCollectionResource & ((audienceUuid: string) => AudiencesScopedResource);

export function createAudiencesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AudiencesResource {
  const collection = new AudiencesCollectionResource(client, boundParams);
  const callable = ((audienceUuid: string) =>
    new AudiencesScopedResource(client, audienceUuid)) as AudiencesResource;
  Object.setPrototypeOf(callable, AudiencesCollectionResource.prototype);
  Object.assign(callable, collection);
  return callable;
}
