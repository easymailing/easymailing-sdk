// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailDraftsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_email_drafts"]["parameters"]["query"]>): Promise<Page<components["schemas"]["EmailDraft-email_draft.list"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/email_drafts", {  }),
      pathTemplate: "/email_drafts",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["EmailDraft.EmailDraftCreateInput"]): Promise<components["schemas"]["EmailDraft-email_draft.list"]> {
    const result = await this.client.request<components["schemas"]["EmailDraft-email_draft.list"]>({
      method: "POST",
      path: pathWithParams("/email_drafts", {  }),
      pathTemplate: "/email_drafts",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["EmailDraft-email_draft.read"]> {
    const result = await this.client.request<components["schemas"]["EmailDraft-email_draft.read"]>({
      method: "GET",
      path: pathWithParams("/email_drafts/{uuid}", { uuid: uuid }),
      pathTemplate: "/email_drafts/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["EmailDraft.EmailDraftUpdateInput"]): Promise<components["schemas"]["EmailDraft-email_draft.list"]> {
    const result = await this.client.request<components["schemas"]["EmailDraft-email_draft.list"]>({
      method: "PUT",
      path: pathWithParams("/email_drafts/{uuid}", { uuid: uuid }),
      pathTemplate: "/email_drafts/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/email_drafts/{uuid}", { uuid: uuid }),
      pathTemplate: "/email_drafts/{uuid}",
    });
    return;
  }

}

export function createEmailDraftsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailDraftsResource {
  return new EmailDraftsResource(client, boundParams);
}
