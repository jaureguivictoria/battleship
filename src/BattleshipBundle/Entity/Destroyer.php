<?php

namespace BattleshipBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Destroyer
 */
class Destroyer extends Ship
{
    public function __construct($pos_x, $pos_y, $horizontal){
        $this->size = 2;
        parent::__construct($pos_x, $pos_y, $horizontal);
    }
}
