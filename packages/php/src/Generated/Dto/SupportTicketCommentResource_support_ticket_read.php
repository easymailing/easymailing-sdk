<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SupportTicketCommentResource_support_ticket_read
{
    public function __construct(
        public readonly ?int $author_id = null,
        public readonly ?string $body = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?int $id = null,
        public readonly ?bool $public = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            author_id: $data['author_id'] ?? null,
            body: $data['body'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            id: $data['id'] ?? null,
            public: $data['public'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'author_id' => $this->author_id,
            'body' => $this->body,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'id' => $this->id,
            'public' => $this->public,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            author_id: array_key_exists('author_id', $fields) ? $fields['author_id'] : $this->author_id,
            body: array_key_exists('body', $fields) ? $fields['body'] : $this->body,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            public: array_key_exists('public', $fields) ? $fields['public'] : $this->public,
        );
    }
}
