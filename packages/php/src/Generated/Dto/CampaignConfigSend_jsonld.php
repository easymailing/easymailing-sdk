<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class CampaignConfigSend_jsonld
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        /** @var string[]|null */
        public readonly ?array $mailing_confirm_emails = null,
        public readonly ?bool $schedule_mailing = null,
        public readonly ?\DateTimeImmutable $schedule_mailing_date = null,
        public readonly ?bool $send_confirmation_email = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            mailing_confirm_emails: $data['mailing_confirm_emails'] ?? null,
            schedule_mailing: $data['schedule_mailing'] ?? null,
            schedule_mailing_date: isset($data['schedule_mailing_date']) ? new \DateTimeImmutable($data['schedule_mailing_date']) : null,
            send_confirmation_email: $data['send_confirmation_email'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'mailing_confirm_emails' => $this->mailing_confirm_emails,
            'schedule_mailing' => $this->schedule_mailing,
            'schedule_mailing_date' => $this->schedule_mailing_date?->format(\DateTimeInterface::ATOM),
            'send_confirmation_email' => $this->send_confirmation_email,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            mailing_confirm_emails: array_key_exists('mailing_confirm_emails', $fields) ? $fields['mailing_confirm_emails'] : $this->mailing_confirm_emails,
            schedule_mailing: array_key_exists('schedule_mailing', $fields) ? $fields['schedule_mailing'] : $this->schedule_mailing,
            schedule_mailing_date: array_key_exists('schedule_mailing_date', $fields) ? $fields['schedule_mailing_date'] : $this->schedule_mailing_date,
            send_confirmation_email: array_key_exists('send_confirmation_email', $fields) ? $fields['send_confirmation_email'] : $this->send_confirmation_email,
        );
    }
}
