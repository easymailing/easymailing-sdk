<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AudienceResourcesDto_jsonld_audience_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?int $automations = null,
        public readonly ?int $campaigns = null,
        public readonly ?int $landing_pages = null,
        public readonly ?int $subscription_forms = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            automations: $data['automations'] ?? null,
            campaigns: $data['campaigns'] ?? null,
            landing_pages: $data['landing_pages'] ?? null,
            subscription_forms: $data['subscription_forms'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'automations' => $this->automations,
            'campaigns' => $this->campaigns,
            'landing_pages' => $this->landing_pages,
            'subscription_forms' => $this->subscription_forms,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            automations: array_key_exists('automations', $fields) ? $fields['automations'] : $this->automations,
            campaigns: array_key_exists('campaigns', $fields) ? $fields['campaigns'] : $this->campaigns,
            landing_pages: array_key_exists('landing_pages', $fields) ? $fields['landing_pages'] : $this->landing_pages,
            subscription_forms: array_key_exists('subscription_forms', $fields) ? $fields['subscription_forms'] : $this->subscription_forms,
        );
    }
}
