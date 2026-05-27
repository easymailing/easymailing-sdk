<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class DesignSetting_design_setting_read
{
    public function __construct(
        public readonly string $title,
        public readonly ?ButtonDto_design_setting_read $button = null,
        /** @var array[]|null */
        public readonly ?array $color_palette = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var CustomFontDto_design_setting_read[]|null */
        public readonly ?array $custom_fonts = null,
        public readonly ?bool $default = null,
        /** @var DefaultFontDto_design_setting_read[]|null */
        public readonly ?array $default_fonts = null,
        public readonly ?int $email_width = null,
        public readonly ?int $id = null,
        public readonly ?string $logo_dark_url = null,
        public readonly ?string $logo_light_url = null,
        public readonly ?int $page_width = null,
        /** @var SocialLinkDto_design_setting_read[]|null */
        public readonly ?array $social_links = null,
        public readonly ?TextsDto_design_setting_read $texts = null,
        public readonly ?TitlesDto_design_setting_read $titles = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            button: isset($data['button']) ? ButtonDto_design_setting_read::fromArray($data['button']) : null,
            color_palette: $data['color_palette'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            custom_fonts: isset($data['custom_fonts']) ? array_map(fn($x) => CustomFontDto_design_setting_read::fromArray($x), $data['custom_fonts']) : null,
            default: $data['default'] ?? null,
            default_fonts: isset($data['default_fonts']) ? array_map(fn($x) => DefaultFontDto_design_setting_read::fromArray($x), $data['default_fonts']) : null,
            email_width: $data['email_width'] ?? null,
            id: $data['id'] ?? null,
            logo_dark_url: $data['logo_dark_url'] ?? null,
            logo_light_url: $data['logo_light_url'] ?? null,
            page_width: $data['page_width'] ?? null,
            social_links: isset($data['social_links']) ? array_map(fn($x) => SocialLinkDto_design_setting_read::fromArray($x), $data['social_links']) : null,
            texts: isset($data['texts']) ? TextsDto_design_setting_read::fromArray($data['texts']) : null,
            titles: isset($data['titles']) ? TitlesDto_design_setting_read::fromArray($data['titles']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'button' => $this->button?->toArray(),
            'color_palette' => $this->color_palette,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'custom_fonts' => $this->custom_fonts !== null ? array_map(fn($x) => $x->toArray(), $this->custom_fonts) : null,
            'default' => $this->default,
            'default_fonts' => $this->default_fonts !== null ? array_map(fn($x) => $x->toArray(), $this->default_fonts) : null,
            'email_width' => $this->email_width,
            'id' => $this->id,
            'logo_dark_url' => $this->logo_dark_url,
            'logo_light_url' => $this->logo_light_url,
            'page_width' => $this->page_width,
            'social_links' => $this->social_links !== null ? array_map(fn($x) => $x->toArray(), $this->social_links) : null,
            'texts' => $this->texts?->toArray(),
            'titles' => $this->titles?->toArray(),
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            button: array_key_exists('button', $fields) ? $fields['button'] : $this->button,
            color_palette: array_key_exists('color_palette', $fields) ? $fields['color_palette'] : $this->color_palette,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            custom_fonts: array_key_exists('custom_fonts', $fields) ? $fields['custom_fonts'] : $this->custom_fonts,
            default: array_key_exists('default', $fields) ? $fields['default'] : $this->default,
            default_fonts: array_key_exists('default_fonts', $fields) ? $fields['default_fonts'] : $this->default_fonts,
            email_width: array_key_exists('email_width', $fields) ? $fields['email_width'] : $this->email_width,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            logo_dark_url: array_key_exists('logo_dark_url', $fields) ? $fields['logo_dark_url'] : $this->logo_dark_url,
            logo_light_url: array_key_exists('logo_light_url', $fields) ? $fields['logo_light_url'] : $this->logo_light_url,
            page_width: array_key_exists('page_width', $fields) ? $fields['page_width'] : $this->page_width,
            social_links: array_key_exists('social_links', $fields) ? $fields['social_links'] : $this->social_links,
            texts: array_key_exists('texts', $fields) ? $fields['texts'] : $this->texts,
            titles: array_key_exists('titles', $fields) ? $fields['titles'] : $this->titles,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
