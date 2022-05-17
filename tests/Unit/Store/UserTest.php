<?php

namespace tests\Unit\Store;

use PHPUnit\Framework\TestCase;
use src\Store\User\User;

class UserTest extends TestCase
{
    /**
     * @return void
     */
    public function testUserGetName(): void
    {
        $user = new User('Daniel Takahashi', '86040-640');

        $this->assertEquals('Daniel Takahashi', $user->getName());
        $this->assertEquals(86040640, $user->getPostalCode());
    }

    /**
     * @return void
     */
    public function testUserGetPostalCode(): void
    {
        $user = new User('Daniel Takahashi', '86040-640sdfs!!');

        $this->assertEquals(86040640, $user->getPostalCode());
    }
}
