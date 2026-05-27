<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SuscriptionForm_UpdatePopupFormDto_suscription_form_write
{
    public function __construct(
        public readonly ?string $locale,
        public readonly ?string $title,
        public readonly ?PopupBehaviorDto_suscription_form_write $behavior = null,
        /** @var string[]|null */
        public readonly ?array $channels = null,
        public readonly ?bool $double_opt_in = null,
        public readonly ?bool $enable_welcome_email = null,
        /** @var Group_suscription_form_write[]|null */
        public readonly ?array $groups = null,
        public readonly ?bool $sms_double_opt_in = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            locale: $data['locale'],
            title: $data['title'],
            behavior: isset($data['behavior']) ? PopupBehaviorDto_suscription_form_write::fromArray($data['behavior']) : null,
            channels: $data['channels'] ?? null,
            double_opt_in: $data['double_opt_in'] ?? null,
            enable_welcome_email: $data['enable_welcome_email'] ?? null,
            groups: isset($data['groups']) ? array_map(fn($x) => Group_suscription_form_write::fromArray($x), $data['groups']) : null,
            sms_double_opt_in: $data['sms_double_opt_in'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'locale' => $this->locale,
            'title' => $this->title,
            'behavior' => $this->behavior?->toArray(),
            'channels' => $this->channels,
            'double_opt_in' => $this->double_opt_in,
            'enable_welcome_email' => $this->enable_welcome_email,
            'groups' => $this->groups !== null ? array_map(fn($x) => $x->toArray(), $this->groups) : null,
            'sms_double_opt_in' => $this->sms_double_opt_in,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            behavior: array_key_exists('behavior', $fields) ? $fields['behavior'] : $this->behavior,
            channels: array_key_exists('channels', $fields) ? $fields['channels'] : $this->channels,
            double_opt_in: array_key_exists('double_opt_in', $fields) ? $fields['double_opt_in'] : $this->double_opt_in,
            enable_welcome_email: array_key_exists('enable_welcome_email', $fields) ? $fields['enable_welcome_email'] : $this->enable_welcome_email,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            sms_double_opt_in: array_key_exists('sms_double_opt_in', $fields) ? $fields['sms_double_opt_in'] : $this->sms_double_opt_in,
        );
    }
}
