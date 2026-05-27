<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class DesignSetting_jsonld_design_setting_create
{
    public function __construct(
        public readonly string $title,
        public readonly ?ButtonDto_jsonld_design_setting_create $button = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $color_palette = null,
        /** @var list<CustomFontDto_jsonld_design_setting_create>|null */
        public readonly ?array $custom_fonts = null,
        public readonly ?bool $default = null,
        public readonly ?int $email_width = null,
        public readonly ?int $page_width = null,
        /** @var list<SocialLinkDto_jsonld_design_setting_create>|null */
        public readonly ?array $social_links = null,
        public readonly ?TextsDto_jsonld_design_setting_create $texts = null,
        public readonly ?TitlesDto_jsonld_design_setting_create $titles = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            button: isset($data['button']) ? ButtonDto_jsonld_design_setting_create::fromArray($data['button']) : null,
            color_palette: $data['color_palette'] ?? null,
            custom_fonts: isset($data['custom_fonts']) ? array_map(fn($x) => CustomFontDto_jsonld_design_setting_create::fromArray($x), $data['custom_fonts']) : null,
            default: $data['default'] ?? null,
            email_width: $data['email_width'] ?? null,
            page_width: $data['page_width'] ?? null,
            social_links: isset($data['social_links']) ? array_map(fn($x) => SocialLinkDto_jsonld_design_setting_create::fromArray($x), $data['social_links']) : null,
            texts: isset($data['texts']) ? TextsDto_jsonld_design_setting_create::fromArray($data['texts']) : null,
            titles: isset($data['titles']) ? TitlesDto_jsonld_design_setting_create::fromArray($data['titles']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'button' => $this->button?->toArray(),
            'color_palette' => $this->color_palette,
            'custom_fonts' => $this->custom_fonts !== null ? array_map(fn($x) => $x->toArray(), $this->custom_fonts) : null,
            'default' => $this->default,
            'email_width' => $this->email_width,
            'page_width' => $this->page_width,
            'social_links' => $this->social_links !== null ? array_map(fn($x) => $x->toArray(), $this->social_links) : null,
            'texts' => $this->texts?->toArray(),
            'titles' => $this->titles?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            button: array_key_exists('button', $fields) ? $fields['button'] : $this->button,
            color_palette: array_key_exists('color_palette', $fields) ? $fields['color_palette'] : $this->color_palette,
            custom_fonts: array_key_exists('custom_fonts', $fields) ? $fields['custom_fonts'] : $this->custom_fonts,
            default: array_key_exists('default', $fields) ? $fields['default'] : $this->default,
            email_width: array_key_exists('email_width', $fields) ? $fields['email_width'] : $this->email_width,
            page_width: array_key_exists('page_width', $fields) ? $fields['page_width'] : $this->page_width,
            social_links: array_key_exists('social_links', $fields) ? $fields['social_links'] : $this->social_links,
            texts: array_key_exists('texts', $fields) ? $fields['texts'] : $this->texts,
            titles: array_key_exists('titles', $fields) ? $fields['titles'] : $this->titles,
        );
    }
}
