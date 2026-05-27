// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class SupportResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async listTickets(query?: NonNullable<operations["list_support_tickets"]["parameters"]["query"]>): Promise<Page<components["schemas"]["SupportTicket-support_ticket.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/support/tickets", {  }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async createTickets(body: components["schemas"]["SupportTicket.SupportTicketInput"]): Promise<components["schemas"]["SupportTicket-support_ticket.read"]> {
    const result = await this.client.request<components["schemas"]["SupportTicket-support_ticket.read"]>({
      method: "POST",
      path: pathWithParams("/support/tickets", {  }),
      body,
    });
    return result.data;
  }

}

export function createSupportResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): SupportResource {
  return new SupportResource(client, boundParams);
}
