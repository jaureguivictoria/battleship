<?php

namespace BattleshipBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AircraftCarrier
 */
class AircraftCarrier extends Ship
{
    public function __construct($pos_x, $pos_y, $horizontal){
        $this->size = 5;
        parent::__construct($pos_x, $pos_y, $horizontal);
    }
}
