<?php

namespace App\Domain\ValueObjects;

abstract class PaymentMethod
{
    abstract public function calculateTotal(float $amount): float;
}
