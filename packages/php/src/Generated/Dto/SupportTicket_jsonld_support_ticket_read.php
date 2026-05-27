<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SupportTicket_jsonld_support_ticket_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        /** @var list<SupportTicketCommentResource_jsonld_support_ticket_read>|null */
        public readonly ?array $comments = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?int $id = null,
        public readonly ?string $priority = null,
        public readonly ?string $status = null,
        public readonly ?string $subject = null,
        public readonly ?string $type = null,
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
            comments: isset($data['comments']) ? array_map(fn($x) => SupportTicketCommentResource_jsonld_support_ticket_read::fromArray($x), $data['comments']) : null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            id: $data['id'] ?? null,
            priority: $data['priority'] ?? null,
            status: $data['status'] ?? null,
            subject: $data['subject'] ?? null,
            type: $data['type'] ?? null,
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
            'comments' => $this->comments !== null ? array_map(fn($x) => $x->toArray(), $this->comments) : null,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'id' => $this->id,
            'priority' => $this->priority,
            'status' => $this->status,
            'subject' => $this->subject,
            'type' => $this->type,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            comments: array_key_exists('comments', $fields) ? $fields['comments'] : $this->comments,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            priority: array_key_exists('priority', $fields) ? $fields['priority'] : $this->priority,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
        );
    }
}
