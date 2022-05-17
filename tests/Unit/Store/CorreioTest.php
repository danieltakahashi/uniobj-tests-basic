<?php

namespace tests\Unit\Store;

use PHPUnit\Framework\TestCase;
use src\Store\Checkout\Service\Correio;

class CorreioTest extends TestCase
{
    /**
     * @return void
     */
    public function testShippingValue(): void
    {
        $correio = new Correio();

        $this->assertEquals(15.22, $correio->shippingValue('86040640'));
    }
}
