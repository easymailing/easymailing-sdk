// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class BookingPagesSharingCandidatesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_booking_page_sharing_candidates"]["parameters"]["query"]>): Promise<Page<components["schemas"]["BookingPageSharingCandidate-booking_page_sharing_candidate.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/booking_pages/{uuid}/sharing_candidates", { uuid: this.boundParams["uuid"]! }),
      pathTemplate: "/booking_pages/{uuid}/sharing_candidates",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createBookingPagesSharingCandidatesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): BookingPagesSharingCandidatesResource {
  return new BookingPagesSharingCandidatesResource(client, boundParams);
}
