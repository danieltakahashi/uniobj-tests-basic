<?php

declare(strict_types=1);

namespace src\Store\Checkout;

use src\Store\Cart\ICart;
use src\Store\Checkout\Service\IService;

final class Checkout implements ICheckout
{
    public const FREE_SHIPPING_VALUE = 100.00;

    private ICart $cart;
    private IService $service;

    public function __construct(ICart $cart, IService $service)
    {
        $this->cart = $cart;
        $this->service = $service;
    }

    public function isFreeShipping(): bool
    {
        return $this->cart->getTotalValue() >= self::FREE_SHIPPING_VALUE;
    }

    public function shippingValue(): float
    {
        if ($this->isFreeShipping()) {
            return 0.00;
        }

        $postalCode = $this->cart->getUser()->getPostalCode();

        return $this->service->shippingValue($postalCode);
    }

    public function getTotalValue(): float
    {
        return $this->cart->getTotalValue() + $this->shippingValue();
    }
}
