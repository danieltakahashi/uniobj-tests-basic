<?php

namespace src\Number\Word;

use src\Number\Happy\Happy;
use src\Number\Multiple\Multiples;

class Word
{
    /**
     * @var array<int, string>
     */
    private array $alphabet;

    /**
     * @var string
     */
    public string $word;

    public function __construct()
    {
        $alphabet = array_merge(range('a', 'z'), range('A', 'Z'));
        array_unshift($alphabet, null);
        unset($alphabet[0]);

        $this->alphabet = $alphabet;
    }

    /**
     * @param string $word
     * @return void
     */
    public function setWord(string $word): void
    {
        $this->word = $this->filterWord($word);
    }

    /**
     * @param string $word
     * @return string
     */
    private function filterWord(string $word): string
    {
        return preg_replace("/[^a-zA-Z]+/", "", $word);
    }

    /**
     * @return int
     */
    public function getTotalSum(): int
    {
        $letters = str_split($this->word, 1);

        $result = 0;
        foreach ($letters as $letter) {
            $result += $this->alphabetToNumber($letter);
        }

        return $result;
    }

    /**
     * @param string $letter
     * @return int
     */
    private function alphabetToNumber(string $letter): int
    {
        return array_search($letter, $this->alphabet);
    }

    /**
     * @return bool
     */
    public function isHappy(): bool
    {
        return (new Happy())->isHappy($this->getTotalSum());
    }

    /**
     * @return bool
     */
    public function isMultiple(string $strategyClass): bool
    {
        return (new Multiples(new $strategyClass()))->fit($this->getTotalSum());
    }
}
