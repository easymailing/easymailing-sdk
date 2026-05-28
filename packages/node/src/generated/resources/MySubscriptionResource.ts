// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MySubscriptionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(): Promise<components["schemas"]["MySuscription-my_suscription.read"]> {
    const result = await this.client.request<components["schemas"]["MySuscription-my_suscription.read"]>({
      method: "GET",
      path: pathWithParams("/my_suscription", {  }),
      pathTemplate: "/my_suscription",
    });
    return result.data;
  }

}

export function createMySubscriptionResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MySubscriptionResource {
  return new MySubscriptionResource(client, boundParams);
}
