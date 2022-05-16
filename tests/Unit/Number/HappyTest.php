<?php

namespace tests\Unit\Number;

use PHPUnit\Framework\TestCase;
use src\Number\Happy\Happy;

class HappyNumberTest extends TestCase
{
    protected Happy $happy;

    public function setUp(): void
    {
        $this->happy = new Happy();
    }

    /**
     * @return void
     */
    public function testIsHappy(): void
    {
        $this->assertTrue($this->happy->isHappy(7));
    }

    /**
     * @return void
     */
    public function testIsNotHappy(): void
    {
        $this->assertFalse($this->happy->isHappy(4));
    }

    /**
     * @return void
     */
    public function testIsHappyExceptionWhenNumberIsNegative(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid number');

        $this->happy->isHappy(-2);
    }
}
