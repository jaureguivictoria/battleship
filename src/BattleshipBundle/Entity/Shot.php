<?php

namespace BattleshipBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shot
 *
 * @ORM\Table(name="shot")
 * @ORM\Entity(repositoryClass="BattleshipBundle\Repository\ShotRepository")
 */
class Shot
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
    * @ORM\ManyToOne(targetEntity="Board", inversedBy="shot")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="board_id", referencedColumnName="id")
    * })
     */
    private $board;

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
     * Set posX
     *
     * @param integer $posX
     *
     * @return Shot
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
     * @return Shot
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
}
