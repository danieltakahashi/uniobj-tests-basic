<?php

namespace tests\Unit\Number;

use PHPUnit\Framework\TestCase;
use src\Number\Multiple\{
    Multiples,
    Strategy\ThreeAndFive,
    Strategy\ThreeAndFiveOrSeven,
    Strategy\ThreeOrFive
};
use src\Number\Multiple\Strategy\IStrategy;

class MultiplesTest extends TestCase
{
    /**
     * @dataProvider strategyProvider
     */
    public function testMultiples(int $expected, IStrategy $strategyInterface): void
    {
        $multiple = new Multiples($strategyInterface);
        $result = $multiple->inRange(0, 1000);

        $this->assertEquals($expected, $result);
    }

    /**
     * @return array<int, array<int, int|ThreeAndFive|ThreeAndFiveOrSeven|ThreeOrFive>>
     */
    public function strategyProvider(): array
    {
        return [
            [233168, new ThreeOrFive()],
            [33165, new ThreeAndFive()],
            [33173, new ThreeAndFiveOrSeven()],
        ];
    }
}
