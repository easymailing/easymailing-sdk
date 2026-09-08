<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Survey_CreateSurveyInput_jsonld_survey_write
{
    public function __construct(
        public readonly string $name,
        public readonly string $type,
        public readonly ?string $locale = null,
        /** @var list<SurveyQuestionInput_jsonld_survey_write>|null */
        public readonly ?array $questions = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            type: $data['type'],
            locale: $data['locale'] ?? null,
            questions: isset($data['questions']) ? array_map(fn($x) => SurveyQuestionInput_jsonld_survey_write::fromArray($x), $data['questions']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'locale' => $this->locale,
            'questions' => $this->questions !== null ? array_map(fn($x) => $x->toArray(), $this->questions) : null,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            questions: array_key_exists('questions', $fields) ? $fields['questions'] : $this->questions,
        );
    }
}
