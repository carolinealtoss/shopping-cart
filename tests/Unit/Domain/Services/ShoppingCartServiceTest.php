<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Domain\Services\ShoppingCartService;
use App\Domain\Entities\Item;
use App\Domain\ValueObjects\PixPayment;
use App\Domain\ValueObjects\CreditCardPayment;

class ShoppingCartServiceTest extends TestCase
{
    private ShoppingCartService $cart;

    public function setUp(): void
    {
        parent::setUp();

        $this->cart = new ShoppingCartService();
        $this->cart->addItem(new Item('Ursinho Panda', 100.00, 2));
    }

    public function testCalculateTotalWithPixPayment()
    {
        $total = $this->cart->calculateTotal(new PixPayment());
        $this->assertEquals(180.00, $total);
    }

    public function testCalculateTotalWithCreditCardPayment()
    {
        $dataSingleInstallment = [
            'cardHolderName' => 'Anabela Luz',
            'cardNumber' => '1234567812345678',
            'expiryDate' => '12/25',
            'cvv' => '123',
            'installments' => 1
        ];

        $dataMultipleInstallments = [
            'cardHolderName' => 'Gael Solar',
            'cardNumber' => '1234567812345678',
            'expiryDate' => '12/25',
            'cvv' => '123',
            'installments' => 12
        ];

        $total = $this->cart->calculateTotal(new CreditCardPayment($dataSingleInstallment));
        $this->assertEquals(200.00, $total);

        $total = $this->cart->calculateTotal(new CreditCardPayment($dataMultipleInstallments));
        $this->assertEquals(225.37, $total);
    }
}
