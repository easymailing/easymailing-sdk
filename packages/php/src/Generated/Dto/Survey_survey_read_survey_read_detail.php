<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Survey_survey_read_survey_read_detail
{
    public function __construct(
        public readonly ?string $audience = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $iri = null,
        public readonly ?string $locale = null,
        public readonly ?string $name = null,
        public readonly ?string $public_url = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $questions = null,
        public readonly ?string $redirect_url = null,
        public readonly ?bool $show_results = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            iri: $data['iri'] ?? null,
            locale: $data['locale'] ?? null,
            name: $data['name'] ?? null,
            public_url: $data['public_url'] ?? null,
            questions: $data['questions'] ?? null,
            redirect_url: $data['redirect_url'] ?? null,
            show_results: $data['show_results'] ?? null,
            status: $data['status'] ?? null,
            type: $data['type'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'iri' => $this->iri,
            'locale' => $this->locale,
            'name' => $this->name,
            'public_url' => $this->public_url,
            'questions' => $this->questions,
            'redirect_url' => $this->redirect_url,
            'show_results' => $this->show_results,
            'status' => $this->status,
            'type' => $this->type,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            public_url: array_key_exists('public_url', $fields) ? $fields['public_url'] : $this->public_url,
            questions: array_key_exists('questions', $fields) ? $fields['questions'] : $this->questions,
            redirect_url: array_key_exists('redirect_url', $fields) ? $fields['redirect_url'] : $this->redirect_url,
            show_results: array_key_exists('show_results', $fields) ? $fields['show_results'] : $this->show_results,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
