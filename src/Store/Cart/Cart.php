<?php

declare(strict_types=1);

namespace src\Store\Cart;

use src\Store\Product\IProduct;
use src\Store\User\IUser;

final class Cart implements ICart
{
    /**
     * @var array<int, IProduct>
     */
    private array $products = [];

    private IUser $user;

    public function __construct(IUser $user)
    {
        $this->user = $user;
    }

    public function getUser(): IUser
    {
        return $this->user;
    }

    public function addProduct(IProduct $product): bool
    {
        array_push($this->products, $product);

        return true;
    }

    public function rmProduct(IProduct $product): bool
    {
        $key = array_search($product, $this->products);
        if ($key !== false) {
            array_splice($this->products, $key);
        }

        return true;
    }

    public function updateProduct(IProduct $product): bool
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
     * @return array<int, IProduct>
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
