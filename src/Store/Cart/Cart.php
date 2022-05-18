<?php

declare(strict_types=1);

namespace src\Store\Cart;

use src\Store\{
    Product\Product,
    User\User
};

class Cart
{
    /**
     * @var array<int, Product>
     */
    private array $products = [];

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function addProduct(Product $product): bool
    {
        array_push($this->products, $product);

        return true;
    }

    public function rmProduct(Product $product): bool
    {
        $key = array_search($product, $this->products);
        if (isset($this->products[$key])) {
            array_splice($this->products, $key);
        }

        return true;
    }

    public function updateProduct(Product $product): bool
    {
        if ($product->getQuantity() === 0) {
            return $this->rmProduct($product);
        }

        $key = array_search($product, $this->products);
        if ($key !== false) {
            $this->products[$key] = $product;

            return true;
        }

        return $this->addProduct($product);
    }

    /**
     * @return array<int, Product>
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function getTotalValue(): float
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getValue() * $product->getQuantity();
        }

        return $total;
    }
}
