<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListGdpr
{
    public function __construct(
        public readonly ?string $data_manager = null,
        public readonly ?bool $enabled = null,
        /** @var list<mixed>|null */
        public readonly ?array $list_gdpr_treatment_purposes = null,
        public readonly ?string $privacy_url = null,
        /** @var list<string>|null */
        public readonly ?array $treatment_purposes = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            data_manager: $data['data_manager'] ?? null,
            enabled: $data['enabled'] ?? null,
            list_gdpr_treatment_purposes: $data['list_gdpr_treatment_purposes'] ?? null,
            privacy_url: $data['privacy_url'] ?? null,
            treatment_purposes: $data['treatment_purposes'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'data_manager' => $this->data_manager,
            'enabled' => $this->enabled,
            'list_gdpr_treatment_purposes' => $this->list_gdpr_treatment_purposes,
            'privacy_url' => $this->privacy_url,
            'treatment_purposes' => $this->treatment_purposes,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            data_manager: array_key_exists('data_manager', $fields) ? $fields['data_manager'] : $this->data_manager,
            enabled: array_key_exists('enabled', $fields) ? $fields['enabled'] : $this->enabled,
            list_gdpr_treatment_purposes: array_key_exists('list_gdpr_treatment_purposes', $fields) ? $fields['list_gdpr_treatment_purposes'] : $this->list_gdpr_treatment_purposes,
            privacy_url: array_key_exists('privacy_url', $fields) ? $fields['privacy_url'] : $this->privacy_url,
            treatment_purposes: array_key_exists('treatment_purposes', $fields) ? $fields['treatment_purposes'] : $this->treatment_purposes,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
