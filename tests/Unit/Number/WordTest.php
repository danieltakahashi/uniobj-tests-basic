<?php

namespace tests\Unit\Number;

use PHPUnit\Framework\TestCase;
use src\Number\Word\Word;
use src\Number\Multiple\Strategy\{
    Prime,
    ThreeOrFive
};

class WordTest extends TestCase
{
    public function testFilterWord(): void
    {
        $word = new Word('BA234AaAds34f');

        $this->assertEquals('BAAaAdsf', $word->getWord());
    }

    public function testIsPrimeNumber(): void
    {
        $word = new Word('b');

        $this->assertTrue($word->isMultiple(new Prime()));
    }

    public function testIsNotPrimeNumber(): void
    {
        $word = new Word('d');

        $this->assertFalse($word->isMultiple(new Prime()));
    }

    public function testIsHappy(): void
    {
        $word = new Word('g');

        $this->assertTrue($word->isHappy());
    }

    public function testIsNotHappy(): void
    {
        $word = new Word('Test');

        $this->assertFalse($word->isHappy());
    }

    public function testIsMultipleOfThreeOrFive(): void
    {
        $word = new Word('DANIEL');

        $this->assertTrue($word->isMultiple(new ThreeOrFive()));
    }

    public function testIsNotMultipleOfThreeOrFive(): void
    {
        $word = new Word('Daniel');

        $this->assertFalse($word->isMultiple(new ThreeOrFive()));
    }
}
