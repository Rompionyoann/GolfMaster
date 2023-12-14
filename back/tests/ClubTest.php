<?php

namespace App\Tests;

use App\Entity\Club;
use PHPUnit\Framework\TestCase;

class ClubTest extends TestCase
{
    public function testIsTrue()
    {
        $club = new Club();

        $club->setName('Stjacques')
            ->setAddress('Rue de la paix');

        $this->assertTrue($club->getName() === 'Stjacques');
        $this->assertTrue($club->getAddress() === 'Rue de la paix');
}
    
        public function testIsFalse()
        {
            $club = new Club();
    
            $club->setName('Stjacques')
                ->setAddress('Rue de la paix');
    
            $this->assertFalse($club->getName() === 'Stjacques');
            $this->assertFalse($club->getAddress() === 'Rue de la paix');
        }
    
    /*    public function testIsEmpty()
        {
            //@todo
        }
        */
}
