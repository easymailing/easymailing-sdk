<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SmsCampaign_CampaignSendSmsTestInput_jsonld_campaign_write_send_sms_test
{
    public function __construct(
        /** @var list<string> */
        public readonly array $phones,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            phones: $data['phones'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'phones' => $this->phones,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            phones: array_key_exists('phones', $fields) ? $fields['phones'] : $this->phones,
        );
    }
}
