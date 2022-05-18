<?php

declare(strict_types=1);

namespace src\Store\Checkout\Service;

interface IService
{
    public function shippingValue(string $postalCode): float;
}
