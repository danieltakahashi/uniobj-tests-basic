<?php

declare(strict_types=1);

namespace src\Number\Multiple\Strategy;

class ThreeOrFive implements IStrategy
{
    public function fit(int $number): bool
    {
        return $number % 3 === 0 || $number % 5 === 0;
    }
}
