<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Contact_jsonld_contact_read
{
    public function __construct(
        public readonly ?string $client_ip = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $email = null,
        public readonly ?string $iri = null,
        public readonly ?string $locale = null,
        public readonly ?Location_jsonld_contact_read $location = null,
        public readonly ?string $phone = null,
        /** @var list<Suscription_jsonld_contact_read>|null */
        public readonly ?array $suscriptions = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            client_ip: $data['client_ip'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            email: $data['email'] ?? null,
            iri: $data['iri'] ?? null,
            locale: $data['locale'] ?? null,
            location: isset($data['location']) ? Location_jsonld_contact_read::fromArray($data['location']) : null,
            phone: $data['phone'] ?? null,
            suscriptions: isset($data['suscriptions']) ? array_map(fn($x) => Suscription_jsonld_contact_read::fromArray($x), $data['suscriptions']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'client_ip' => $this->client_ip,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'email' => $this->email,
            'iri' => $this->iri,
            'locale' => $this->locale,
            'location' => $this->location?->toArray(),
            'phone' => $this->phone,
            'suscriptions' => $this->suscriptions !== null ? array_map(fn($x) => $x->toArray(), $this->suscriptions) : null,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            client_ip: array_key_exists('client_ip', $fields) ? $fields['client_ip'] : $this->client_ip,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            location: array_key_exists('location', $fields) ? $fields['location'] : $this->location,
            phone: array_key_exists('phone', $fields) ? $fields['phone'] : $this->phone,
            suscriptions: array_key_exists('suscriptions', $fields) ? $fields['suscriptions'] : $this->suscriptions,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
