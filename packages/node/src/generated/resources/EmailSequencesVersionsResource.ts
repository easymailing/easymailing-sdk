// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailSequencesVersionsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(revision: string): Promise<components["schemas"]["EmailSequenceVersion-email_sequence_version.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequenceVersion-email_sequence_version.read"]>({
      method: "GET",
      path: pathWithParams("/email_sequences/{uuid}/versions/{revision}", { uuid: this.boundParams["uuid"]!, revision: revision }),
      pathTemplate: "/email_sequences/{uuid}/versions/{revision}",
    });
    return result.data;
  }

}

export function createEmailSequencesVersionsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailSequencesVersionsResource {
  return new EmailSequencesVersionsResource(client, boundParams);
}
