<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingEmailDesign_jsonld_booking_email_design_read
{
    public function __construct(
        public readonly ?string $content_revision = null,
        public readonly ?bool $default = null,
        public readonly ?string $iri = null,
        public readonly ?string $page = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\BookingEmailType $type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            content_revision: $data['content_revision'] ?? null,
            default: $data['default'] ?? null,
            iri: $data['iri'] ?? null,
            page: $data['page'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\BookingEmailType::from($data['type']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'content_revision' => $this->content_revision,
            'default' => $this->default,
            'iri' => $this->iri,
            'page' => $this->page,
            'type' => $this->type?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            content_revision: array_key_exists('content_revision', $fields) ? $fields['content_revision'] : $this->content_revision,
            default: array_key_exists('default', $fields) ? $fields['default'] : $this->default,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            page: array_key_exists('page', $fields) ? $fields['page'] : $this->page,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
