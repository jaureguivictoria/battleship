<?php

namespace BattleshipBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Battleship
 *
 */
class Battleship extends Ship
{
    public function __construct($pos_x, $pos_y, $horizontal){
        $this->size = 4;
        parent::__construct($pos_x, $pos_y, $horizontal);
    }
}
