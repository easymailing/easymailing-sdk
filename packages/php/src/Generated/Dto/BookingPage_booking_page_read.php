<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingPage_booking_page_read
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\BookingPageCheckStatus $calendar_status = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $configuration = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $host_image_url = null,
        public readonly ?string $host_name = null,
        public readonly ?string $iri = null,
        public readonly ?string $logo_url = null,
        public readonly ?string $public_url = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\BookingPageCheckStatus $sender_status = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $sharing = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\BookingPageState $state = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            calendar_status: isset($data['calendar_status']) ? \Easymailing\Sdk\Generated\Enum\BookingPageCheckStatus::from($data['calendar_status']) : null,
            configuration: $data['configuration'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            host_image_url: $data['host_image_url'] ?? null,
            host_name: $data['host_name'] ?? null,
            iri: $data['iri'] ?? null,
            logo_url: $data['logo_url'] ?? null,
            public_url: $data['public_url'] ?? null,
            sender_status: isset($data['sender_status']) ? \Easymailing\Sdk\Generated\Enum\BookingPageCheckStatus::from($data['sender_status']) : null,
            sharing: $data['sharing'] ?? null,
            state: isset($data['state']) ? \Easymailing\Sdk\Generated\Enum\BookingPageState::from($data['state']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
            version: $data['version'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'calendar_status' => $this->calendar_status?->value,
            'configuration' => $this->configuration,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'host_image_url' => $this->host_image_url,
            'host_name' => $this->host_name,
            'iri' => $this->iri,
            'logo_url' => $this->logo_url,
            'public_url' => $this->public_url,
            'sender_status' => $this->sender_status?->value,
            'sharing' => $this->sharing,
            'state' => $this->state?->value,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'version' => $this->version,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            calendar_status: array_key_exists('calendar_status', $fields) ? $fields['calendar_status'] : $this->calendar_status,
            configuration: array_key_exists('configuration', $fields) ? $fields['configuration'] : $this->configuration,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            host_image_url: array_key_exists('host_image_url', $fields) ? $fields['host_image_url'] : $this->host_image_url,
            host_name: array_key_exists('host_name', $fields) ? $fields['host_name'] : $this->host_name,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            logo_url: array_key_exists('logo_url', $fields) ? $fields['logo_url'] : $this->logo_url,
            public_url: array_key_exists('public_url', $fields) ? $fields['public_url'] : $this->public_url,
            sender_status: array_key_exists('sender_status', $fields) ? $fields['sender_status'] : $this->sender_status,
            sharing: array_key_exists('sharing', $fields) ? $fields['sharing'] : $this->sharing,
            state: array_key_exists('state', $fields) ? $fields['state'] : $this->state,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            version: array_key_exists('version', $fields) ? $fields['version'] : $this->version,
        );
    }
}
