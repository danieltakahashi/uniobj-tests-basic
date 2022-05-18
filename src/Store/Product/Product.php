<?php

declare(strict_types=1);

namespace src\Store\Product;

final class Product implements IProduct
{
    private string $name;
    private float $value;
    private int $quantity;

    public function __construct(string $name, float $value, int $quantity)
    {
        $this->name = $name;
        $this->value = $value;
        $this->quantity = $quantity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
