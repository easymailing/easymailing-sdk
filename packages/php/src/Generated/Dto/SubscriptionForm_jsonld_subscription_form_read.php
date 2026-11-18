<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SubscriptionForm_jsonld_subscription_form_read
{
    public function __construct(
        public readonly ?string $audience = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $available_purposes = null,
        /** @var list<string>|null */
        public readonly ?array $channels = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SubscriptionFormConsentMode $consent_mode = null,
        public readonly ?\DateTimeImmutable $converted_at = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $crm_data_policy = null,
        public readonly ?bool $email_double_opt_in = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SubscriptionFormGeneration $generation = null,
        /** @var list<string>|null */
        public readonly ?array $groups = null,
        public readonly ?string $iri = null,
        public readonly ?string $locale = null,
        public readonly ?bool $pending_changes = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $popup_behavior = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $purposes = null,
        public readonly ?string $share_url = null,
        public readonly ?bool $sms_double_opt_in = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriptionFormStatus $status = null,
        public readonly ?int $subscriber_count = null,
        public readonly ?string $title = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriptionFormType $type = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
        public readonly ?bool $welcome_email_enabled = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'] ?? null,
            available_purposes: $data['available_purposes'] ?? null,
            channels: $data['channels'] ?? null,
            consent_mode: isset($data['consent_mode']) ? \Easymailing\Sdk\Generated\Enum\SubscriptionFormConsentMode::from($data['consent_mode']) : null,
            converted_at: isset($data['converted_at']) ? new \DateTimeImmutable($data['converted_at']) : null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            crm_data_policy: $data['crm_data_policy'] ?? null,
            email_double_opt_in: $data['email_double_opt_in'] ?? null,
            generation: isset($data['generation']) ? \Easymailing\Sdk\Generated\Enum\SubscriptionFormGeneration::from($data['generation']) : null,
            groups: $data['groups'] ?? null,
            iri: $data['iri'] ?? null,
            locale: $data['locale'] ?? null,
            pending_changes: $data['pending_changes'] ?? null,
            popup_behavior: $data['popup_behavior'] ?? null,
            purposes: $data['purposes'] ?? null,
            share_url: $data['share_url'] ?? null,
            sms_double_opt_in: $data['sms_double_opt_in'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\SuscriptionFormStatus::from($data['status']) : null,
            subscriber_count: $data['subscriber_count'] ?? null,
            title: $data['title'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\SuscriptionFormType::from($data['type']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
            welcome_email_enabled: $data['welcome_email_enabled'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'available_purposes' => $this->available_purposes,
            'channels' => $this->channels,
            'consent_mode' => $this->consent_mode?->value,
            'converted_at' => $this->converted_at?->format(\DateTimeInterface::ATOM),
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'crm_data_policy' => $this->crm_data_policy,
            'email_double_opt_in' => $this->email_double_opt_in,
            'generation' => $this->generation?->value,
            'groups' => $this->groups,
            'iri' => $this->iri,
            'locale' => $this->locale,
            'pending_changes' => $this->pending_changes,
            'popup_behavior' => $this->popup_behavior,
            'purposes' => $this->purposes,
            'share_url' => $this->share_url,
            'sms_double_opt_in' => $this->sms_double_opt_in,
            'status' => $this->status?->value,
            'subscriber_count' => $this->subscriber_count,
            'title' => $this->title,
            'type' => $this->type?->value,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'welcome_email_enabled' => $this->welcome_email_enabled,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            available_purposes: array_key_exists('available_purposes', $fields) ? $fields['available_purposes'] : $this->available_purposes,
            channels: array_key_exists('channels', $fields) ? $fields['channels'] : $this->channels,
            consent_mode: array_key_exists('consent_mode', $fields) ? $fields['consent_mode'] : $this->consent_mode,
            converted_at: array_key_exists('converted_at', $fields) ? $fields['converted_at'] : $this->converted_at,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            crm_data_policy: array_key_exists('crm_data_policy', $fields) ? $fields['crm_data_policy'] : $this->crm_data_policy,
            email_double_opt_in: array_key_exists('email_double_opt_in', $fields) ? $fields['email_double_opt_in'] : $this->email_double_opt_in,
            generation: array_key_exists('generation', $fields) ? $fields['generation'] : $this->generation,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            pending_changes: array_key_exists('pending_changes', $fields) ? $fields['pending_changes'] : $this->pending_changes,
            popup_behavior: array_key_exists('popup_behavior', $fields) ? $fields['popup_behavior'] : $this->popup_behavior,
            purposes: array_key_exists('purposes', $fields) ? $fields['purposes'] : $this->purposes,
            share_url: array_key_exists('share_url', $fields) ? $fields['share_url'] : $this->share_url,
            sms_double_opt_in: array_key_exists('sms_double_opt_in', $fields) ? $fields['sms_double_opt_in'] : $this->sms_double_opt_in,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            subscriber_count: array_key_exists('subscriber_count', $fields) ? $fields['subscriber_count'] : $this->subscriber_count,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            welcome_email_enabled: array_key_exists('welcome_email_enabled', $fields) ? $fields['welcome_email_enabled'] : $this->welcome_email_enabled,
        );
    }
}
