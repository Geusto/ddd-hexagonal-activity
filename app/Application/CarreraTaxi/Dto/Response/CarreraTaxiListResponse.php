<?php

namespace App\Application\CarreraTaxi\Dto\Response;

class CarreraTaxiListResponse
{
    /**
     * @param CarreraTaxiResponse[] $items
     */
    public function __construct(
        public readonly array $items,
        public readonly ?int $total = null
        // public readonly ?int $page = null,
        // public readonly ?int $perPage = null,
    ) {}

    public function toArray(): array
    {
        return [
            'items' => array_map(static fn (CarreraTaxiResponse $item) => $item->toArray(), $this->items),
            'total' => $this->total,
            // 'page' => $this->page,
            // 'perPage' => $this->perPage,
        ];
    }
}