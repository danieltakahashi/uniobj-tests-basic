<?php

namespace src\Number\Multiple;

use src\Number\Multiple\Strategy\IStrategy;

class Multiples
{
    public int $result = 0;

    public IStrategy $strategy;

    /**
     * @param IStrategy $strategy
     */
    public function __construct(IStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @param int $start
     * @param int $end
     * @return int
     */
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

    /**
     * @param int $number
     * @return bool
     */
    public function fit(int $number): bool
    {
        return $this->strategy->fit($number);
    }
}
