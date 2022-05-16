<?php

namespace src\Number\Multiple\Strategy;

class Prime implements IStrategy
{
    /**
     * @param int $number
     * @return bool
     */
    public function fit(int $number): bool
    {
        for ($i = 2; $i <= $number/2; $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }

        return true;
    }
}
