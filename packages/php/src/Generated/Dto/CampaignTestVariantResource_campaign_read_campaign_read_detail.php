<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class CampaignTestVariantResource_campaign_read_campaign_read_detail
{
    public function __construct(
        public readonly ?float $click_rate = null,
        public readonly ?int $clicks = null,
        public readonly ?int $delivered = null,
        public readonly ?string $from_email = null,
        public readonly ?string $from_name = null,
        public readonly ?float $open_rate = null,
        public readonly ?int $opens = null,
        public readonly ?string $preview_text = null,
        public readonly ?int $sort = null,
        public readonly ?string $subject = null,
        public readonly ?string $template = null,
        public readonly ?string $template_html = null,
        public readonly ?string $template_thumbnail = null,
        public readonly ?string $uuid = null,
        public readonly ?bool $winner = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            click_rate: $data['click_rate'] ?? null,
            clicks: $data['clicks'] ?? null,
            delivered: $data['delivered'] ?? null,
            from_email: $data['from_email'] ?? null,
            from_name: $data['from_name'] ?? null,
            open_rate: $data['open_rate'] ?? null,
            opens: $data['opens'] ?? null,
            preview_text: $data['preview_text'] ?? null,
            sort: $data['sort'] ?? null,
            subject: $data['subject'] ?? null,
            template: $data['template'] ?? null,
            template_html: $data['template_html'] ?? null,
            template_thumbnail: $data['template_thumbnail'] ?? null,
            uuid: $data['uuid'] ?? null,
            winner: $data['winner'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'click_rate' => $this->click_rate,
            'clicks' => $this->clicks,
            'delivered' => $this->delivered,
            'from_email' => $this->from_email,
            'from_name' => $this->from_name,
            'open_rate' => $this->open_rate,
            'opens' => $this->opens,
            'preview_text' => $this->preview_text,
            'sort' => $this->sort,
            'subject' => $this->subject,
            'template' => $this->template,
            'template_html' => $this->template_html,
            'template_thumbnail' => $this->template_thumbnail,
            'uuid' => $this->uuid,
            'winner' => $this->winner,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            click_rate: array_key_exists('click_rate', $fields) ? $fields['click_rate'] : $this->click_rate,
            clicks: array_key_exists('clicks', $fields) ? $fields['clicks'] : $this->clicks,
            delivered: array_key_exists('delivered', $fields) ? $fields['delivered'] : $this->delivered,
            from_email: array_key_exists('from_email', $fields) ? $fields['from_email'] : $this->from_email,
            from_name: array_key_exists('from_name', $fields) ? $fields['from_name'] : $this->from_name,
            open_rate: array_key_exists('open_rate', $fields) ? $fields['open_rate'] : $this->open_rate,
            opens: array_key_exists('opens', $fields) ? $fields['opens'] : $this->opens,
            preview_text: array_key_exists('preview_text', $fields) ? $fields['preview_text'] : $this->preview_text,
            sort: array_key_exists('sort', $fields) ? $fields['sort'] : $this->sort,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            template: array_key_exists('template', $fields) ? $fields['template'] : $this->template,
            template_html: array_key_exists('template_html', $fields) ? $fields['template_html'] : $this->template_html,
            template_thumbnail: array_key_exists('template_thumbnail', $fields) ? $fields['template_thumbnail'] : $this->template_thumbnail,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            winner: array_key_exists('winner', $fields) ? $fields['winner'] : $this->winner,
        );
    }
}
