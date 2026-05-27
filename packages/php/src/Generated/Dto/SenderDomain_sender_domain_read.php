<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SenderDomain_sender_domain_read
{
    public function __construct(
        public readonly ?bool $aligned = null,
        public readonly ?bool $authenticated = null,
        public readonly ?string $authentication_info_url = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var list<array>|null */
        public readonly ?array $dns_records = null,
        public readonly ?string $domain = null,
        public readonly ?string $email = null,
        public readonly ?int $id = null,
        public readonly ?bool $links_aligned = null,
        public readonly ?string $subdomain = null,
        public readonly ?string $tracking_subdomain = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
        public readonly ?bool $verified = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            aligned: $data['aligned'] ?? null,
            authenticated: $data['authenticated'] ?? null,
            authentication_info_url: $data['authentication_info_url'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            dns_records: $data['dns_records'] ?? null,
            domain: $data['domain'] ?? null,
            email: $data['email'] ?? null,
            id: $data['id'] ?? null,
            links_aligned: $data['links_aligned'] ?? null,
            subdomain: $data['subdomain'] ?? null,
            tracking_subdomain: $data['tracking_subdomain'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
            verified: $data['verified'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'aligned' => $this->aligned,
            'authenticated' => $this->authenticated,
            'authentication_info_url' => $this->authentication_info_url,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'dns_records' => $this->dns_records,
            'domain' => $this->domain,
            'email' => $this->email,
            'id' => $this->id,
            'links_aligned' => $this->links_aligned,
            'subdomain' => $this->subdomain,
            'tracking_subdomain' => $this->tracking_subdomain,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'verified' => $this->verified,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            aligned: array_key_exists('aligned', $fields) ? $fields['aligned'] : $this->aligned,
            authenticated: array_key_exists('authenticated', $fields) ? $fields['authenticated'] : $this->authenticated,
            authentication_info_url: array_key_exists('authentication_info_url', $fields) ? $fields['authentication_info_url'] : $this->authentication_info_url,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            dns_records: array_key_exists('dns_records', $fields) ? $fields['dns_records'] : $this->dns_records,
            domain: array_key_exists('domain', $fields) ? $fields['domain'] : $this->domain,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            links_aligned: array_key_exists('links_aligned', $fields) ? $fields['links_aligned'] : $this->links_aligned,
            subdomain: array_key_exists('subdomain', $fields) ? $fields['subdomain'] : $this->subdomain,
            tracking_subdomain: array_key_exists('tracking_subdomain', $fields) ? $fields['tracking_subdomain'] : $this->tracking_subdomain,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            verified: array_key_exists('verified', $fields) ? $fields['verified'] : $this->verified,
        );
    }
}
