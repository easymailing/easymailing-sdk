// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class BookingPageImagesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async create(): Promise<components["schemas"]["BookingPageImage-booking_page_image.read"]> {
    const result = await this.client.request<components["schemas"]["BookingPageImage-booking_page_image.read"]>({
      method: "POST",
      path: pathWithParams("/booking_page_images", {  }),
      pathTemplate: "/booking_page_images",
    });
    return result.data;
  }

}

export function createBookingPageImagesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): BookingPageImagesResource {
  return new BookingPageImagesResource(client, boundParams);
}
