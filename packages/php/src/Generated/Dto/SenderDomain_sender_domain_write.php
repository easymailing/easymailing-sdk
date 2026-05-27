<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SenderDomain_sender_domain_write
{
    public function __construct(
        public readonly string $email,
        public readonly ?bool $links_aligned = null,
        public readonly ?string $tracking_subdomain = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'],
            links_aligned: $data['links_aligned'] ?? null,
            tracking_subdomain: $data['tracking_subdomain'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'links_aligned' => $this->links_aligned,
            'tracking_subdomain' => $this->tracking_subdomain,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            links_aligned: array_key_exists('links_aligned', $fields) ? $fields['links_aligned'] : $this->links_aligned,
            tracking_subdomain: array_key_exists('tracking_subdomain', $fields) ? $fields['tracking_subdomain'] : $this->tracking_subdomain,
        );
    }
}
