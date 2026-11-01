// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailPersonalizationPreviewsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async create(body: components["schemas"]["EmailPersonalizationPreview.EmailPersonalizationPreviewInput"]): Promise<components["schemas"]["EmailPersonalizationPreview-email_personalization_preview.read"]> {
    const result = await this.client.request<components["schemas"]["EmailPersonalizationPreview-email_personalization_preview.read"]>({
      method: "POST",
      path: pathWithParams("/email_personalization_previews", {  }),
      pathTemplate: "/email_personalization_previews",
      body,
    });
    return result.data;
  }

}

export function createEmailPersonalizationPreviewsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailPersonalizationPreviewsResource {
  return new EmailPersonalizationPreviewsResource(client, boundParams);
}
