<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SmsCampaign_CampaignSendInput_campaign_write_schedule
{
    public function __construct(
        public readonly \DateTimeImmutable $schedule_mailing_date,
        public readonly ?bool $campaign_confirmation_email = null,
        /** @var string[]|null */
        public readonly ?array $mailing_confirm_emails = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            schedule_mailing_date: new \DateTimeImmutable($data['schedule_mailing_date']),
            campaign_confirmation_email: $data['campaign_confirmation_email'] ?? null,
            mailing_confirm_emails: $data['mailing_confirm_emails'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'schedule_mailing_date' => $this->schedule_mailing_date->format(\DateTimeInterface::ATOM),
            'campaign_confirmation_email' => $this->campaign_confirmation_email,
            'mailing_confirm_emails' => $this->mailing_confirm_emails,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            schedule_mailing_date: array_key_exists('schedule_mailing_date', $fields) ? $fields['schedule_mailing_date'] : $this->schedule_mailing_date,
            campaign_confirmation_email: array_key_exists('campaign_confirmation_email', $fields) ? $fields['campaign_confirmation_email'] : $this->campaign_confirmation_email,
            mailing_confirm_emails: array_key_exists('mailing_confirm_emails', $fields) ? $fields['mailing_confirm_emails'] : $this->mailing_confirm_emails,
        );
    }
}
