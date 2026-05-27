<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AudiencePreferencesDto_audience_write
{
    public function __construct(
        public readonly ?string $from_email,
        public readonly ?string $from_name,
        public readonly ?string $reply_to,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            from_email: $data['from_email'],
            from_name: $data['from_name'],
            reply_to: $data['reply_to'],
        );
    }

    public function toArray(): array
    {
        return [
            'from_email' => $this->from_email,
            'from_name' => $this->from_name,
            'reply_to' => $this->reply_to,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            from_email: array_key_exists('from_email', $fields) ? $fields['from_email'] : $this->from_email,
            from_name: array_key_exists('from_name', $fields) ? $fields['from_name'] : $this->from_name,
            reply_to: array_key_exists('reply_to', $fields) ? $fields['reply_to'] : $this->reply_to,
        );
    }
}
