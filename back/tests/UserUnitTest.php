<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $user->setEmail('true@toto.com')
            ->setFirstname('toto')
            ->setLastname('toto')
            ->setPassword('toto');
        
        $this->assertTrue($user->getEmail() === 'true@toto.com');
        $this->assertTrue($user->getFirstname() === 'toto');
        $this->assertTrue($user->getLastname() === 'toto');
        $this->assertTrue($user->getPassword() === 'toto');
    }
    public function testIsFalse()
    {
        $user = new User();

        $user->setEmail('true@toto.com')
            ->setFirstname('toto')
            ->setLastname('toto')
            ->setPassword('toto');
        
        $this->assertFalse($user->getEmail() === 'false@toto.com');
        $this->assertFalse($user->getFirstname() === 'fafa');
        $this->assertFalse($user->getLastname() === 'fafa');
        $this->assertFalse($user->getPassword() === 'fafa');
    }

   /*    public function testIsEmpty()
    {
        //@todo
    }
    */ 
}
