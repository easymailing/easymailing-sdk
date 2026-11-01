// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createBookingPagesEmailDesignsResource, type BookingPagesEmailDesignsResource } from "./BookingPagesEmailDesignsResource.js";
import { createBookingPagesOffersResource, type BookingPagesOffersResource } from "./BookingPagesOffersResource.js";
import { createBookingPagesSharingCandidatesResource, type BookingPagesSharingCandidatesResource } from "./BookingPagesSharingCandidatesResource.js";

export class BookingPagesScopedResource {
  public readonly emailDesigns: BookingPagesEmailDesignsResource;
  public readonly offers: BookingPagesOffersResource;
  public readonly sharingCandidates: BookingPagesSharingCandidatesResource;

  constructor(private readonly client: Easymailing, private readonly uuid: string) {
    this.emailDesigns = createBookingPagesEmailDesignsResource(client, { uuid: uuid });
    this.offers = createBookingPagesOffersResource(client, { uuid: uuid });
    this.sharingCandidates = createBookingPagesSharingCandidatesResource(client, { uuid: uuid });
  }
}
