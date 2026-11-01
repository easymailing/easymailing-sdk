<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Resources;

final class ContactFilterFieldsScopedResource
{
    public readonly ContactFilterFieldsSuggestionsResource $suggestions;

    public function __construct(
        \Easymailing\Sdk\Easymailing $client,
        private readonly string $fieldId
    ) {
        $this->suggestions = new ContactFilterFieldsSuggestionsResource($client, ['fieldId' => $this->fieldId]);
    }

}
