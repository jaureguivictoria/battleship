<?php

namespace BattleshipBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="BattleshipBundle\Repository\GameRepository")
 */
class Game
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
     * @var array
     * This impacts on the board form the Player 2
     */
    private $shots_player1 = array();

    /**
     * @var array
     * This impacts on the board form the Player 1
     */
    private $shots_player2 = array();

    /**
     * @var Player
     */
    private $player1;

    /**
     * @var Player
     */
    private $player2;

    /**
     * @var Board
     */
    private $board_player1;

    /**
     * @var Board
     */
    private $board_player2;

    /**
     * @var Player
     */
    private $turn;

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
     * Get the value of Shots Player
     *
     * @return array
     */
    public function getShotsPlayer1()
    {
        return $this->shots_player1;
    }

    /**
     * Set the value of Shots Player
     *
     * @param array shots_player1
     *
     * @return self
     */
    public function setShotsPlayer1(array $shots_player1)
    {
        $this->shots_player1 = $shots_player1;

        return $this;
    }

    /**
     * Get the value of Shots Player
     *
     * @return array
     */
    public function getShotsPlayer2()
    {
        return $this->shots_player2;
    }

    /**
     * Set the value of Shots Player
     *
     * @param array shots_player2
     *
     * @return self
     */
    public function setShotsPlayer2(array $shots_player2)
    {
        $this->shots_player2 = $shots_player2;

        return $this;
    }

    /**
     * Get the value of Player
     *
     * @return Player
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * Set the value of Player
     *
     * @param Player player1
     *
     * @return self
     */
    public function setPlayer1(Player $player1)
    {
        $this->player1 = $player1;

        return $this;
    }

    /**
     * Get the value of Player
     *
     * @return Player
     */
    public function getPlayer2()
    {
        return $this->player2;
    }

    /**
     * Set the value of Player
     *
     * @param Player player2
     *
     * @return self
     */
    public function setPlayer2(Player $player2)
    {
        $this->player2 = $player2;

        return $this;
    }

    /**
     * Get the value of Board Player
     *
     * @return Board
     */
    public function getBoardPlayer1()
    {
        return $this->board_player1;
    }

    /**
     * Set the value of Board Player
     *
     * @param Board board_player1
     *
     * @return self
     */
    public function setBoardPlayer1(Board $board_player1)
    {
        $this->board_player1 = $board_player1;

        return $this;
    }

    /**
     * Get the value of Board Player
     *
     * @return Board
     */
    public function getBoardPlayer2()
    {
        return $this->board_player2;
    }

    /**
     * Set the value of Board Player
     *
     * @param Board board_player2
     *
     * @return self
     */
    public function setBoardPlayer2(Board $board_player2)
    {
        $this->board_player2 = $board_player2;

        return $this;
    }

    public function save(){
        $this->board_player1;
        $this->board_player1;
    }

    /*
    * @param $player player
    */
    public function saveTurn($player){
        $this->turn = $player;
    }

}
