<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SuscriptionForm_suscription_form_read
{
    public function __construct(
        public readonly ?bool $active = null,
        public readonly ?string $audience = null,
        public readonly ?PopupBehaviorDto_suscription_form_read $behavior = null,
        /** @var list<string>|null */
        public readonly ?array $channels = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $domain = null,
        public readonly ?bool $double_opt_in = null,
        public readonly ?bool $enable_welcome_email = null,
        /** @var list<string>|null */
        public readonly ?array $groups = null,
        public readonly ?string $hash = null,
        public readonly ?int $id = null,
        public readonly ?bool $paused = null,
        public readonly ?bool $sms_double_opt_in = null,
        public readonly ?SuscriptionFormStatsDto_suscription_form_read $stats = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriptionFormStatus $status = null,
        public readonly ?string $title = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriptionFormType $type = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $url = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            active: $data['active'] ?? null,
            audience: $data['audience'] ?? null,
            behavior: isset($data['behavior']) ? PopupBehaviorDto_suscription_form_read::fromArray($data['behavior']) : null,
            channels: $data['channels'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            domain: $data['domain'] ?? null,
            double_opt_in: $data['double_opt_in'] ?? null,
            enable_welcome_email: $data['enable_welcome_email'] ?? null,
            groups: $data['groups'] ?? null,
            hash: $data['hash'] ?? null,
            id: $data['id'] ?? null,
            paused: $data['paused'] ?? null,
            sms_double_opt_in: $data['sms_double_opt_in'] ?? null,
            stats: isset($data['stats']) ? SuscriptionFormStatsDto_suscription_form_read::fromArray($data['stats']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\SuscriptionFormStatus::from($data['status']) : null,
            title: $data['title'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\SuscriptionFormType::from($data['type']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            url: $data['url'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'active' => $this->active,
            'audience' => $this->audience,
            'behavior' => $this->behavior?->toArray(),
            'channels' => $this->channels,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'domain' => $this->domain,
            'double_opt_in' => $this->double_opt_in,
            'enable_welcome_email' => $this->enable_welcome_email,
            'groups' => $this->groups,
            'hash' => $this->hash,
            'id' => $this->id,
            'paused' => $this->paused,
            'sms_double_opt_in' => $this->sms_double_opt_in,
            'stats' => $this->stats?->toArray(),
            'status' => $this->status?->value,
            'title' => $this->title,
            'type' => $this->type?->value,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'url' => $this->url,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            behavior: array_key_exists('behavior', $fields) ? $fields['behavior'] : $this->behavior,
            channels: array_key_exists('channels', $fields) ? $fields['channels'] : $this->channels,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            domain: array_key_exists('domain', $fields) ? $fields['domain'] : $this->domain,
            double_opt_in: array_key_exists('double_opt_in', $fields) ? $fields['double_opt_in'] : $this->double_opt_in,
            enable_welcome_email: array_key_exists('enable_welcome_email', $fields) ? $fields['enable_welcome_email'] : $this->enable_welcome_email,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            hash: array_key_exists('hash', $fields) ? $fields['hash'] : $this->hash,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            paused: array_key_exists('paused', $fields) ? $fields['paused'] : $this->paused,
            sms_double_opt_in: array_key_exists('sms_double_opt_in', $fields) ? $fields['sms_double_opt_in'] : $this->sms_double_opt_in,
            stats: array_key_exists('stats', $fields) ? $fields['stats'] : $this->stats,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
