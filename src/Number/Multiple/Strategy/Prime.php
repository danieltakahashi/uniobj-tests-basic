<?php

declare(strict_types=1);

namespace src\Number\Multiple\Strategy;

class Prime implements IStrategy
{
    public function fit(int $number): bool
    {
        for ($i = 2; $i <= $number / 2; $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }

        return true;
    }
}
