<?php

declare(strict_types=1);

namespace src\Number\Word;

use src\Number\Happy\Happy;
use src\Number\Multiple\Multiples;
use src\Number\Multiple\Strategy\IStrategy;

final class Word implements IWord
{
    /**
     * @var array<int, string>
     */
    private array $alphabet;

    private string $word;

    public function __construct(string $word)
    {
        $this->word = $this->filterWord($word);

        $alphabet = array_merge(range('a', 'z'), range('A', 'Z'));
        array_unshift($alphabet, null);
        unset($alphabet[0]);

        $this->alphabet = $alphabet;
    }

    public function getWord(): string
    {
        return $this->word;
    }

    public function getTotalSum(): int
    {
        $letters = str_split($this->word, 1);

        $result = 0;
        foreach ($letters as $letter) {
            $result += $this->alphabetToNumber($letter);
        }

        return $result;
    }

    public function isHappy(): bool
    {
        return (new Happy())->isHappy($this->getTotalSum());
    }

    public function isMultiple(IStrategy $strategyClass): bool
    {
        return (new Multiples($strategyClass))->fit($this->getTotalSum());
    }

    public function filterWord(string $word): string
    {
        return preg_replace('/[^a-zA-Z]+/', '', $word) ?? '';
    }

    public function alphabetToNumber(string $letter): int|false
    {
        return array_search($letter, $this->alphabet);
    }
}
