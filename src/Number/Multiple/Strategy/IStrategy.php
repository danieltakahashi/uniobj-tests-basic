<?php

namespace src\Number\Multiple\Strategy;

interface IStrategy
{
    /**
     * @param int $number
     * @return bool
     */
    public function fit(int $number): bool;
}
