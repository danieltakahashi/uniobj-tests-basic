<?php

namespace src\Number\Happy;

class Happy
{
    /**
     * @var array<int>
     */
    protected array $numberHistory = [];

    /**
     * @param int $number
     * @return bool
     */
    public function isHappy(int $number): bool
    {
        if (!$this->isValid($number)) {
            return false;
        }

        $this->putHistory($number);

        $resultSum = $this->sumPow($number);

        if ($resultSum != 1) {
            return $this->isHappy($resultSum);
        }

        return true;
    }

    /**
     * @param int $numbers
     * @return int
     */
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

    /**
     * @param int $number
     * @return void
     */
    private function putHistory(int $number): void
    {
        array_push($this->numberHistory, $number);
    }

    /**
     * @param int $number
     * @return bool
     */
    private function isValid($number): bool
    {
        if ($number < 0) {
            throw new \Exception('Invalid number');
        }

        if (in_array($number, $this->numberHistory)) {
            return false;
        }

        return true;
    }
}
