<?php

namespace src\Number\Multiple\Strategy;

class ThreeAndFiveOrSeven implements IStrategy
{
    /**
     * @param int $number
     * @return bool
     */
    public function fit(int $number): bool
    {
        return ($number % 3 === 0 || $number % 5 === 0) && $number % 7 === 0;
    }
}
