<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Campaign_CampaignSendTestInput_campaign_write_send_test
{
    public function __construct(
        /** @var list<string> */
        public readonly array $emails,
        public readonly ?int $test_index = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            emails: $data['emails'],
            test_index: $data['test_index'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'emails' => $this->emails,
            'test_index' => $this->test_index,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            emails: array_key_exists('emails', $fields) ? $fields['emails'] : $this->emails,
            test_index: array_key_exists('test_index', $fields) ? $fields['test_index'] : $this->test_index,
        );
    }
}
