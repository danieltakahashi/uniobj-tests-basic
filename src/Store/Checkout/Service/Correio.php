<?php

declare(strict_types=1);

namespace src\Store\Checkout\Service;

final class Correio implements IService
{
    public function shippingValue(string $postalCode): float
    {
        return 15.22;
    }
}
