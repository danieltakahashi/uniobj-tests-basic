<?php

namespace tests\Unit\Number;

use PHPUnit\Framework\TestCase;
use src\Number\Multiple\Multiples;
use src\Number\Multiple\Strategy\ThreeAndFive;
use src\Number\Multiple\Strategy\ThreeAndFiveOrSeven;
use src\Number\Multiple\Strategy\ThreeOrFive;

class MultiplesTest extends TestCase
{
    protected Multiples $multiples;

    /**
     * @return void
     */
    public function testMultipleOfThreeOrFive(): void
    {
        $multiple = new Multiples(new ThreeOrFive());
        $result = $multiple->inRange(0, 1000);

        $this->assertEquals(233168, $result);
    }

    /**
     * @return void
     */
    public function testMultipleOfThreeAndFive(): void
    {
        $multiple = new Multiples(new ThreeAndFive());
        $result = $multiple->inRange(0, 1000);

        $this->assertEquals(33165, $result);
    }

    /**
     * @return void
     */
    public function testMultipleOfThreeOrFiveAndSeven(): void
    {
        $multiple = new Multiples(new ThreeAndFiveOrSeven());
        $result = $multiple->inRange(0, 1000);

        $this->assertEquals(33173, $result);
    }
}
