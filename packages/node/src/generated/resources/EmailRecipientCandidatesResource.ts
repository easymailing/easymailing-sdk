// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailRecipientCandidatesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_email_recipient_candidates"]["parameters"]["query"]>): Promise<Page<components["schemas"]["EmailRecipientCandidate-email_recipient_candidate.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/email_recipient_candidates", {  }),
      pathTemplate: "/email_recipient_candidates",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createEmailRecipientCandidatesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailRecipientCandidatesResource {
  return new EmailRecipientCandidatesResource(client, boundParams);
}
