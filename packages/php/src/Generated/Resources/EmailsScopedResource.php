<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

final class EmailsScopedResource
{
    public readonly EmailsAttachmentsResource $attachments;

    public function __construct(
        \Easymailing\Sdk\Easymailing $client,
        private readonly string $emailUuid
    ) {
        $this->attachments = new EmailsAttachmentsResource($client, ['emailUuid' => $this->emailUuid]);
    }

}
