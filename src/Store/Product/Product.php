<?php

namespace src\Store\Product;

class Product
{
    private string $name;
    private float $value;
    private int $quantity;

    /**
     * @param string $name
     * @param float $value
     * @param int $quantity
     */
    public function __construct(string $name, float $value, int $quantity)
    {
        $this->name = $name;
        $this->value = $value;
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
