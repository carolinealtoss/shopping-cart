<?php

namespace App\Domain\ValueObjects;

class CreditCardPayment extends PaymentMethod
{
    private string $cardHolderName;
    private string $cardNumber;
    private string $expiryDate;
    private string $cvv;
    private int $installments;

    public function __construct(array $data)
    {
        $this->cardHolderName = $data['cardHolderName'];
        $this->cardNumber = $data['cardNumber'];
        $this->expiryDate = $data['expiryDate'];
        $this->cvv = $data['cvv'];

        if ($data['installments'] < 1 || $data['installments'] > 12) {
            throw new \InvalidArgumentException('Installments must be between 1 and 12.');
        }

        $this->installments = $data['installments'];
    }

    public function calculateTotal(float $amount): float
    {
        if ($this->installments == 1) {
            return $amount; // Sem juros
        }

        $rate = 0.01; // 1% de juros ao mês

        return $amount * (1 + $rate) ** $this->installments;
    }

    public function getInstallments(): int
    {
        return $this->installments;
    }
}
