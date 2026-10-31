<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactAudienceMembership_jsonld_contact_audience_membership_read
{
    public function __construct(
        public readonly ?string $audience = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $consent = null,
        public readonly ?\DateTimeImmutable $email_opt_in_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberSource $email_opt_in_source = null,
        /** @var list<string>|null */
        public readonly ?array $groups = null,
        public readonly ?string $iri = null,
        public readonly ?\DateTimeImmutable $joined_at = null,
        public readonly ?string $member = null,
        public readonly ?\DateTimeImmutable $sms_opt_in_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SmsOptInSource $sms_opt_in_source = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberStatus $sms_status = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberStatus $status = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'] ?? null,
            consent: $data['consent'] ?? null,
            email_opt_in_at: isset($data['email_opt_in_at']) ? new \DateTimeImmutable($data['email_opt_in_at']) : null,
            email_opt_in_source: isset($data['email_opt_in_source']) ? \Easymailing\Sdk\Generated\Enum\SuscriberSource::from($data['email_opt_in_source']) : null,
            groups: $data['groups'] ?? null,
            iri: $data['iri'] ?? null,
            joined_at: isset($data['joined_at']) ? new \DateTimeImmutable($data['joined_at']) : null,
            member: $data['member'] ?? null,
            sms_opt_in_at: isset($data['sms_opt_in_at']) ? new \DateTimeImmutable($data['sms_opt_in_at']) : null,
            sms_opt_in_source: isset($data['sms_opt_in_source']) ? \Easymailing\Sdk\Generated\Enum\SmsOptInSource::from($data['sms_opt_in_source']) : null,
            sms_status: isset($data['sms_status']) ? \Easymailing\Sdk\Generated\Enum\SuscriberStatus::from($data['sms_status']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\SuscriberStatus::from($data['status']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'consent' => $this->consent,
            'email_opt_in_at' => $this->email_opt_in_at?->format(\DateTimeInterface::ATOM),
            'email_opt_in_source' => $this->email_opt_in_source?->value,
            'groups' => $this->groups,
            'iri' => $this->iri,
            'joined_at' => $this->joined_at?->format(\DateTimeInterface::ATOM),
            'member' => $this->member,
            'sms_opt_in_at' => $this->sms_opt_in_at?->format(\DateTimeInterface::ATOM),
            'sms_opt_in_source' => $this->sms_opt_in_source?->value,
            'sms_status' => $this->sms_status?->value,
            'status' => $this->status?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            consent: array_key_exists('consent', $fields) ? $fields['consent'] : $this->consent,
            email_opt_in_at: array_key_exists('email_opt_in_at', $fields) ? $fields['email_opt_in_at'] : $this->email_opt_in_at,
            email_opt_in_source: array_key_exists('email_opt_in_source', $fields) ? $fields['email_opt_in_source'] : $this->email_opt_in_source,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            joined_at: array_key_exists('joined_at', $fields) ? $fields['joined_at'] : $this->joined_at,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            sms_opt_in_at: array_key_exists('sms_opt_in_at', $fields) ? $fields['sms_opt_in_at'] : $this->sms_opt_in_at,
            sms_opt_in_source: array_key_exists('sms_opt_in_source', $fields) ? $fields['sms_opt_in_source'] : $this->sms_opt_in_source,
            sms_status: array_key_exists('sms_status', $fields) ? $fields['sms_status'] : $this->sms_status,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
