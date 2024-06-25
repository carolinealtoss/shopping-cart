<?php

namespace App\Domain\ValueObjects;

class PixPayment extends PaymentMethod
{
    public function calculateTotal(float $amount): float
    {
        return $amount * 0.90; // Desconto de 10%
    }
}
