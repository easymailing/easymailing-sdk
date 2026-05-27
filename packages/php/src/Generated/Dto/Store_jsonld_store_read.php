<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Store_jsonld_store_read
{
    public function __construct(
        public readonly string $audience,
        public readonly string $domain,
        public readonly string $locale,
        public readonly string $name,
        public readonly string $resource_id,
        public readonly string $timezone,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $group = null,
        public readonly ?string $platform = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'],
            domain: $data['domain'],
            locale: $data['locale'],
            name: $data['name'],
            resource_id: $data['resource_id'],
            timezone: $data['timezone'],
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            group: $data['group'] ?? null,
            platform: $data['platform'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'domain' => $this->domain,
            'locale' => $this->locale,
            'name' => $this->name,
            'resource_id' => $this->resource_id,
            'timezone' => $this->timezone,
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'group' => $this->group,
            'platform' => $this->platform,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            domain: array_key_exists('domain', $fields) ? $fields['domain'] : $this->domain,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            resource_id: array_key_exists('resource_id', $fields) ? $fields['resource_id'] : $this->resource_id,
            timezone: array_key_exists('timezone', $fields) ? $fields['timezone'] : $this->timezone,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            group: array_key_exists('group', $fields) ? $fields['group'] : $this->group,
            platform: array_key_exists('platform', $fields) ? $fields['platform'] : $this->platform,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
        );
    }
}
