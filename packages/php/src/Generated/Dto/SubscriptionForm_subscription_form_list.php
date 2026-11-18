<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SubscriptionForm_subscription_form_list
{
    public function __construct(
        public readonly ?string $audience = null,
        /** @var list<string>|null */
        public readonly ?array $channels = null,
        public readonly ?\DateTimeImmutable $converted_at = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SubscriptionFormGeneration $generation = null,
        public readonly ?string $iri = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriptionFormStatus $status = null,
        public readonly ?int $subscriber_count = null,
        public readonly ?string $title = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriptionFormType $type = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'] ?? null,
            channels: $data['channels'] ?? null,
            converted_at: isset($data['converted_at']) ? new \DateTimeImmutable($data['converted_at']) : null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            generation: isset($data['generation']) ? \Easymailing\Sdk\Generated\Enum\SubscriptionFormGeneration::from($data['generation']) : null,
            iri: $data['iri'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\SuscriptionFormStatus::from($data['status']) : null,
            subscriber_count: $data['subscriber_count'] ?? null,
            title: $data['title'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\SuscriptionFormType::from($data['type']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'channels' => $this->channels,
            'converted_at' => $this->converted_at?->format(\DateTimeInterface::ATOM),
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'generation' => $this->generation?->value,
            'iri' => $this->iri,
            'status' => $this->status?->value,
            'subscriber_count' => $this->subscriber_count,
            'title' => $this->title,
            'type' => $this->type?->value,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            channels: array_key_exists('channels', $fields) ? $fields['channels'] : $this->channels,
            converted_at: array_key_exists('converted_at', $fields) ? $fields['converted_at'] : $this->converted_at,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            generation: array_key_exists('generation', $fields) ? $fields['generation'] : $this->generation,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            subscriber_count: array_key_exists('subscriber_count', $fields) ? $fields['subscriber_count'] : $this->subscriber_count,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
