<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Survey_UpdateSurveyInput_survey_write
{
    public function __construct(
        public readonly ?string $name = null,
        /** @var list<mixed>|null */
        public readonly ?array $questions = null,
        public readonly ?string $redirect_url = null,
        public readonly ?bool $show_results = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            questions: $data['questions'] ?? null,
            redirect_url: $data['redirect_url'] ?? null,
            show_results: $data['show_results'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'questions' => $this->questions,
            'redirect_url' => $this->redirect_url,
            'show_results' => $this->show_results,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            questions: array_key_exists('questions', $fields) ? $fields['questions'] : $this->questions,
            redirect_url: array_key_exists('redirect_url', $fields) ? $fields['redirect_url'] : $this->redirect_url,
            show_results: array_key_exists('show_results', $fields) ? $fields['show_results'] : $this->show_results,
        );
    }
}
