<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SurveyQuestionInput_survey_write
{
    public function __construct(
        public readonly string $text,
        public readonly string $type,
        public readonly ?string $display = null,
        /** @var list<SurveyOptionInput_survey_write>|null */
        public readonly ?array $options = null,
        public readonly ?bool $required = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            text: $data['text'],
            type: $data['type'],
            display: $data['display'] ?? null,
            options: isset($data['options']) ? array_map(fn($x) => SurveyOptionInput_survey_write::fromArray($x), $data['options']) : null,
            required: $data['required'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'text' => $this->text,
            'type' => $this->type,
            'display' => $this->display,
            'options' => $this->options !== null ? array_map(fn($x) => $x->toArray(), $this->options) : null,
            'required' => $this->required,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            text: array_key_exists('text', $fields) ? $fields['text'] : $this->text,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            display: array_key_exists('display', $fields) ? $fields['display'] : $this->display,
            options: array_key_exists('options', $fields) ? $fields['options'] : $this->options,
            required: array_key_exists('required', $fields) ? $fields['required'] : $this->required,
        );
    }
}
