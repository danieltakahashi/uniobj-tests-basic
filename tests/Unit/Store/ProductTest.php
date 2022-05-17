<?php

namespace tests\Unit\Store;

use PHPUnit\Framework\TestCase;
use src\Store\Product\Product;

class ProductTest extends TestCase
{
    /**
     * @return void
     */
    public function testProduct(): void
    {
        $product = new Product('Chocolate', 6.32, 3);

        $this->assertEquals('Chocolate', $product->getName());
        $this->assertEquals(6.32, $product->getValue());
        $this->assertEquals(3, $product->getQuantity());
    }
}
