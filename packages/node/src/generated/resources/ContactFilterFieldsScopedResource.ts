// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createContactFilterFieldsSuggestionsResource, type ContactFilterFieldsSuggestionsResource } from "./ContactFilterFieldsSuggestionsResource.js";

export class ContactFilterFieldsScopedResource {
  public readonly suggestions: ContactFilterFieldsSuggestionsResource;

  constructor(private readonly client: Easymailing, private readonly fieldId: string) {
    this.suggestions = createContactFilterFieldsSuggestionsResource(client, { fieldId: fieldId });
  }
}
