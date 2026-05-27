<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Audience
{
    public function __construct(
        public readonly string $name,
        /** @var list<string> */
        public readonly array $tags,
        /** @var list<Member> */
        public readonly array $members,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            tags: $data['tags'],
            members: array_map(fn($x) => Member::fromArray($x), $data['members']),
        );
    }

    /** @return array<string, mixed> */
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
