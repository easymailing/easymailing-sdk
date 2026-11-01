// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class BookingCalendarsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_booking_calendars"]["parameters"]["query"]>): Promise<Page<components["schemas"]["BookingCalendar-booking_calendar.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/booking_calendars", {  }),
      pathTemplate: "/booking_calendars",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createBookingCalendarsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): BookingCalendarsResource {
  return new BookingCalendarsResource(client, boundParams);
}
