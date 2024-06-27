<?php

use PHPUnit\Framework\TestCase;
use App\Domain\ValueObjects\CreditCardPayment;

class CreditCardPaymentTest extends TestCase
{
    public function testValidInstallments()
    {
        $data = [
            'cardHolderName' => 'Tuk Tuk',
            'cardNumber' => '1234567812345678',
            'expiryDate' => '12/25',
            'cvv' => '123',
            'installments' => 12
        ];

        $payment = new CreditCardPayment($data);

        $this->assertInstanceOf(CreditCardPayment::class, $payment);
        $this->assertEquals(12, $payment->getInstallments());
    }

    public function testInvalidInstallmentsGreaterThan12()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Installments must be between 1 and 12.');

        $data = [
            'cardHolderName' => 'Sisu Doe',
            'cardNumber' => '1234567812345678',
            'expiryDate' => '12/25',
            'cvv' => '123',
            'installments' => 13
        ];

        new CreditCardPayment($data);
    }

    public function testInvalidInstallmentsLessThan1()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Installments must be between 1 and 12.');

        $data = [
            'cardHolderName' => 'John Doe',
            'cardNumber' => '1234567812345678',
            'expiryDate' => '12/25',
            'cvv' => '123',
            'installments' => 0
        ];

        new CreditCardPayment($data);
    }
}
