// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class NotesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_notes"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Note-note.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/notes", {  }),
      pathTemplate: "/notes",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Note.NoteCreateInput"]): Promise<components["schemas"]["Note-note.read"]> {
    const result = await this.client.request<components["schemas"]["Note-note.read"]>({
      method: "POST",
      path: pathWithParams("/notes", {  }),
      pathTemplate: "/notes",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Note-note.read"]> {
    const result = await this.client.request<components["schemas"]["Note-note.read"]>({
      method: "GET",
      path: pathWithParams("/notes/{uuid}", { uuid: uuid }),
      pathTemplate: "/notes/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Note.NoteUpdateInput"]): Promise<components["schemas"]["Note-note.read"]> {
    const result = await this.client.request<components["schemas"]["Note-note.read"]>({
      method: "PUT",
      path: pathWithParams("/notes/{uuid}", { uuid: uuid }),
      pathTemplate: "/notes/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string, query?: NonNullable<operations["delete_note"]["parameters"]["query"]>): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/notes/{uuid}", { uuid: uuid }),
      pathTemplate: "/notes/{uuid}",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return;
  }

}

export function createNotesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): NotesResource {
  return new NotesResource(client, boundParams);
}
