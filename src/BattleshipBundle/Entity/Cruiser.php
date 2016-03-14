<?php

namespace BattleshipBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cruiser
 */
class Cruiser
{
    public function __construct($pos_x, $pos_y, $horizontal){
        $this->size = 3;
        parent::__construct($pos_x, $pos_y, $horizontal);
    }
}
