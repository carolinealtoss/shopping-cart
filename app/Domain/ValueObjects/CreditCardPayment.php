<?php

namespace App\Domain\ValueObjects;

class CreditCardPayment extends PaymentMethod
{
    private int $installments;

    public function __construct(int $installments)
    {
        $this->installments = $installments;
    }

    public function calculateTotal(float $amount): float
    {
        if ($this->installments == 1) {
            return $amount; // Sem juros
        }

        $rate = 0.01; // 1% de juros ao mês

        return $amount * pow(1 + $rate, $this->installments);
    }
}
