// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailSequencesAssetsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async update(assetUuid: string): Promise<components["schemas"]["EmailSequenceAsset-email_sequence_asset.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequenceAsset-email_sequence_asset.read"]>({
      method: "PUT",
      path: pathWithParams("/email_sequences/{uuid}/assets/{assetUuid}", { uuid: this.boundParams["uuid"]!, assetUuid: assetUuid }),
      pathTemplate: "/email_sequences/{uuid}/assets/{assetUuid}",
    });
    return result.data;
  }

}

export function createEmailSequencesAssetsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailSequencesAssetsResource {
  return new EmailSequencesAssetsResource(client, boundParams);
}
