// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class ContactFilterFieldsSuggestionsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_contact_filter_field_suggestions"]["parameters"]["query"]>): Promise<Page<components["schemas"]["ContactFilterFieldSuggestion-contact_filter_field_suggestion.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/contact_filter_fields/{fieldId}/suggestions", { fieldId: this.boundParams["fieldId"]! }),
      pathTemplate: "/contact_filter_fields/{fieldId}/suggestions",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createContactFilterFieldsSuggestionsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ContactFilterFieldsSuggestionsResource {
  return new ContactFilterFieldsSuggestionsResource(client, boundParams);
}
