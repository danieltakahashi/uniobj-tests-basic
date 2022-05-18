<?php

namespace tests\Unit\Store;

use PHPUnit\Framework\TestCase;
use src\Store\Cart\Cart;
use src\Store\Checkout\Checkout;
use src\Store\Checkout\Service\Correio;
use src\Store\User\User;

class CheckoutTest extends TestCase
{
    /**
     * @param bool $expected
     * @param float $cartTotalValue
     * @dataProvider freeShippingProvider
     */
    public function testFreeShipping($expected, $cartTotalValue): void
    {
        $cart = $this->getMockBuilder(Cart::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getTotalValue'])
            ->getMock();
        $cart->expects($this->once())
            ->method('getTotalValue')
            ->willReturn($cartTotalValue);

        $correio = $this->createStub(Correio::class);

        $checkout = new Checkout($cart, $correio);

        $this->assertEquals($expected, $checkout->isFreeShipping());
    }

    /**
     * @dataProvider shippingProvider
     * @return void
     */
    public function testShippingValue(float $expected, float $cartTotalValue): void
    {
        $user = $this->createStub(User::class);

        $cart = $this->getMockBuilder(Cart::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getUser', 'getTotalValue'])
            ->getMock();
        $cart->expects($this->once())
            ->method('getTotalValue')
            ->willReturn($cartTotalValue);

        $correio = $this->getMockBuilder(Correio::class)
            ->onlyMethods(['shippingValue'])
            ->getMock();
        $correio->expects($this->atMost(1))
            ->method('shippingValue')
            ->willReturn($expected);

        $checkout = new Checkout($cart, $correio);
        $shippingValue = $checkout->shippingValue();

        $this->assertEquals($expected, $shippingValue);
    }

    /**
     * @return void
     */
    public function testTotalCheckoutValue(): void
    {
        $user = $this->createStub(User::class);

        $cart = $this->getMockBuilder(Cart::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getUser', 'getTotalValue'])
            ->getMock();
        $cart->expects($this->once())
            ->method('getUser')
            ->willReturn($user);
        $cart->expects($this->exactly(2))
            ->method('getTotalValue')
            ->willReturn(18.00);

        $correio = $this->getMockBuilder(Correio::class)
            ->onlyMethods(['shippingValue'])
            ->getMock();
        $correio->expects($this->once())
            ->method('shippingValue')
            ->willReturn(12.11);

        $checkout = new Checkout($cart, $correio);

        $this->assertEquals(30.11, $checkout->getTotalValue());
    }

    /**
     * @return array{array{float, float}}
     */
    public function shippingProvider(): array
    {
        return [
            [0.00, Checkout::FREE_SHIPPING_VALUE],
            [12.11, Checkout::FREE_SHIPPING_VALUE - 1]
        ];
    }

    /**
     * @return array{array{bool, float}}
     */
    public function shippingValueProvider(): array
    {
        return [
            [true, Checkout::FREE_SHIPPING_VALUE],
            [false, Checkout::FREE_SHIPPING_VALUE - 1]
        ];
    }

    /**
     * @return array{array{bool, float}}
     */
    public function freeShippingProvider(): array
    {
        return [
            [true, Checkout::FREE_SHIPPING_VALUE],
            [false, Checkout::FREE_SHIPPING_VALUE - 1]
        ];
    }
}
