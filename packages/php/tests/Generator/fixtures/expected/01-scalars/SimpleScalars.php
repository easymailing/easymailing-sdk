<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SimpleScalars
{
    public function __construct(
        public readonly string $name,
        public readonly int $age,
        public readonly float $score,
        public readonly bool $active,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            age: $data['age'],
            score: $data['score'],
            active: $data['active'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'age' => $this->age,
            'score' => $this->score,
            'active' => $this->active,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            age: array_key_exists('age', $fields) ? $fields['age'] : $this->age,
            score: array_key_exists('score', $fields) ? $fields['score'] : $this->score,
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
        );
    }
}
