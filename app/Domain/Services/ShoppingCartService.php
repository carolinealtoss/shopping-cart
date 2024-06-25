<?php

namespace App\Domain\Services;

use App\Domain\Entities\Item;
use App\Domain\ValueObjects\PaymentMethod;

class ShoppingCartService
{
    private array $items = [];

    public function addItem(Item $item): void
    {
        $this->items[] = $item;
    }

    public function calculateTotal(PaymentMethod $paymentMethod): float
    {
        $total = array_reduce($this->items, function ($sum, Item $item) {
            return $sum + $item->getTotalPrice();
        }, 0);

        $finalTotal = $paymentMethod->calculateTotal($total);

        return number_format($finalTotal, 2, '.');
    }
}
