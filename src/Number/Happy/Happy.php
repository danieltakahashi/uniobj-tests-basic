<?php

declare(strict_types=1);

namespace src\Number\Happy;

class Happy
{
    /**
     * @var array<int>
     */
    private array $numberHistory = [];

    public function isHappy(int $number): bool
    {
        if (! $this->isValid($number)) {
            return false;
        }

        $this->putHistory($number);

        $resultSum = $this->sumPow($number);

        if ($resultSum !== 1) {
            return $this->isHappy($resultSum);
        }

        return true;
    }

    private function sumPow(int $numbers): int
    {
        $result = 0;

        $numbers = (string) $numbers;
        $resultSplit = str_split($numbers, 1);
        foreach ($resultSplit as $number) {
            $number = (int) $number;
            $result += pow($number, 2);
        }

        return $result;
    }

    private function putHistory(int $number): void
    {
        array_push($this->numberHistory, $number);
    }

    private function isValid(int $number): bool
    {
        if ($number < 0) {
            throw new \Exception('Invalid number');
        }

        return ! in_array($number, $this->numberHistory);
    }
}
