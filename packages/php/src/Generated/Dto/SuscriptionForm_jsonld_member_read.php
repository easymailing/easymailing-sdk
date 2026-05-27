<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SuscriptionForm_jsonld_member_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?bool $active = null,
        public readonly ?string $domain = null,
        public readonly ?bool $double_opt_in = null,
        public readonly ?bool $paused = null,
        public readonly ?string $title = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriptionFormType $type = null,
        public readonly ?string $url = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            active: $data['active'] ?? null,
            domain: $data['domain'] ?? null,
            double_opt_in: $data['double_opt_in'] ?? null,
            paused: $data['paused'] ?? null,
            title: $data['title'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\SuscriptionFormType::from($data['type']) : null,
            url: $data['url'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'active' => $this->active,
            'domain' => $this->domain,
            'double_opt_in' => $this->double_opt_in,
            'paused' => $this->paused,
            'title' => $this->title,
            'type' => $this->type?->value,
            'url' => $this->url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
            domain: array_key_exists('domain', $fields) ? $fields['domain'] : $this->domain,
            double_opt_in: array_key_exists('double_opt_in', $fields) ? $fields['double_opt_in'] : $this->double_opt_in,
            paused: array_key_exists('paused', $fields) ? $fields['paused'] : $this->paused,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
        );
    }
}
