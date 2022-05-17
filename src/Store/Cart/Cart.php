<?php

namespace src\Store\Cart;

use src\Store\{
    Product\Product,
    User\User
};

class Cart
{
    /**
     * @var array<Product>
     */
    private array $products = [];

    private User $user;

    /**
     * @param User $user
     * @return bool
     */
    public function setUser(User $user): bool
    {
        $this->user = $user;

        return true;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function addProduct(Product $product): bool
    {
        array_push($this->products, $product);

        return true;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function rmProduct(Product $product): bool
    {
        $key = array_search($product, $this->products);
        if (isset($this->products[$key])) {
            array_splice($this->products, $key, 1);
        }

        return true;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function updateProduct(Product $product): bool
    {
        if ($product->getQuantity() == 0) {
            $this->rmProduct($product);

            return true;
        }

        $key = array_search($product, $this->products);
        if ($key !== false) {
            $this->products[$key] = $product;

            return true;
        }

        return $this->addProduct($product);
    }

    /**
     * @return array<Product>
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @return float
     */
    public function getTotalValue(): float
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getValue() * $product->getQuantity();
        }

        return $total;
    }
}
