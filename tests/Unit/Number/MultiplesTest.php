<?php

namespace tests\Unit\Number;

use PHPUnit\Framework\TestCase;
use src\Number\Multiple\{
    Multiples,
    Strategy\ThreeAndFive,
    Strategy\ThreeAndFiveOrSeven,
    Strategy\ThreeOrFive
};

class MultiplesTest extends TestCase
{
    /**
     * @dataProvider strategyProvider
     */
    public function testMultiples(int $expected, string $strategyInterface): void
    {
        $multiple = new Multiples(new $strategyInterface());
        $result = $multiple->inRange(0, 1000);

        $this->assertEquals($expected, $result);
    }

    /**
     * @return array<int, array<int, int|string>>
     */
    public function strategyProvider(): array
    {
        return [
            [233168, ThreeOrFive::class],
            [33165, ThreeAndFive::class],
            [33173, ThreeAndFiveOrSeven::class],
        ];
    }
}
