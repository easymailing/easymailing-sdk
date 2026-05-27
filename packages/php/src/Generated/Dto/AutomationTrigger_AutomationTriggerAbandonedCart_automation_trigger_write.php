<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationTrigger_AutomationTriggerAbandonedCart_automation_trigger_write
{
    public function __construct(
        public readonly string $condition,
        public readonly string $delay_unit,
        public readonly ?int $delay_value,
        public readonly ?string $store,
        /** @var list<Category_automation_trigger_write>|null */
        public readonly ?array $categories = null,
        public readonly ?bool $exclude = null,
        /** @var list<Product_automation_trigger_write>|null */
        public readonly ?array $products = null,
        public readonly ?bool $workflow_repeat = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            condition: $data['condition'],
            delay_unit: $data['delay_unit'],
            delay_value: $data['delay_value'],
            store: $data['store'],
            categories: isset($data['categories']) ? array_map(fn($x) => Category_automation_trigger_write::fromArray($x), $data['categories']) : null,
            exclude: $data['exclude'] ?? null,
            products: isset($data['products']) ? array_map(fn($x) => Product_automation_trigger_write::fromArray($x), $data['products']) : null,
            workflow_repeat: $data['workflow_repeat'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'condition' => $this->condition,
            'delay_unit' => $this->delay_unit,
            'delay_value' => $this->delay_value,
            'store' => $this->store,
            'categories' => $this->categories !== null ? array_map(fn($x) => $x->toArray(), $this->categories) : null,
            'exclude' => $this->exclude,
            'products' => $this->products !== null ? array_map(fn($x) => $x->toArray(), $this->products) : null,
            'workflow_repeat' => $this->workflow_repeat,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            condition: array_key_exists('condition', $fields) ? $fields['condition'] : $this->condition,
            delay_unit: array_key_exists('delay_unit', $fields) ? $fields['delay_unit'] : $this->delay_unit,
            delay_value: array_key_exists('delay_value', $fields) ? $fields['delay_value'] : $this->delay_value,
            store: array_key_exists('store', $fields) ? $fields['store'] : $this->store,
            categories: array_key_exists('categories', $fields) ? $fields['categories'] : $this->categories,
            exclude: array_key_exists('exclude', $fields) ? $fields['exclude'] : $this->exclude,
            products: array_key_exists('products', $fields) ? $fields['products'] : $this->products,
            workflow_repeat: array_key_exists('workflow_repeat', $fields) ? $fields['workflow_repeat'] : $this->workflow_repeat,
        );
    }
}
