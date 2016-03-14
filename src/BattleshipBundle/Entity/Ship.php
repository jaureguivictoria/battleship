<?php

namespace BattleshipBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ship
 *
 * @ORM\Table(name="ship")
 * @ORM\Entity(repositoryClass="BattleshipBundle\Repository\ShipRepository")
 */
class Ship
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer")
     */
    private $size;

    /**
     * @var int
     *
     * @ORM\Column(name="pos_x", type="integer")
     */
    private $posX;

    /**
     * @var int
     *
     * @ORM\Column(name="pos_y", type="integer")
     */
    private $posY;

    /**
     * @var bool
     *
     * @ORM\Column(name="horizontal", type="boolean", nullable=true)
     */
    private $horizontal;

    /**
    * @ORM\ManyToOne(targetEntity="Board", inversedBy="ship")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="board_id", referencedColumnName="id")
    * })
     */
    private $board;

    /**
     * @var bool
     *
     * @ORM\Column(name="alive", type="boolean")
     */
    private $alive;

    public function __construct($pos_x, $pos_y, $horizontal){
        $this->setPosX($pos_x);
        $this->setPosY($pos_y);
        $this->setHorizontal($horizontal);
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Ship
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set posX
     *
     * @param integer $posX
     *
     * @return Ship
     */
    public function setPosX($posX)
    {
        $this->posX = $posX;

        return $this;
    }

    /**
     * Get posX
     *
     * @return int
     */
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * Set posY
     *
     * @param integer $posY
     *
     * @return Ship
     */
    public function setPosY($posY)
    {
        $this->posY = $posY;

        return $this;
    }

    /**
     * Get posY
     *
     * @return int
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * Set horizontal
     *
     * @param boolean $horizontal
     *
     * @return Ship
     */
    public function setHorizontal($horizontal)
    {
        $this->horizontal = $horizontal;

        return $this;
    }

    /**
     * Get horizontal
     *
     * @return bool
     */
    public function getHorizontal()
    {
        return $this->horizontal;
    }
    /**
     * Set alive
     *
     * @param boolean $alive
     *
     * @return Ship
     */
    public function setAlive($alive)
    {
        $this->alive = $alive;

        return $this;
    }

    /**
     * Get alive
     *
     * @return bool
     */
    public function getAlive()
    {
        return $this->alive;
    }
}
