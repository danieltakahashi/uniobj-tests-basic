<?php

declare(strict_types=1);

namespace src\Store\Checkout;

use src\Store\Cart\ICart;
use src\Store\Checkout\Service\IService;

interface ICheckout
{
    public function __construct(ICart $cart, IService $service);

    public function isFreeShipping(): bool;

    public function shippingValue(): float;

    public function getTotalValue(): float;
}
