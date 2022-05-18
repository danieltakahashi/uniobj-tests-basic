<?php

declare(strict_types=1);

namespace src\Number\Multiple;

use src\Number\Multiple\Strategy\IStrategy;

interface IMultiples
{
    public function __construct(IStrategy $strategy);

    public function inRange(int $start, int $end): int;

    public function fit(int $number): bool;
}
