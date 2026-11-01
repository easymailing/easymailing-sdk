// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class ContactSegmentsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_contact_segments"]["parameters"]["query"]>): Promise<Page<components["schemas"]["ContactSegment-contact_segment.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/contact_segments", {  }),
      pathTemplate: "/contact_segments",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["ContactSegment.ContactSegmentCreateInput"]): Promise<components["schemas"]["ContactSegment-contact_segment.read"]> {
    const result = await this.client.request<components["schemas"]["ContactSegment-contact_segment.read"]>({
      method: "POST",
      path: pathWithParams("/contact_segments", {  }),
      pathTemplate: "/contact_segments",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["ContactSegment-contact_segment.read"]> {
    const result = await this.client.request<components["schemas"]["ContactSegment-contact_segment.read"]>({
      method: "GET",
      path: pathWithParams("/contact_segments/{uuid}", { uuid: uuid }),
      pathTemplate: "/contact_segments/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["ContactSegment.ContactSegmentUpdateInput"]): Promise<components["schemas"]["ContactSegment-contact_segment.read"]> {
    const result = await this.client.request<components["schemas"]["ContactSegment-contact_segment.read"]>({
      method: "PUT",
      path: pathWithParams("/contact_segments/{uuid}", { uuid: uuid }),
      pathTemplate: "/contact_segments/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string, query?: NonNullable<operations["delete_contact_segment"]["parameters"]["query"]>): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/contact_segments/{uuid}", { uuid: uuid }),
      pathTemplate: "/contact_segments/{uuid}",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return;
  }

}

export function createContactSegmentsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ContactSegmentsResource {
  return new ContactSegmentsResource(client, boundParams);
}
