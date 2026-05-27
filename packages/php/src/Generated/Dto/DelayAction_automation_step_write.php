<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class DelayAction_automation_step_write
{
    public function __construct(
        public readonly ?\DateTimeImmutable $date_year = null,
        public readonly ?int $day_month = null,
        /** @var list<int>|null */
        public readonly ?array $day_week = null,
        public readonly ?string $delay_unit = null,
        public readonly ?int $delay_value = null,
        public readonly ?int $time_hour = null,
        public readonly ?int $time_minute = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            date_year: isset($data['date_year']) ? new \DateTimeImmutable($data['date_year']) : null,
            day_month: $data['day_month'] ?? null,
            day_week: $data['day_week'] ?? null,
            delay_unit: $data['delay_unit'] ?? null,
            delay_value: $data['delay_value'] ?? null,
            time_hour: $data['time_hour'] ?? null,
            time_minute: $data['time_minute'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'date_year' => $this->date_year?->format(\DateTimeInterface::ATOM),
            'day_month' => $this->day_month,
            'day_week' => $this->day_week,
            'delay_unit' => $this->delay_unit,
            'delay_value' => $this->delay_value,
            'time_hour' => $this->time_hour,
            'time_minute' => $this->time_minute,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            date_year: array_key_exists('date_year', $fields) ? $fields['date_year'] : $this->date_year,
            day_month: array_key_exists('day_month', $fields) ? $fields['day_month'] : $this->day_month,
            day_week: array_key_exists('day_week', $fields) ? $fields['day_week'] : $this->day_week,
            delay_unit: array_key_exists('delay_unit', $fields) ? $fields['delay_unit'] : $this->delay_unit,
            delay_value: array_key_exists('delay_value', $fields) ? $fields['delay_value'] : $this->delay_value,
            time_hour: array_key_exists('time_hour', $fields) ? $fields['time_hour'] : $this->time_hour,
            time_minute: array_key_exists('time_minute', $fields) ? $fields['time_minute'] : $this->time_minute,
        );
    }
}
