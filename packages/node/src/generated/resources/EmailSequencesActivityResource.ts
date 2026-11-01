// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailSequencesActivityResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_email_sequence_activity"]["parameters"]["query"]>): Promise<Page<components["schemas"]["EmailSequenceActivity-email_sequence_activity.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/email_sequences/{uuid}/activity", { uuid: this.boundParams["uuid"]! }),
      pathTemplate: "/email_sequences/{uuid}/activity",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createEmailSequencesActivityResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailSequencesActivityResource {
  return new EmailSequencesActivityResource(client, boundParams);
}
