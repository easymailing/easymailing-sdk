<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SuscriptionForm_member_read
{
    public function __construct(
        public readonly ?bool $active = null,
        public readonly ?string $domain = null,
        public readonly ?bool $double_opt_in = null,
        public readonly ?string $iri = null,
        public readonly ?bool $paused = null,
        public readonly ?string $title = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriptionFormType $type = null,
        public readonly ?string $url = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            active: $data['active'] ?? null,
            domain: $data['domain'] ?? null,
            double_opt_in: $data['double_opt_in'] ?? null,
            iri: $data['iri'] ?? null,
            paused: $data['paused'] ?? null,
            title: $data['title'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\SuscriptionFormType::from($data['type']) : null,
            url: $data['url'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'active' => $this->active,
            'domain' => $this->domain,
            'double_opt_in' => $this->double_opt_in,
            'iri' => $this->iri,
            'paused' => $this->paused,
            'title' => $this->title,
            'type' => $this->type?->value,
            'url' => $this->url,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
            domain: array_key_exists('domain', $fields) ? $fields['domain'] : $this->domain,
            double_opt_in: array_key_exists('double_opt_in', $fields) ? $fields['double_opt_in'] : $this->double_opt_in,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            paused: array_key_exists('paused', $fields) ? $fields['paused'] : $this->paused,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
