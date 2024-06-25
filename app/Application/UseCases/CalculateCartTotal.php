<?php

namespace App\Application\UseCases;

use App\Domain\Services\ShoppingCartService;
use App\Domain\ValueObjects\PaymentMethod;

class CalculateCartTotal
{
    private ShoppingCartService $cartService;

    public function __construct(ShoppingCartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function execute(PaymentMethod $paymentMethod): float
    {
        return $this->cartService->calculateTotal($paymentMethod);
    }
}
