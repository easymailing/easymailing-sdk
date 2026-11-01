// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailSequencesEnrollmentsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_email_sequence_enrollments"]["parameters"]["query"]>): Promise<Page<components["schemas"]["EmailSequenceEnrollment-email_sequence_enrollment.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/email_sequences/{uuid}/enrollments", { uuid: this.boundParams["uuid"]! }),
      pathTemplate: "/email_sequences/{uuid}/enrollments",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async exclude(enrollmentUuid: string): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/exclude", { uuid: this.boundParams["uuid"]!, enrollmentUuid: enrollmentUuid }),
      pathTemplate: "/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/exclude",
    });
    return result.data;
  }

  async pause(enrollmentUuid: string): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/pause", { uuid: this.boundParams["uuid"]!, enrollmentUuid: enrollmentUuid }),
      pathTemplate: "/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/pause",
    });
    return result.data;
  }

  async resume(enrollmentUuid: string): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/resume", { uuid: this.boundParams["uuid"]!, enrollmentUuid: enrollmentUuid }),
      pathTemplate: "/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/resume",
    });
    return result.data;
  }

  async retry(enrollmentUuid: string): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/retry", { uuid: this.boundParams["uuid"]!, enrollmentUuid: enrollmentUuid }),
      pathTemplate: "/email_sequences/{uuid}/enrollments/{enrollmentUuid}/actions/retry",
    });
    return result.data;
  }

}

export function createEmailSequencesEnrollmentsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailSequencesEnrollmentsResource {
  return new EmailSequencesEnrollmentsResource(client, boundParams);
}
