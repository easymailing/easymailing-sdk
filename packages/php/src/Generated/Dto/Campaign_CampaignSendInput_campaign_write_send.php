<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Campaign_CampaignSendInput_campaign_write_send
{
    public function __construct(
        public readonly ?bool $campaign_confirmation_email = null,
        /** @var list<string>|null */
        public readonly ?array $mailing_confirm_emails = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            campaign_confirmation_email: $data['campaign_confirmation_email'] ?? null,
            mailing_confirm_emails: $data['mailing_confirm_emails'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'campaign_confirmation_email' => $this->campaign_confirmation_email,
            'mailing_confirm_emails' => $this->mailing_confirm_emails,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            campaign_confirmation_email: array_key_exists('campaign_confirmation_email', $fields) ? $fields['campaign_confirmation_email'] : $this->campaign_confirmation_email,
            mailing_confirm_emails: array_key_exists('mailing_confirm_emails', $fields) ? $fields['mailing_confirm_emails'] : $this->mailing_confirm_emails,
        );
    }
}
