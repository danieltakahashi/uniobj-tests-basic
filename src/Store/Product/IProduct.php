<?php

declare(strict_types=1);

namespace src\Store\Product;

interface IProduct
{
    public function __construct(string $name, float $value, int $quantity);

    public function getName(): string;

    public function getValue(): float;

    public function getQuantity(): int;
}
