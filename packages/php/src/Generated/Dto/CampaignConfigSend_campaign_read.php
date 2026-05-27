<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class CampaignConfigSend_campaign_read
{
    public function __construct(
        public readonly ?string $iri = null,
        /** @var list<string>|null */
        public readonly ?array $mailing_confirm_emails = null,
        public readonly ?bool $schedule_mailing = null,
        public readonly ?\DateTimeImmutable $schedule_mailing_date = null,
        public readonly ?bool $send_confirmation_email = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            mailing_confirm_emails: $data['mailing_confirm_emails'] ?? null,
            schedule_mailing: $data['schedule_mailing'] ?? null,
            schedule_mailing_date: isset($data['schedule_mailing_date']) ? new \DateTimeImmutable($data['schedule_mailing_date']) : null,
            send_confirmation_email: $data['send_confirmation_email'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'mailing_confirm_emails' => $this->mailing_confirm_emails,
            'schedule_mailing' => $this->schedule_mailing,
            'schedule_mailing_date' => $this->schedule_mailing_date?->format(\DateTimeInterface::ATOM),
            'send_confirmation_email' => $this->send_confirmation_email,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            mailing_confirm_emails: array_key_exists('mailing_confirm_emails', $fields) ? $fields['mailing_confirm_emails'] : $this->mailing_confirm_emails,
            schedule_mailing: array_key_exists('schedule_mailing', $fields) ? $fields['schedule_mailing'] : $this->schedule_mailing,
            schedule_mailing_date: array_key_exists('schedule_mailing_date', $fields) ? $fields['schedule_mailing_date'] : $this->schedule_mailing_date,
            send_confirmation_email: array_key_exists('send_confirmation_email', $fields) ? $fields['send_confirmation_email'] : $this->send_confirmation_email,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
