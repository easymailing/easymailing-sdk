<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AudiencePreferencesDto_jsonld_audience_read
{
    public function __construct(
        public readonly ?Sender_jsonld_audience_read $from_email,
        public readonly ?string $from_name,
        public readonly ?Sender_jsonld_audience_read $reply_to,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            from_email: isset($data['from_email']) ? Sender_jsonld_audience_read::fromArray($data['from_email']) : null,
            from_name: $data['from_name'],
            reply_to: isset($data['reply_to']) ? Sender_jsonld_audience_read::fromArray($data['reply_to']) : null,
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'from_email' => $this->from_email?->toArray(),
            'from_name' => $this->from_name,
            'reply_to' => $this->reply_to?->toArray(),
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            from_email: array_key_exists('from_email', $fields) ? $fields['from_email'] : $this->from_email,
            from_name: array_key_exists('from_name', $fields) ? $fields['from_name'] : $this->from_name,
            reply_to: array_key_exists('reply_to', $fields) ? $fields['reply_to'] : $this->reply_to,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
        );
    }
}
