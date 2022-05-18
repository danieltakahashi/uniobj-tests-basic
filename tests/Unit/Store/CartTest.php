<?php

namespace tests\Unit\Store;

use PHPUnit\Framework\TestCase;
use src\Store\Cart\Cart;
use src\Store\Product\Product;
use src\Store\User\User;

class CartTest extends TestCase
{
    private Cart $cart;

    public function setUp(): void
    {
        $user = $this->createStub(User::class);

        $this->cart = new Cart($user);
    }

    public function testGetUser(): void
    {
        $this->assertInstanceOf(User::class, $this->cart->getUser());
    }

    /**
     * @return void
     */
    public function testAddProduct(): void
    {
        $product = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertTrue($this->cart->addProduct($product));
    }

    /**
     * @return void
     */
    public function testRemoveProduct(): void
    {
        $product = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->getMock();
        $product->method('getValue')
            ->willReturn(1.22);
        $product->method('getQuantity')
            ->willReturn(1);

        $this->cart->addProduct($product);

        $this->assertTrue($this->cart->rmProduct($product));
        $this->assertEquals(0.00, $this->cart->getTotalValue());
    }

    /**
     * @return void
     */
    public function testUpdateProduct(): void
    {
        $product = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->getMock();
        $product->method('getValue')
            ->willReturn(1.20);
        $product->method('getQuantity')
            ->willReturnOnConsecutiveCalls(1, 2, 2);

        $this->cart->addProduct($product);
        $this->assertEquals(1.20, $this->cart->getTotalValue());

        $this->cart->updateProduct($product);
        $this->assertEquals(2.40, $this->cart->getTotalValue());
    }

    /**
     * @return void
     */
    public function testUpdateUnsetedProduct(): void
    {
        $product = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->getMock();
        $product->method('getValue')
            ->willReturn(1.20);
        $product->method('getQuantity')
            ->willReturn(1);

        $this->cart->updateProduct($product);
        $this->assertCount(1, $this->cart->getProducts());
    }

    /**
     * @return void
     */
    public function testUpdateToZeroProduct(): void
    {
        $product = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->getMock();
        $product->method('getValue')
            ->willReturn(1.20);
        $product->method('getQuantity')
            ->willReturn(0);

        $this->cart->updateProduct($product);
        $this->assertCount(0, $this->cart->getProducts());
    }

    /**
     * @return void
     */
    public function testGetProducts(): void
    {
        $product1 = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->getMock();

        $product2 = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->cart->addProduct($product1);
        $this->cart->addProduct($product2);

        $this->assertEquals(2, count($this->cart->getProducts()));
    }

    /**
     * @return void
     */
    public function testGetTotalValue(): void
    {
        $product = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->getMock();

        $product->method('getValue')
            ->willReturn(3.71);
        $product->method('getQuantity')
            ->willReturn(1);

        $this->cart->addProduct($product);

        $this->assertEquals(3.71, $this->cart->getTotalValue());
    }
}
