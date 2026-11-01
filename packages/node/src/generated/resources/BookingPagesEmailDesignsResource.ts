// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class BookingPagesEmailDesignsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async restoreDefault(type: string, body: components["schemas"]["BookingEmailDesign.BookingEmailRestoreInput"]): Promise<components["schemas"]["BookingEmailDesign-booking_email_design.read"]> {
    const result = await this.client.request<components["schemas"]["BookingEmailDesign-booking_email_design.read"]>({
      method: "POST",
      path: pathWithParams("/booking_pages/{uuid}/email_designs/{type}/actions/restore_default", { uuid: this.boundParams["uuid"]!, type: type }),
      pathTemplate: "/booking_pages/{uuid}/email_designs/{type}/actions/restore_default",
      body,
    });
    return result.data;
  }

}

export function createBookingPagesEmailDesignsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): BookingPagesEmailDesignsResource {
  return new BookingPagesEmailDesignsResource(client, boundParams);
}
