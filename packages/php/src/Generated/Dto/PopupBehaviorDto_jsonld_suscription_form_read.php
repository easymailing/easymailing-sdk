<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class PopupBehaviorDto_jsonld_suscription_form_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?array $frequency = null,
        public readonly ?array $schedule = null,
        public readonly ?array $triggers = null,
        public readonly ?array $visibility = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            frequency: $data['frequency'] ?? null,
            schedule: $data['schedule'] ?? null,
            triggers: $data['triggers'] ?? null,
            visibility: $data['visibility'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'frequency' => $this->frequency,
            'schedule' => $this->schedule,
            'triggers' => $this->triggers,
            'visibility' => $this->visibility,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            frequency: array_key_exists('frequency', $fields) ? $fields['frequency'] : $this->frequency,
            schedule: array_key_exists('schedule', $fields) ? $fields['schedule'] : $this->schedule,
            triggers: array_key_exists('triggers', $fields) ? $fields['triggers'] : $this->triggers,
            visibility: array_key_exists('visibility', $fields) ? $fields['visibility'] : $this->visibility,
        );
    }
}
