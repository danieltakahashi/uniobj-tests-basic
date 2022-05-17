<?php

namespace src\Store\User;

class User
{
    private string $name;
    private string $postalCode;

    /**
     * @param string $name
     * @param string $postalCode
     */
    public function __construct(string $name, string $postalCode)
    {
        $this->name = $name;
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return preg_replace('/\D/', '', $this->postalCode);
    }
}
