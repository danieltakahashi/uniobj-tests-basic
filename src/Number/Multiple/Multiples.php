<?php

declare(strict_types=1);

namespace src\Number\Multiple;

use src\Number\Multiple\Strategy\IStrategy;

class Multiples
{
    private IStrategy $strategy;

    public function __construct(IStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function inRange(int $start, int $end): int
    {
        $result = 0;

        while ($start < $end) {
            if ($this->strategy->fit($start)) {
                $result += $start;
            }

            $start++;
        }

        return $result;
    }

    public function fit(int $number): bool
    {
        return $this->strategy->fit($number);
    }
}
