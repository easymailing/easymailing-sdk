<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SmsCampaign_CampaignSendSmsTestInput_jsonld_campaign_write_send_sms_test
{
    public function __construct(
        /** @var string[] */
        public readonly array $phones,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            phones: $data['phones'],
        );
    }

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
