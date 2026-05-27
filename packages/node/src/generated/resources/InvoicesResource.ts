// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class InvoicesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_invoices"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Invoice-invoice.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/invoices", {  }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["Invoice-invoice.read"]> {
    const result = await this.client.request<components["schemas"]["Invoice-invoice.read"]>({
      method: "GET",
      path: pathWithParams("/invoices/{uuid}", { uuid: uuid }),
    });
    return result.data;
  }

}

export function createInvoicesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): InvoicesResource {
  return new InvoicesResource(client, boundParams);
}
