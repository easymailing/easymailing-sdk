// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class BookingPagesOffersResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async create(body: components["schemas"]["BookingOffer.BookingOfferInput"]): Promise<components["schemas"]["BookingOffer-booking_offer.read"]> {
    const result = await this.client.request<components["schemas"]["BookingOffer-booking_offer.read"]>({
      method: "POST",
      path: pathWithParams("/booking_pages/{uuid}/offers", { uuid: this.boundParams["uuid"]! }),
      pathTemplate: "/booking_pages/{uuid}/offers",
      body,
    });
    return result.data;
  }

}

export function createBookingPagesOffersResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): BookingPagesOffersResource {
  return new BookingPagesOffersResource(client, boundParams);
}
