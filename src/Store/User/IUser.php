<?php

declare(strict_types=1);

namespace src\Store\User;

interface IUser
{
    public function __construct(string $name, string $postalCode);

    public function getName(): string;

    public function getPostalCode(): string;
}
