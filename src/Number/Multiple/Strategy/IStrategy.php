<?php

declare(strict_types=1);

namespace src\Number\Multiple\Strategy;

interface IStrategy
{
    public function fit(int $number): bool;
}
