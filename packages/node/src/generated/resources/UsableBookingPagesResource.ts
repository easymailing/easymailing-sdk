// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class UsableBookingPagesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_usable_booking_pages"]["parameters"]["query"]>): Promise<Page<components["schemas"]["UsableBookingPage-usable_booking_page.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/usable_booking_pages", {  }),
      pathTemplate: "/usable_booking_pages",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["UsableBookingPage-usable_booking_page.read"]> {
    const result = await this.client.request<components["schemas"]["UsableBookingPage-usable_booking_page.read"]>({
      method: "GET",
      path: pathWithParams("/usable_booking_pages/{uuid}", { uuid: uuid }),
      pathTemplate: "/usable_booking_pages/{uuid}",
    });
    return result.data;
  }

}

export function createUsableBookingPagesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): UsableBookingPagesResource {
  return new UsableBookingPagesResource(client, boundParams);
}
