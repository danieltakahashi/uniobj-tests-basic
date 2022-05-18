<?php

declare(strict_types=1);

namespace src\Store\Cart;

use src\Store\Product\Product;
use src\Store\User\IUser;

interface ICart
{
    public function __construct(IUser $user);

    public function getUser(): IUser;

    public function addProduct(Product $product): bool;

    public function rmProduct(Product $product): bool;

    public function updateProduct(Product $product): bool;

    /**
     * @return array<int, Product>
     */
    public function getProducts(): array;

    public function getTotalValue(): float;
}
