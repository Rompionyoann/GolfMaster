<?php

namespace App\Tests;

use App\Entity\Counting;
use PHPUnit\Framework\TestCase;

class CountingTest extends TestCase
{
    public function testIsTrue()
    {
        $counting = new Counting();

        $counting->setShots(5);

        $this->assertTrue($counting->getShots() === 5);
    }
    
    public function testIsFalse()
    {
        $counting = new Counting();

        $counting->setShots(5);

        $this->assertFalse($counting->getShots() === 4);
    }

    /*    public function testIsEmpty()
        {
            //@todo
        }
        */
}
