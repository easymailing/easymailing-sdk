// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";
import { EmailSequencesScopedResource } from "./EmailSequencesScopedResource.js";

export class EmailSequencesCollectionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_email_sequences"]["parameters"]["query"]>): Promise<Page<components["schemas"]["EmailSequence-email_sequence.list"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/email_sequences", {  }),
      pathTemplate: "/email_sequences",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async listPersonalizationTags(query?: NonNullable<operations["list_email_sequence_personalization_tags"]["parameters"]["query"]>): Promise<Page<components["schemas"]["EmailSequencePersonalizationTag-email_sequence_personalization_tag.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/email_sequences/personalization_tags", {  }),
      pathTemplate: "/email_sequences/personalization_tags",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["EmailSequence.EmailSequenceCreateInput"]): Promise<components["schemas"]["EmailSequence-email_sequence.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequence-email_sequence.read"]>({
      method: "POST",
      path: pathWithParams("/email_sequences", {  }),
      pathTemplate: "/email_sequences",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["EmailSequence-email_sequence.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequence-email_sequence.read"]>({
      method: "GET",
      path: pathWithParams("/email_sequences/{uuid}", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}",
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/email_sequences/{uuid}", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}",
    });
    return;
  }

  async archive(uuid: string): Promise<components["schemas"]["EmailSequence-email_sequence.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequence-email_sequence.read"]>({
      method: "PUT",
      path: pathWithParams("/email_sequences/{uuid}/actions/archive", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}/actions/archive",
    });
    return result.data;
  }

  async duplicate(uuid: string, body: components["schemas"]["EmailSequence.EmailSequenceDuplicateInput"]): Promise<components["schemas"]["EmailSequence-email_sequence.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequence-email_sequence.read"]>({
      method: "POST",
      path: pathWithParams("/email_sequences/{uuid}/actions/duplicate", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}/actions/duplicate",
      body,
    });
    return result.data;
  }

  async enroll(uuid: string, body: components["schemas"]["EmailSequenceEnrollmentRun.EmailSequenceEnrollInput"]): Promise<components["schemas"]["EmailSequenceEnrollmentRun-email_sequence_enrollment_run.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequenceEnrollmentRun-email_sequence_enrollment_run.read"]>({
      method: "POST",
      path: pathWithParams("/email_sequences/{uuid}/actions/enroll", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}/actions/enroll",
      body,
    });
    return result.data;
  }

  async pause(uuid: string): Promise<components["schemas"]["EmailSequence-email_sequence.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequence-email_sequence.read"]>({
      method: "PUT",
      path: pathWithParams("/email_sequences/{uuid}/actions/pause", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}/actions/pause",
    });
    return result.data;
  }

  async publish(uuid: string, body: components["schemas"]["EmailSequence.EmailSequencePublishInput"]): Promise<components["schemas"]["EmailSequence-email_sequence.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequence-email_sequence.read"]>({
      method: "POST",
      path: pathWithParams("/email_sequences/{uuid}/actions/publish", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}/actions/publish",
      body,
    });
    return result.data;
  }

  async reactivate(uuid: string): Promise<components["schemas"]["EmailSequence-email_sequence.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequence-email_sequence.read"]>({
      method: "PUT",
      path: pathWithParams("/email_sequences/{uuid}/actions/reactivate", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}/actions/reactivate",
    });
    return result.data;
  }

  async restore(uuid: string): Promise<components["schemas"]["EmailSequence-email_sequence.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequence-email_sequence.read"]>({
      method: "PUT",
      path: pathWithParams("/email_sequences/{uuid}/actions/restore", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}/actions/restore",
    });
    return result.data;
  }

  async resume(uuid: string): Promise<components["schemas"]["EmailSequence-email_sequence.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequence-email_sequence.read"]>({
      method: "PUT",
      path: pathWithParams("/email_sequences/{uuid}/actions/resume", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}/actions/resume",
    });
    return result.data;
  }

  async getStatistics(uuid: string, query?: NonNullable<operations["get_email_sequence_statistics"]["parameters"]["query"]>): Promise<components["schemas"]["EmailSequenceStatistics-email_sequence_statistics.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequenceStatistics-email_sequence_statistics.read"]>({
      method: "GET",
      path: pathWithParams("/email_sequences/{uuid}/statistics", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}/statistics",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return result.data;
  }

  async getValidation(uuid: string): Promise<components["schemas"]["EmailSequenceValidation-email_sequence_validation.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequenceValidation-email_sequence_validation.read"]>({
      method: "GET",
      path: pathWithParams("/email_sequences/{uuid}/validation", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}/validation",
    });
    return result.data;
  }

  async updateDraft(uuid: string, body: components["schemas"]["EmailSequence.EmailSequenceDraftInput"]): Promise<components["schemas"]["EmailSequence-email_sequence.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSequence-email_sequence.read"]>({
      method: "PUT",
      path: pathWithParams("/email_sequences/{uuid}/draft", { uuid: uuid }),
      pathTemplate: "/email_sequences/{uuid}/draft",
      body,
    });
    return result.data;
  }

}

export type EmailSequencesResource = EmailSequencesCollectionResource & ((uuid: string) => EmailSequencesScopedResource);

export function createEmailSequencesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailSequencesResource {
  const collection = new EmailSequencesCollectionResource(client, boundParams);
  const callable = ((uuid: string) =>
    new EmailSequencesScopedResource(client, uuid)) as EmailSequencesResource;
  Object.setPrototypeOf(callable, EmailSequencesCollectionResource.prototype);
  Object.assign(callable, collection);
  return callable;
}
