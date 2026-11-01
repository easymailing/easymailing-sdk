// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MeetingCalendarsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_meeting_calendars"]["parameters"]["query"]>): Promise<Page<components["schemas"]["MeetingCalendar-meeting_calendar.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/meeting_calendars", {  }),
      pathTemplate: "/meeting_calendars",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createMeetingCalendarsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MeetingCalendarsResource {
  return new MeetingCalendarsResource(client, boundParams);
}
