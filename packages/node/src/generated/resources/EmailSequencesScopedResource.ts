// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createEmailSequencesActivityResource, type EmailSequencesActivityResource } from "./EmailSequencesActivityResource.js";
import { createEmailSequencesAssetsResource, type EmailSequencesAssetsResource } from "./EmailSequencesAssetsResource.js";
import { createEmailSequencesEnrollmentsResource, type EmailSequencesEnrollmentsResource } from "./EmailSequencesEnrollmentsResource.js";
import { createEmailSequencesVersionsResource, type EmailSequencesVersionsResource } from "./EmailSequencesVersionsResource.js";

export class EmailSequencesScopedResource {
  public readonly activity: EmailSequencesActivityResource;
  public readonly assets: EmailSequencesAssetsResource;
  public readonly enrollments: EmailSequencesEnrollmentsResource;
  public readonly versions: EmailSequencesVersionsResource;

  constructor(private readonly client: Easymailing, private readonly uuid: string) {
    this.activity = createEmailSequencesActivityResource(client, { uuid: uuid });
    this.assets = createEmailSequencesAssetsResource(client, { uuid: uuid });
    this.enrollments = createEmailSequencesEnrollmentsResource(client, { uuid: uuid });
    this.versions = createEmailSequencesVersionsResource(client, { uuid: uuid });
  }
}
