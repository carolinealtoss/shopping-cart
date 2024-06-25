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
        $total = $this->cart->calculateTotal(new CreditCardPayment(1));
        $this->assertEquals(200.00, $total);

        $total = $this->cart->calculateTotal(new CreditCardPayment(12));
        $this->assertEquals(225.37, $total);
    }
}
