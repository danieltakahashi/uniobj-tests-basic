<?php

declare(strict_types=1);

namespace src\Number\Word;

use src\Number\Multiple\Strategy\IStrategy;

interface IWord
{
    public function __construct(string $word);

    public function getWord(): string;

    public function getTotalSum(): int;

    public function isHappy(): bool;

    public function isMultiple(IStrategy $strategyClass): bool;

    public function filterWord(string $word): string;

    public function alphabetToNumber(string $letter): int|false;
}
