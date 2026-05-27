<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationTrigger_AutomationTriggerBuyAProduct_automation_trigger_write
{
    public function __construct(
        public readonly string $condition,
        public readonly ?string $store,
        /** @var list<Category_automation_trigger_write>|null */
        public readonly ?array $categories = null,
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
            store: $data['store'],
            categories: isset($data['categories']) ? array_map(fn($x) => Category_automation_trigger_write::fromArray($x), $data['categories']) : null,
            products: isset($data['products']) ? array_map(fn($x) => Product_automation_trigger_write::fromArray($x), $data['products']) : null,
            workflow_repeat: $data['workflow_repeat'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'condition' => $this->condition,
            'store' => $this->store,
            'categories' => $this->categories !== null ? array_map(fn($x) => $x->toArray(), $this->categories) : null,
            'products' => $this->products !== null ? array_map(fn($x) => $x->toArray(), $this->products) : null,
            'workflow_repeat' => $this->workflow_repeat,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            condition: array_key_exists('condition', $fields) ? $fields['condition'] : $this->condition,
            store: array_key_exists('store', $fields) ? $fields['store'] : $this->store,
            categories: array_key_exists('categories', $fields) ? $fields['categories'] : $this->categories,
            products: array_key_exists('products', $fields) ? $fields['products'] : $this->products,
            workflow_repeat: array_key_exists('workflow_repeat', $fields) ? $fields['workflow_repeat'] : $this->workflow_repeat,
        );
    }
}
