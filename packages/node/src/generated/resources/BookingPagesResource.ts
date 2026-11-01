// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";
import { BookingPagesScopedResource } from "./BookingPagesScopedResource.js";

export class BookingPagesCollectionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_booking_pages"]["parameters"]["query"]>): Promise<Page<components["schemas"]["BookingPage-booking_page.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/booking_pages", {  }),
      pathTemplate: "/booking_pages",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["BookingPage.BookingPageCreateInput"]): Promise<components["schemas"]["BookingPage-booking_page.read"]> {
    const result = await this.client.request<components["schemas"]["BookingPage-booking_page.read"]>({
      method: "POST",
      path: pathWithParams("/booking_pages", {  }),
      pathTemplate: "/booking_pages",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["BookingPage-booking_page.read"]> {
    const result = await this.client.request<components["schemas"]["BookingPage-booking_page.read"]>({
      method: "GET",
      path: pathWithParams("/booking_pages/{uuid}", { uuid: uuid }),
      pathTemplate: "/booking_pages/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["BookingPage.BookingPageUpdateInput"]): Promise<components["schemas"]["BookingPage-booking_page.read"]> {
    const result = await this.client.request<components["schemas"]["BookingPage-booking_page.read"]>({
      method: "PUT",
      path: pathWithParams("/booking_pages/{uuid}", { uuid: uuid }),
      pathTemplate: "/booking_pages/{uuid}",
      body,
    });
    return result.data;
  }

  async archive(uuid: string, body: components["schemas"]["BookingPage.BookingPageStateInput"]): Promise<components["schemas"]["BookingPage-booking_page.read"]> {
    const result = await this.client.request<components["schemas"]["BookingPage-booking_page.read"]>({
      method: "POST",
      path: pathWithParams("/booking_pages/{uuid}/actions/archive", { uuid: uuid }),
      pathTemplate: "/booking_pages/{uuid}/actions/archive",
      body,
    });
    return result.data;
  }

  async pause(uuid: string, body: components["schemas"]["BookingPage.BookingPageStateInput"]): Promise<components["schemas"]["BookingPage-booking_page.read"]> {
    const result = await this.client.request<components["schemas"]["BookingPage-booking_page.read"]>({
      method: "POST",
      path: pathWithParams("/booking_pages/{uuid}/actions/pause", { uuid: uuid }),
      pathTemplate: "/booking_pages/{uuid}/actions/pause",
      body,
    });
    return result.data;
  }

  async publish(uuid: string, body: components["schemas"]["BookingPage.BookingPageStateInput"]): Promise<components["schemas"]["BookingPage-booking_page.read"]> {
    const result = await this.client.request<components["schemas"]["BookingPage-booking_page.read"]>({
      method: "POST",
      path: pathWithParams("/booking_pages/{uuid}/actions/publish", { uuid: uuid }),
      pathTemplate: "/booking_pages/{uuid}/actions/publish",
      body,
    });
    return result.data;
  }

  async getAvailability(uuid: string, query?: NonNullable<operations["get_booking_page_availability"]["parameters"]["query"]>): Promise<components["schemas"]["BookingPageAvailability-booking_page_availability.read"]> {
    const result = await this.client.request<components["schemas"]["BookingPageAvailability-booking_page_availability.read"]>({
      method: "GET",
      path: pathWithParams("/booking_pages/{uuid}/availability", { uuid: uuid }),
      pathTemplate: "/booking_pages/{uuid}/availability",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return result.data;
  }

  async getEmailSettings(uuid: string): Promise<components["schemas"]["BookingEmailSettings-booking_email_settings.read"]> {
    const result = await this.client.request<components["schemas"]["BookingEmailSettings-booking_email_settings.read"]>({
      method: "GET",
      path: pathWithParams("/booking_pages/{uuid}/email_settings", { uuid: uuid }),
      pathTemplate: "/booking_pages/{uuid}/email_settings",
    });
    return result.data;
  }

  async updateEmailSettings(uuid: string, body: components["schemas"]["BookingEmailSettings.BookingEmailSettingsInput"]): Promise<components["schemas"]["BookingEmailSettings-booking_email_settings.read"]> {
    const result = await this.client.request<components["schemas"]["BookingEmailSettings-booking_email_settings.read"]>({
      method: "PUT",
      path: pathWithParams("/booking_pages/{uuid}/email_settings", { uuid: uuid }),
      pathTemplate: "/booking_pages/{uuid}/email_settings",
      body,
    });
    return result.data;
  }

  async updateSharing(uuid: string, body: components["schemas"]["BookingPage.BookingPageSharingInput"]): Promise<components["schemas"]["BookingPage-booking_page.read"]> {
    const result = await this.client.request<components["schemas"]["BookingPage-booking_page.read"]>({
      method: "PUT",
      path: pathWithParams("/booking_pages/{uuid}/sharing", { uuid: uuid }),
      pathTemplate: "/booking_pages/{uuid}/sharing",
      body,
    });
    return result.data;
  }

}

export type BookingPagesResource = BookingPagesCollectionResource & ((uuid: string) => BookingPagesScopedResource);

export function createBookingPagesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): BookingPagesResource {
  const collection = new BookingPagesCollectionResource(client, boundParams);
  const callable = ((uuid: string) =>
    new BookingPagesScopedResource(client, uuid)) as BookingPagesResource;
  Object.setPrototypeOf(callable, BookingPagesCollectionResource.prototype);
  Object.assign(callable, collection);
  return callable;
}
