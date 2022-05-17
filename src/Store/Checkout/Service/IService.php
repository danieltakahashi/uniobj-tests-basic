<?php

namespace src\Store\Checkout\Service;

interface IService
{
    /**
     * @param string $postalCode
     * @return float
     */
    public function shippingValue(string $postalCode): float;
}
