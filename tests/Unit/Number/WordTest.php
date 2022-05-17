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
    private Word $word;

    public function setUp(): void
    {
        $this->word = new Word();
    }

    /**
     * @return void
     */
    public function testFilterWord(): void
    {
        $this->word->setWord('BA234AaAds34f');

        $this->assertEquals('BAAaAdsf', $this->word->word);
    }

    /**
     * @return void
     */
    public function testIsPrimeNumber(): void
    {
        $this->word->setWord('b');

        $this->assertTrue($this->word->isMultiple(Prime::class));
    }

    /**
     * @return void
     */
    public function testIsNotPrimeNumber(): void
    {
        $this->word->setWord('d');

        $this->assertFalse($this->word->isMultiple(Prime::class));
    }

    /**
     * @return void
     */
    public function testIsHappy(): void
    {
        $this->word->setWord('g');

        $this->assertTrue($this->word->isHappy());
    }

    /**
     * @return void
     */
    public function testIsNotHappy(): void
    {
        $this->word->setWord('Test');

        $this->assertFalse($this->word->isHappy());
    }

    /**
     * @return void
     */
    public function testIsMultipleOfThreeOrFive(): void
    {
        $this->word->setWord('DANIEL');

        $this->assertTrue($this->word->isMultiple(ThreeOrFive::class));
    }

    /**
     * @return void
     */
    public function testIsNotMultipleOfThreeOrFive(): void
    {
        $this->word->setWord('Daniel');

        $this->assertFalse($this->word->isMultiple(ThreeOrFive::class));
    }
}
