<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MySuscription_my_suscription_read
{
    public function __construct(
        public readonly ?int $ai_cost_limit_cents = null,
        public readonly ?int $ai_cost_used_cents = null,
        public readonly ?int $ai_overage_limit_cents = null,
        public readonly ?bool $allow_ai_overage = null,
        public readonly ?int $audiences = null,
        public readonly ?int $automation_triggers = null,
        public readonly ?int $automations = null,
        public readonly ?bool $can_have_ai_overage = null,
        public readonly ?int $credits = null,
        public readonly ?int $credits_used = null,
        public readonly ?string $domain = null,
        public readonly ?\DateTimeImmutable $expiration_date = null,
        public readonly ?string $locale = null,
        public readonly ?int $max_subscribers = null,
        public readonly ?bool $sms_campaigns_enabled = null,
        public readonly ?int $sms_credits = null,
        public readonly ?int $sms_credits_remaining = null,
        public readonly ?int $sms_credits_used = null,
        public readonly ?int $subscribers_used = null,
        public readonly ?string $tier = null,
        public readonly ?AuthenticatedUser_my_suscription_read $user = null,
        public readonly ?int $websites = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            ai_cost_limit_cents: $data['ai_cost_limit_cents'] ?? null,
            ai_cost_used_cents: $data['ai_cost_used_cents'] ?? null,
            ai_overage_limit_cents: $data['ai_overage_limit_cents'] ?? null,
            allow_ai_overage: $data['allow_ai_overage'] ?? null,
            audiences: $data['audiences'] ?? null,
            automation_triggers: $data['automation_triggers'] ?? null,
            automations: $data['automations'] ?? null,
            can_have_ai_overage: $data['can_have_ai_overage'] ?? null,
            credits: $data['credits'] ?? null,
            credits_used: $data['credits_used'] ?? null,
            domain: $data['domain'] ?? null,
            expiration_date: isset($data['expiration_date']) ? new \DateTimeImmutable($data['expiration_date']) : null,
            locale: $data['locale'] ?? null,
            max_subscribers: $data['max_subscribers'] ?? null,
            sms_campaigns_enabled: $data['sms_campaigns_enabled'] ?? null,
            sms_credits: $data['sms_credits'] ?? null,
            sms_credits_remaining: $data['sms_credits_remaining'] ?? null,
            sms_credits_used: $data['sms_credits_used'] ?? null,
            subscribers_used: $data['subscribers_used'] ?? null,
            tier: $data['tier'] ?? null,
            user: isset($data['user']) ? AuthenticatedUser_my_suscription_read::fromArray($data['user']) : null,
            websites: $data['websites'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'ai_cost_limit_cents' => $this->ai_cost_limit_cents,
            'ai_cost_used_cents' => $this->ai_cost_used_cents,
            'ai_overage_limit_cents' => $this->ai_overage_limit_cents,
            'allow_ai_overage' => $this->allow_ai_overage,
            'audiences' => $this->audiences,
            'automation_triggers' => $this->automation_triggers,
            'automations' => $this->automations,
            'can_have_ai_overage' => $this->can_have_ai_overage,
            'credits' => $this->credits,
            'credits_used' => $this->credits_used,
            'domain' => $this->domain,
            'expiration_date' => $this->expiration_date?->format(\DateTimeInterface::ATOM),
            'locale' => $this->locale,
            'max_subscribers' => $this->max_subscribers,
            'sms_campaigns_enabled' => $this->sms_campaigns_enabled,
            'sms_credits' => $this->sms_credits,
            'sms_credits_remaining' => $this->sms_credits_remaining,
            'sms_credits_used' => $this->sms_credits_used,
            'subscribers_used' => $this->subscribers_used,
            'tier' => $this->tier,
            'user' => $this->user?->toArray(),
            'websites' => $this->websites,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            ai_cost_limit_cents: array_key_exists('ai_cost_limit_cents', $fields) ? $fields['ai_cost_limit_cents'] : $this->ai_cost_limit_cents,
            ai_cost_used_cents: array_key_exists('ai_cost_used_cents', $fields) ? $fields['ai_cost_used_cents'] : $this->ai_cost_used_cents,
            ai_overage_limit_cents: array_key_exists('ai_overage_limit_cents', $fields) ? $fields['ai_overage_limit_cents'] : $this->ai_overage_limit_cents,
            allow_ai_overage: array_key_exists('allow_ai_overage', $fields) ? $fields['allow_ai_overage'] : $this->allow_ai_overage,
            audiences: array_key_exists('audiences', $fields) ? $fields['audiences'] : $this->audiences,
            automation_triggers: array_key_exists('automation_triggers', $fields) ? $fields['automation_triggers'] : $this->automation_triggers,
            automations: array_key_exists('automations', $fields) ? $fields['automations'] : $this->automations,
            can_have_ai_overage: array_key_exists('can_have_ai_overage', $fields) ? $fields['can_have_ai_overage'] : $this->can_have_ai_overage,
            credits: array_key_exists('credits', $fields) ? $fields['credits'] : $this->credits,
            credits_used: array_key_exists('credits_used', $fields) ? $fields['credits_used'] : $this->credits_used,
            domain: array_key_exists('domain', $fields) ? $fields['domain'] : $this->domain,
            expiration_date: array_key_exists('expiration_date', $fields) ? $fields['expiration_date'] : $this->expiration_date,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            max_subscribers: array_key_exists('max_subscribers', $fields) ? $fields['max_subscribers'] : $this->max_subscribers,
            sms_campaigns_enabled: array_key_exists('sms_campaigns_enabled', $fields) ? $fields['sms_campaigns_enabled'] : $this->sms_campaigns_enabled,
            sms_credits: array_key_exists('sms_credits', $fields) ? $fields['sms_credits'] : $this->sms_credits,
            sms_credits_remaining: array_key_exists('sms_credits_remaining', $fields) ? $fields['sms_credits_remaining'] : $this->sms_credits_remaining,
            sms_credits_used: array_key_exists('sms_credits_used', $fields) ? $fields['sms_credits_used'] : $this->sms_credits_used,
            subscribers_used: array_key_exists('subscribers_used', $fields) ? $fields['subscribers_used'] : $this->subscribers_used,
            tier: array_key_exists('tier', $fields) ? $fields['tier'] : $this->tier,
            user: array_key_exists('user', $fields) ? $fields['user'] : $this->user,
            websites: array_key_exists('websites', $fields) ? $fields['websites'] : $this->websites,
        );
    }
}
