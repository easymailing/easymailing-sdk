// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class BookingEmailSendersResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(): Promise<components["schemas"]["BookingEmailSenderCatalog-booking_email_sender_catalog.read"]> {
    const result = await this.client.request<components["schemas"]["BookingEmailSenderCatalog-booking_email_sender_catalog.read"]>({
      method: "GET",
      path: pathWithParams("/booking_email_senders", {  }),
      pathTemplate: "/booking_email_senders",
    });
    return result.data;
  }

}

export function createBookingEmailSendersResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): BookingEmailSendersResource {
  return new BookingEmailSendersResource(client, boundParams);
}
