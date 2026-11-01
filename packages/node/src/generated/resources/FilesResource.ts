// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class FilesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_files"]["parameters"]["query"]>): Promise<Page<components["schemas"]["File-file.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/files", {  }),
      pathTemplate: "/files",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["File.FileCreateInput"]): Promise<components["schemas"]["File-file.read"]> {
    const result = await this.client.request<components["schemas"]["File-file.read"]>({
      method: "POST",
      path: pathWithParams("/files", {  }),
      pathTemplate: "/files",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["File-file.read"]> {
    const result = await this.client.request<components["schemas"]["File-file.read"]>({
      method: "GET",
      path: pathWithParams("/files/{uuid}", { uuid: uuid }),
      pathTemplate: "/files/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["File.FileUpdateInput"]): Promise<components["schemas"]["File-file.read"]> {
    const result = await this.client.request<components["schemas"]["File-file.read"]>({
      method: "PUT",
      path: pathWithParams("/files/{uuid}", { uuid: uuid }),
      pathTemplate: "/files/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string, query?: NonNullable<operations["delete_file"]["parameters"]["query"]>): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/files/{uuid}", { uuid: uuid }),
      pathTemplate: "/files/{uuid}",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return;
  }

  async getContent(uuid: string): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/files/{uuid}/content", { uuid: uuid }),
      pathTemplate: "/files/{uuid}/content",
    });
    return result.data;
  }

  async getStorageUsage(): Promise<components["schemas"]["FileStorageUsage-file_storage_usage.read"]> {
    const result = await this.client.request<components["schemas"]["FileStorageUsage-file_storage_usage.read"]>({
      method: "GET",
      path: pathWithParams("/files/storage_usage", {  }),
      pathTemplate: "/files/storage_usage",
    });
    return result.data;
  }

  async updateContent(uuid: string): Promise<components["schemas"]["File-file.read"]> {
    const result = await this.client.request<components["schemas"]["File-file.read"]>({
      method: "PUT",
      path: pathWithParams("/files/{uuid}/content", { uuid: uuid }),
      pathTemplate: "/files/{uuid}/content",
    });
    return result.data;
  }

}

export function createFilesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): FilesResource {
  return new FilesResource(client, boundParams);
}
