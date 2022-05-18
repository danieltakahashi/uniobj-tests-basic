<?php

namespace tests\Unit\Number;

use PHPUnit\Framework\TestCase;
use src\Number\Multiple\Strategy\Prime;
use src\Number\Multiple\Strategy\ThreeOrFive;
use src\Number\Word\Word;

class WordTest extends TestCase
{
    /**
     * @return void
     */
    public function testFilterWord(): void
    {
        $word = new Word('BA234AaAds34f');

        $this->assertEquals('BAAaAdsf', $word->getWord());
    }

    /**
     * @return void
     */
    public function testIsPrimeNumber(): void
    {
        $word = new Word('b');

        $this->assertTrue($word->isMultiple(Prime::class));
    }

    /**
     * @return void
     */
    public function testIsNotPrimeNumber(): void
    {
        $word = new Word('d');

        $this->assertFalse($word->isMultiple(Prime::class));
    }

    /**
     * @return void
     */
    public function testIsHappy(): void
    {
        $word = new Word('g');

        $this->assertTrue($word->isHappy());
    }

    /**
     * @return void
     */
    public function testIsNotHappy(): void
    {
        $word = new Word('Test');

        $this->assertFalse($word->isHappy());
    }

    /**
     * @return void
     */
    public function testIsMultipleOfThreeOrFive(): void
    {
        $word = new Word('DANIEL');

        $this->assertTrue($word->isMultiple(ThreeOrFive::class));
    }

    /**
     * @return void
     */
    public function testIsNotMultipleOfThreeOrFive(): void
    {
        $word = new Word('Daniel');

        $this->assertFalse($word->isMultiple(ThreeOrFive::class));
    }
}
