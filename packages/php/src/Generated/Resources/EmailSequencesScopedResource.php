<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

final class EmailSequencesScopedResource
{
    public readonly EmailSequencesActivityResource $activity;
    public readonly EmailSequencesAssetsResource $assets;
    public readonly EmailSequencesEnrollmentsResource $enrollments;
    public readonly EmailSequencesVersionsResource $versions;

    public function __construct(
        \Easymailing\Sdk\Easymailing $client,
        private readonly string $uuid
    ) {
        $this->activity = new EmailSequencesActivityResource($client, ['uuid' => $this->uuid]);
        $this->assets = new EmailSequencesAssetsResource($client, ['uuid' => $this->uuid]);
        $this->enrollments = new EmailSequencesEnrollmentsResource($client, ['uuid' => $this->uuid]);
        $this->versions = new EmailSequencesVersionsResource($client, ['uuid' => $this->uuid]);
    }

}
