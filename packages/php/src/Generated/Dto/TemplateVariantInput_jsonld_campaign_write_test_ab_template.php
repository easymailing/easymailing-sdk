<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TemplateVariantInput_jsonld_campaign_write_test_ab_template
{
    public function __construct(
        public readonly ?string $template = null,
        public readonly ?string $template_html = null,
        public readonly ?array $template_simple_json_code = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            template: $data['template'] ?? null,
            template_html: $data['template_html'] ?? null,
            template_simple_json_code: $data['template_simple_json_code'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'template' => $this->template,
            'template_html' => $this->template_html,
            'template_simple_json_code' => $this->template_simple_json_code,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            template: array_key_exists('template', $fields) ? $fields['template'] : $this->template,
            template_html: array_key_exists('template_html', $fields) ? $fields['template_html'] : $this->template_html,
            template_simple_json_code: array_key_exists('template_simple_json_code', $fields) ? $fields['template_simple_json_code'] : $this->template_simple_json_code,
        );
    }
}
