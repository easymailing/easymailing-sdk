<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Member_automation_queue_read
{
    public function __construct(
        public readonly ?string $audience = null,
        public readonly ?string $client_ip = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var list<CustomField_automation_queue_read>|null */
        public readonly ?array $custom_fields = null,
        public readonly ?string $email = null,
        public readonly ?\DateTimeImmutable $email_opt_in_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberSource $email_opt_in_source = null,
        public readonly ?\DateTimeImmutable $email_opt_out_at = null,
        /** @var list<Group_automation_queue_read>|null */
        public readonly ?array $groups = null,
        public readonly ?string $iri = null,
        public readonly ?string $locale = null,
        public readonly ?Location_automation_queue_read $location = null,
        public readonly ?MemberConsent_automation_queue_read $member_consent = null,
        public readonly ?float $rating = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberSource $source = null,
        public readonly ?MemberStatsResource_automation_queue_read $stats = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberStatus $status = null,
        public readonly ?string $suscription_form = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'] ?? null,
            client_ip: $data['client_ip'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            custom_fields: isset($data['custom_fields']) ? array_map(fn($x) => CustomField_automation_queue_read::fromArray($x), $data['custom_fields']) : null,
            email: $data['email'] ?? null,
            email_opt_in_at: isset($data['email_opt_in_at']) ? new \DateTimeImmutable($data['email_opt_in_at']) : null,
            email_opt_in_source: isset($data['email_opt_in_source']) ? \Easymailing\Sdk\Generated\Enum\SuscriberSource::from($data['email_opt_in_source']) : null,
            email_opt_out_at: isset($data['email_opt_out_at']) ? new \DateTimeImmutable($data['email_opt_out_at']) : null,
            groups: isset($data['groups']) ? array_map(fn($x) => Group_automation_queue_read::fromArray($x), $data['groups']) : null,
            iri: $data['iri'] ?? null,
            locale: $data['locale'] ?? null,
            location: isset($data['location']) ? Location_automation_queue_read::fromArray($data['location']) : null,
            member_consent: isset($data['member_consent']) ? MemberConsent_automation_queue_read::fromArray($data['member_consent']) : null,
            rating: $data['rating'] ?? null,
            source: isset($data['source']) ? \Easymailing\Sdk\Generated\Enum\SuscriberSource::from($data['source']) : null,
            stats: isset($data['stats']) ? MemberStatsResource_automation_queue_read::fromArray($data['stats']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\SuscriberStatus::from($data['status']) : null,
            suscription_form: $data['suscription_form'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'client_ip' => $this->client_ip,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'custom_fields' => $this->custom_fields !== null ? array_map(fn($x) => $x->toArray(), $this->custom_fields) : null,
            'email' => $this->email,
            'email_opt_in_at' => $this->email_opt_in_at?->format(\DateTimeInterface::ATOM),
            'email_opt_in_source' => $this->email_opt_in_source?->value,
            'email_opt_out_at' => $this->email_opt_out_at?->format(\DateTimeInterface::ATOM),
            'groups' => $this->groups !== null ? array_map(fn($x) => $x->toArray(), $this->groups) : null,
            'iri' => $this->iri,
            'locale' => $this->locale,
            'location' => $this->location?->toArray(),
            'member_consent' => $this->member_consent?->toArray(),
            'rating' => $this->rating,
            'source' => $this->source?->value,
            'stats' => $this->stats?->toArray(),
            'status' => $this->status?->value,
            'suscription_form' => $this->suscription_form,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            client_ip: array_key_exists('client_ip', $fields) ? $fields['client_ip'] : $this->client_ip,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            custom_fields: array_key_exists('custom_fields', $fields) ? $fields['custom_fields'] : $this->custom_fields,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            email_opt_in_at: array_key_exists('email_opt_in_at', $fields) ? $fields['email_opt_in_at'] : $this->email_opt_in_at,
            email_opt_in_source: array_key_exists('email_opt_in_source', $fields) ? $fields['email_opt_in_source'] : $this->email_opt_in_source,
            email_opt_out_at: array_key_exists('email_opt_out_at', $fields) ? $fields['email_opt_out_at'] : $this->email_opt_out_at,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            location: array_key_exists('location', $fields) ? $fields['location'] : $this->location,
            member_consent: array_key_exists('member_consent', $fields) ? $fields['member_consent'] : $this->member_consent,
            rating: array_key_exists('rating', $fields) ? $fields['rating'] : $this->rating,
            source: array_key_exists('source', $fields) ? $fields['source'] : $this->source,
            stats: array_key_exists('stats', $fields) ? $fields['stats'] : $this->stats,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            suscription_form: array_key_exists('suscription_form', $fields) ? $fields['suscription_form'] : $this->suscription_form,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
