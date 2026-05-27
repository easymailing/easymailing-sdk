<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SuscriptionForm_PublishingInfoDto_jsonld_suscription_form_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $click_trigger_code = null,
        public readonly ?string $form_url = null,
        public readonly ?string $html_placeholder = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $instructions = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $integrations = null,
        public readonly ?bool $is_paused = null,
        public readonly ?string $message = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $requirements = null,
        public readonly ?string $script_code = null,
        public readonly ?string $status = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            click_trigger_code: $data['click_trigger_code'] ?? null,
            form_url: $data['form_url'] ?? null,
            html_placeholder: $data['html_placeholder'] ?? null,
            instructions: $data['instructions'] ?? null,
            integrations: $data['integrations'] ?? null,
            is_paused: $data['is_paused'] ?? null,
            message: $data['message'] ?? null,
            requirements: $data['requirements'] ?? null,
            script_code: $data['script_code'] ?? null,
            status: $data['status'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'click_trigger_code' => $this->click_trigger_code,
            'form_url' => $this->form_url,
            'html_placeholder' => $this->html_placeholder,
            'instructions' => $this->instructions,
            'integrations' => $this->integrations,
            'is_paused' => $this->is_paused,
            'message' => $this->message,
            'requirements' => $this->requirements,
            'script_code' => $this->script_code,
            'status' => $this->status,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            click_trigger_code: array_key_exists('click_trigger_code', $fields) ? $fields['click_trigger_code'] : $this->click_trigger_code,
            form_url: array_key_exists('form_url', $fields) ? $fields['form_url'] : $this->form_url,
            html_placeholder: array_key_exists('html_placeholder', $fields) ? $fields['html_placeholder'] : $this->html_placeholder,
            instructions: array_key_exists('instructions', $fields) ? $fields['instructions'] : $this->instructions,
            integrations: array_key_exists('integrations', $fields) ? $fields['integrations'] : $this->integrations,
            is_paused: array_key_exists('is_paused', $fields) ? $fields['is_paused'] : $this->is_paused,
            message: array_key_exists('message', $fields) ? $fields['message'] : $this->message,
            requirements: array_key_exists('requirements', $fields) ? $fields['requirements'] : $this->requirements,
            script_code: array_key_exists('script_code', $fields) ? $fields['script_code'] : $this->script_code,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
        );
    }
}
