<?php

declare(strict_types=1);

namespace src\Number\Happy;

interface IHappy
{
    public function isHappy(int $number): bool;

    public function sumPow(int $numbers): int;

    public function putHistory(int $number): void;

    public function isValid(int $number): bool;
}
