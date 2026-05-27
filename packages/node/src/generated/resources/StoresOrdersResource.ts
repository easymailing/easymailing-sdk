// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class StoresOrdersResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_store_orders"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Order-order.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/stores/{storeResourceId}/orders", { storeResourceId: this.boundParams["storeResourceId"]! }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Order-order.create"]): Promise<components["schemas"]["Order-order.read"]> {
    const result = await this.client.request<components["schemas"]["Order-order.read"]>({
      method: "POST",
      path: pathWithParams("/stores/{storeResourceId}/orders", { storeResourceId: this.boundParams["storeResourceId"]! }),
      body,
    });
    return result.data;
  }

  async get(resourceId: string): Promise<components["schemas"]["Order-order.read"]> {
    const result = await this.client.request<components["schemas"]["Order-order.read"]>({
      method: "GET",
      path: pathWithParams("/stores/{storeResourceId}/orders/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
    });
    return result.data;
  }

  async update(resourceId: string, body: components["schemas"]["Order-order.update"]): Promise<components["schemas"]["Order-order.read"]> {
    const result = await this.client.request<components["schemas"]["Order-order.read"]>({
      method: "PUT",
      path: pathWithParams("/stores/{storeResourceId}/orders/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
      body,
    });
    return result.data;
  }

  async delete(resourceId: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/stores/{storeResourceId}/orders/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
    });
    return;
  }

  async cancel(resourceId: string, body: components["schemas"]["OrderResource-order.cancel_order"]): Promise<components["schemas"]["OrderResource-order.read"]> {
    const result = await this.client.request<components["schemas"]["OrderResource-order.read"]>({
      method: "PUT",
      path: pathWithParams("/stores/{storeResourceId}/orders/{resourceId}/actions/cancel_order", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
      body,
    });
    return result.data;
  }

  async import(body: components["schemas"]["Order-order.import"]): Promise<components["schemas"]["Order-order.read"]> {
    const result = await this.client.request<components["schemas"]["Order-order.read"]>({
      method: "POST",
      path: pathWithParams("/stores/{storeResourceId}/orders/import", { storeResourceId: this.boundParams["storeResourceId"]! }),
      body,
    });
    return result.data;
  }

  async pay(resourceId: string, body: components["schemas"]["OrderResource-order.pay_order"]): Promise<components["schemas"]["OrderResource-order.read"]> {
    const result = await this.client.request<components["schemas"]["OrderResource-order.read"]>({
      method: "PUT",
      path: pathWithParams("/stores/{storeResourceId}/orders/{resourceId}/actions/pay_order", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
      body,
    });
    return result.data;
  }

  async process(resourceId: string, body: components["schemas"]["OrderResource-order.process_order"]): Promise<components["schemas"]["OrderResource-order.read"]> {
    const result = await this.client.request<components["schemas"]["OrderResource-order.read"]>({
      method: "PUT",
      path: pathWithParams("/stores/{storeResourceId}/orders/{resourceId}/actions/process_order", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
      body,
    });
    return result.data;
  }

  async refund(resourceId: string, body: components["schemas"]["OrderResource-order.refund_order"]): Promise<components["schemas"]["OrderResource-order.read"]> {
    const result = await this.client.request<components["schemas"]["OrderResource-order.read"]>({
      method: "PUT",
      path: pathWithParams("/stores/{storeResourceId}/orders/{resourceId}/actions/refund_order", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
      body,
    });
    return result.data;
  }

  async ship(resourceId: string, body: components["schemas"]["OrderResource-order.ship_order"]): Promise<components["schemas"]["OrderResource-order.read"]> {
    const result = await this.client.request<components["schemas"]["OrderResource-order.read"]>({
      method: "PUT",
      path: pathWithParams("/stores/{storeResourceId}/orders/{resourceId}/actions/ship_order", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
      body,
    });
    return result.data;
  }

}

export function createStoresOrdersResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): StoresOrdersResource {
  return new StoresOrdersResource(client, boundParams);
}
