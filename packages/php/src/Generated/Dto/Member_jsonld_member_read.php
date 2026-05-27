<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Member_jsonld_member_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $audience = null,
        public readonly ?string $client_ip = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var CustomField_jsonld_member_read[]|null */
        public readonly ?array $custom_fields = null,
        public readonly ?string $email = null,
        public readonly ?\DateTimeImmutable $email_opt_in_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberSource $email_opt_in_source = null,
        public readonly ?\DateTimeImmutable $email_opt_out_at = null,
        public readonly ?string $first_name = null,
        /** @var Group_jsonld_member_read[]|null */
        public readonly ?array $groups = null,
        public readonly ?int $id = null,
        public readonly ?string $last_name = null,
        public readonly ?string $locale = null,
        public readonly ?Location_jsonld_member_read $location = null,
        public readonly ?MemberConsent_jsonld_member_read $member_consent = null,
        public readonly ?string $phone = null,
        public readonly ?float $rating = null,
        public readonly ?\DateTimeImmutable $sms_opt_in_at = null,
        public readonly ?string $sms_opt_in_source = null,
        public readonly ?\DateTimeImmutable $sms_opt_out_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberStatus $sms_status = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberSource $source = null,
        public readonly ?MemberStatsResource_jsonld_member_read $stats = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberStatus $status = null,
        public readonly ?SuscriptionForm_jsonld_member_read $suscription_form = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            audience: $data['audience'] ?? null,
            client_ip: $data['client_ip'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            custom_fields: isset($data['custom_fields']) ? array_map(fn($x) => CustomField_jsonld_member_read::fromArray($x), $data['custom_fields']) : null,
            email: $data['email'] ?? null,
            email_opt_in_at: isset($data['email_opt_in_at']) ? new \DateTimeImmutable($data['email_opt_in_at']) : null,
            email_opt_in_source: isset($data['email_opt_in_source']) ? \Easymailing\Sdk\Generated\Enum\SuscriberSource::from($data['email_opt_in_source']) : null,
            email_opt_out_at: isset($data['email_opt_out_at']) ? new \DateTimeImmutable($data['email_opt_out_at']) : null,
            first_name: $data['first_name'] ?? null,
            groups: isset($data['groups']) ? array_map(fn($x) => Group_jsonld_member_read::fromArray($x), $data['groups']) : null,
            id: $data['id'] ?? null,
            last_name: $data['last_name'] ?? null,
            locale: $data['locale'] ?? null,
            location: isset($data['location']) ? Location_jsonld_member_read::fromArray($data['location']) : null,
            member_consent: isset($data['member_consent']) ? MemberConsent_jsonld_member_read::fromArray($data['member_consent']) : null,
            phone: $data['phone'] ?? null,
            rating: $data['rating'] ?? null,
            sms_opt_in_at: isset($data['sms_opt_in_at']) ? new \DateTimeImmutable($data['sms_opt_in_at']) : null,
            sms_opt_in_source: $data['sms_opt_in_source'] ?? null,
            sms_opt_out_at: isset($data['sms_opt_out_at']) ? new \DateTimeImmutable($data['sms_opt_out_at']) : null,
            sms_status: isset($data['sms_status']) ? \Easymailing\Sdk\Generated\Enum\SuscriberStatus::from($data['sms_status']) : null,
            source: isset($data['source']) ? \Easymailing\Sdk\Generated\Enum\SuscriberSource::from($data['source']) : null,
            stats: isset($data['stats']) ? MemberStatsResource_jsonld_member_read::fromArray($data['stats']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\SuscriberStatus::from($data['status']) : null,
            suscription_form: isset($data['suscription_form']) ? SuscriptionForm_jsonld_member_read::fromArray($data['suscription_form']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'audience' => $this->audience,
            'client_ip' => $this->client_ip,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'custom_fields' => $this->custom_fields !== null ? array_map(fn($x) => $x->toArray(), $this->custom_fields) : null,
            'email' => $this->email,
            'email_opt_in_at' => $this->email_opt_in_at?->format(\DateTimeInterface::ATOM),
            'email_opt_in_source' => $this->email_opt_in_source?->value,
            'email_opt_out_at' => $this->email_opt_out_at?->format(\DateTimeInterface::ATOM),
            'first_name' => $this->first_name,
            'groups' => $this->groups !== null ? array_map(fn($x) => $x->toArray(), $this->groups) : null,
            'id' => $this->id,
            'last_name' => $this->last_name,
            'locale' => $this->locale,
            'location' => $this->location?->toArray(),
            'member_consent' => $this->member_consent?->toArray(),
            'phone' => $this->phone,
            'rating' => $this->rating,
            'sms_opt_in_at' => $this->sms_opt_in_at?->format(\DateTimeInterface::ATOM),
            'sms_opt_in_source' => $this->sms_opt_in_source,
            'sms_opt_out_at' => $this->sms_opt_out_at?->format(\DateTimeInterface::ATOM),
            'sms_status' => $this->sms_status?->value,
            'source' => $this->source?->value,
            'stats' => $this->stats?->toArray(),
            'status' => $this->status?->value,
            'suscription_form' => $this->suscription_form?->toArray(),
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            client_ip: array_key_exists('client_ip', $fields) ? $fields['client_ip'] : $this->client_ip,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            custom_fields: array_key_exists('custom_fields', $fields) ? $fields['custom_fields'] : $this->custom_fields,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            email_opt_in_at: array_key_exists('email_opt_in_at', $fields) ? $fields['email_opt_in_at'] : $this->email_opt_in_at,
            email_opt_in_source: array_key_exists('email_opt_in_source', $fields) ? $fields['email_opt_in_source'] : $this->email_opt_in_source,
            email_opt_out_at: array_key_exists('email_opt_out_at', $fields) ? $fields['email_opt_out_at'] : $this->email_opt_out_at,
            first_name: array_key_exists('first_name', $fields) ? $fields['first_name'] : $this->first_name,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            last_name: array_key_exists('last_name', $fields) ? $fields['last_name'] : $this->last_name,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            location: array_key_exists('location', $fields) ? $fields['location'] : $this->location,
            member_consent: array_key_exists('member_consent', $fields) ? $fields['member_consent'] : $this->member_consent,
            phone: array_key_exists('phone', $fields) ? $fields['phone'] : $this->phone,
            rating: array_key_exists('rating', $fields) ? $fields['rating'] : $this->rating,
            sms_opt_in_at: array_key_exists('sms_opt_in_at', $fields) ? $fields['sms_opt_in_at'] : $this->sms_opt_in_at,
            sms_opt_in_source: array_key_exists('sms_opt_in_source', $fields) ? $fields['sms_opt_in_source'] : $this->sms_opt_in_source,
            sms_opt_out_at: array_key_exists('sms_opt_out_at', $fields) ? $fields['sms_opt_out_at'] : $this->sms_opt_out_at,
            sms_status: array_key_exists('sms_status', $fields) ? $fields['sms_status'] : $this->sms_status,
            source: array_key_exists('source', $fields) ? $fields['source'] : $this->source,
            stats: array_key_exists('stats', $fields) ? $fields['stats'] : $this->stats,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            suscription_form: array_key_exists('suscription_form', $fields) ? $fields['suscription_form'] : $this->suscription_form,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
