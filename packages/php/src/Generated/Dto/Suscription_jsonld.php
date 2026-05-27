<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Suscription_jsonld
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $audience = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var list<string>|null */
        public readonly ?array $custom_fields = null,
        /** @var list<string>|null */
        public readonly ?array $groups = null,
        public readonly ?float $rating = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberSource $source = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberStatus $status = null,
        public readonly ?string $suscriber_consent = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            audience: $data['audience'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            custom_fields: $data['custom_fields'] ?? null,
            groups: $data['groups'] ?? null,
            rating: $data['rating'] ?? null,
            source: isset($data['source']) ? \Easymailing\Sdk\Generated\Enum\SuscriberSource::from($data['source']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\SuscriberStatus::from($data['status']) : null,
            suscriber_consent: $data['suscriber_consent'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'audience' => $this->audience,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'custom_fields' => $this->custom_fields,
            'groups' => $this->groups,
            'rating' => $this->rating,
            'source' => $this->source?->value,
            'status' => $this->status?->value,
            'suscriber_consent' => $this->suscriber_consent,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            custom_fields: array_key_exists('custom_fields', $fields) ? $fields['custom_fields'] : $this->custom_fields,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            rating: array_key_exists('rating', $fields) ? $fields['rating'] : $this->rating,
            source: array_key_exists('source', $fields) ? $fields['source'] : $this->source,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            suscriber_consent: array_key_exists('suscriber_consent', $fields) ? $fields['suscriber_consent'] : $this->suscriber_consent,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
        );
    }
}
