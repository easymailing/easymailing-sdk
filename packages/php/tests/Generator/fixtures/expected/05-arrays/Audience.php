<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Audience
{
    public function __construct(
        public readonly string $name,
        /** @var string[] */
        public readonly array $tags,
        /** @var Member[] */
        public readonly array $members,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            tags: $data['tags'],
            members: array_map(fn($x) => Member::fromArray($x), $data['members']),
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'tags' => $this->tags,
            'members' => array_map(fn($x) => $x->toArray(), $this->members),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            tags: array_key_exists('tags', $fields) ? $fields['tags'] : $this->tags,
            members: array_key_exists('members', $fields) ? $fields['members'] : $this->members,
        );
    }
}
