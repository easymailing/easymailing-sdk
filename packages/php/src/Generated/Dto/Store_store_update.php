<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Store_store_update
{
    public function __construct(
        public readonly string $domain,
        public readonly string $locale,
        public readonly string $name,
        public readonly string $timezone,
        public readonly ?string $group = null,
        public readonly ?string $platform = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            domain: $data['domain'],
            locale: $data['locale'],
            name: $data['name'],
            timezone: $data['timezone'],
            group: $data['group'] ?? null,
            platform: $data['platform'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'domain' => $this->domain,
            'locale' => $this->locale,
            'name' => $this->name,
            'timezone' => $this->timezone,
            'group' => $this->group,
            'platform' => $this->platform,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            domain: array_key_exists('domain', $fields) ? $fields['domain'] : $this->domain,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            timezone: array_key_exists('timezone', $fields) ? $fields['timezone'] : $this->timezone,
            group: array_key_exists('group', $fields) ? $fields['group'] : $this->group,
            platform: array_key_exists('platform', $fields) ? $fields['platform'] : $this->platform,
        );
    }
}
