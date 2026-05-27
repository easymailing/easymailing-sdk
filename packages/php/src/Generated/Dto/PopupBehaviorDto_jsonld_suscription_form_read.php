<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class PopupBehaviorDto_jsonld_suscription_form_read
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $frequency = null,
        public readonly ?string $iri = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $schedule = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $triggers = null,
        public readonly ?string $uuid = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $visibility = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            frequency: $data['frequency'] ?? null,
            iri: $data['iri'] ?? null,
            schedule: $data['schedule'] ?? null,
            triggers: $data['triggers'] ?? null,
            uuid: $data['uuid'] ?? null,
            visibility: $data['visibility'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'frequency' => $this->frequency,
            'iri' => $this->iri,
            'schedule' => $this->schedule,
            'triggers' => $this->triggers,
            'uuid' => $this->uuid,
            'visibility' => $this->visibility,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            frequency: array_key_exists('frequency', $fields) ? $fields['frequency'] : $this->frequency,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            schedule: array_key_exists('schedule', $fields) ? $fields['schedule'] : $this->schedule,
            triggers: array_key_exists('triggers', $fields) ? $fields['triggers'] : $this->triggers,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            visibility: array_key_exists('visibility', $fields) ? $fields['visibility'] : $this->visibility,
        );
    }
}
