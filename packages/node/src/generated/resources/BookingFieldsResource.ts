// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class BookingFieldsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_booking_fields"]["parameters"]["query"]>): Promise<Page<components["schemas"]["BookingField-booking_field.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/booking_fields", {  }),
      pathTemplate: "/booking_fields",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createBookingFieldsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): BookingFieldsResource {
  return new BookingFieldsResource(client, boundParams);
}
