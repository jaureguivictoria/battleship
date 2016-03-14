<?php

namespace BattleshipBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Submarine
 */
class Submarine extends Ship
{
    public function __construct($pos_x, $pos_y){
        $this->size = 1;
        parent::__construct($pos_x, $pos_y, null);
    }
}
