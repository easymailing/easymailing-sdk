// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createEmailsAttachmentsResource, type EmailsAttachmentsResource } from "./EmailsAttachmentsResource.js";

export class EmailsScopedResource {
  public readonly attachments: EmailsAttachmentsResource;

  constructor(private readonly client: Easymailing, private readonly emailUuid: string) {
    this.attachments = createEmailsAttachmentsResource(client, { emailUuid: emailUuid });
  }
}
