<?php

declare(strict_types=1);

namespace src\Store\User;

final class User implements IUser
{
    private string $name;
    private string $postalCode;

    public function __construct(string $name, string $postalCode)
    {
        $this->name = $name;
        $this->postalCode = $postalCode;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPostalCode(): string
    {
        return preg_replace('/\D/', '', $this->postalCode) ?? '';
    }
}
