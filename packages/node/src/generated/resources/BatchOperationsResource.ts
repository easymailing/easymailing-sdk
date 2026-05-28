// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class BatchOperationsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_batch_operations"]["parameters"]["query"]>): Promise<Page<components["schemas"]["BatchOperation-batch_operation.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/batch_operations", {  }),
      pathTemplate: "/batch_operations",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["BatchOperation-batch_operation.write"]): Promise<components["schemas"]["BatchOperation-batch_operation.read"]> {
    const result = await this.client.request<components["schemas"]["BatchOperation-batch_operation.read"]>({
      method: "POST",
      path: pathWithParams("/batch_operations", {  }),
      pathTemplate: "/batch_operations",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["BatchOperation-batch_operation.read"]> {
    const result = await this.client.request<components["schemas"]["BatchOperation-batch_operation.read"]>({
      method: "GET",
      path: pathWithParams("/batch_operations/{uuid}", { uuid: uuid }),
      pathTemplate: "/batch_operations/{uuid}",
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/batch_operations/{uuid}", { uuid: uuid }),
      pathTemplate: "/batch_operations/{uuid}",
    });
    return;
  }

  async regenerateResponseBodyUrl(uuid: string): Promise<components["schemas"]["BatchOperationResource"]> {
    const result = await this.client.request<components["schemas"]["BatchOperationResource"]>({
      method: "PUT",
      path: pathWithParams("/batch_operations/{uuid}/actions/regenerate_response_body_url", { uuid: uuid }),
      pathTemplate: "/batch_operations/{uuid}/actions/regenerate_response_body_url",
    });
    return result.data;
  }

  async getErrors(uuid: string): Promise<components["schemas"]["BatchOperationResource.BatchOperationErrorsResource-batch_operation_errors.read"]> {
    const result = await this.client.request<components["schemas"]["BatchOperationResource.BatchOperationErrorsResource-batch_operation_errors.read"]>({
      method: "GET",
      path: pathWithParams("/batch_operations/{uuid}/errors", { uuid: uuid }),
      pathTemplate: "/batch_operations/{uuid}/errors",
    });
    return result.data;
  }

}

export function createBatchOperationsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): BatchOperationsResource {
  return new BatchOperationsResource(client, boundParams);
}
