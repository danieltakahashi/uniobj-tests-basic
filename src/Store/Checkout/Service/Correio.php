<?php

namespace src\Store\Checkout\Service;

class Correio implements IService
{
    /**
     * @param string $postalCode
     * @return float
     */
    public function shippingValue(string $postalCode): float
    {
        return 15.22;
    }
}
