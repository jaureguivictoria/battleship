<?php

namespace BattleshipBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Board
 *
 * @ORM\Table(name="board")
 * @ORM\Entity(repositoryClass="BattleshipBundle\Repository\BoardRepository")
 */
class Board
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
     *
     * @ORM\Column(name="grid", type="array")
     */
    private $grid;

    private $grid_size = 9;

   /**
    * @OneToMany(targetEntity="Ship", mappedBy="board")
    */
    private $ships;

   /**
    * @OneToMany(targetEntity="Shot", mappedBy="board")
    */
    private $shots;


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
     * Set grid
     *
     * @param array $grid
     *
     * @return Board
     */
    public function setGrid($grid)
    {
        $this->grid = $grid;

        return $this;
    }

    /**
     * Get grid
     *
     * @return array
     */
    public function getGrid()
    {
        return $this->grid;
    }

    /**
     * Set ships
     *
     * @param Ship $ships
     *
     * @return Board
     */
    public function setShips($ships)
    {
        $this->ships = $ships;

        return $this;
    }
    /**
     * Set shot
     *
     * @param Shot $shot
     *
     * @return Board
     */
    public function setShot($shot)
    {
        $this->shots[] = $shot;

        return $this;
    }

    /**
     * Get ships
     *
     * @return Ship
     */
    public function getShips()
    {
        return $this->ships;
    }

    /*
    * @param size integer
    */
    public function generateGrid(){
        $this->grid = $this->initiallize();

        $this->populateGridWithShips();
        $this->populateGridWithShots();
    }

    // Sets all the grid with the letter W, that stands for water
    private function initiallize(){
        $this->grid = array();

        for($pos_x = 0; $pos_x < $this->grid_size; $pos_x++){

            for($pos_y = 0; $pos_y < $this->grid_size; $pos_y++) {
                $this->grid[ $pos_x ][ $pos_y ] = 'W';
            }
        }
    }

    private function populateGridWithShips(){
        foreach ($this->ships as $ship) {

            if($ship->getHorizontal()){
                for($pos_x = $ship->getPosX(); $pos_x < $ship->getSize(); $pos_x++){
                    // S stands for ship
                    $this->grid[ $pos_x ][ $ship->getPosY() ] = 'S';
                }
            } else {
                for($pos_y = $ship->getPosY(); $pos_y < $ship->getSize(); $pos_y++){
                    // S stands for ship
                    $this->grid[ $ship->getPosX() ][ $pos_y ] = 'S';
                }
            }
        }
    }

    private function populateGridWithShots(){
        foreach ($this->shots as $shot) {
            $shot_position = $this->grid[ $shot->getPosX ][ $shot->getPosY() ];
            if($shot_position == 'W'){
                // Missed shot
                $shot_position = 'M';
            } elseif($shot_position == 'S'){
                // There is a ship there, sink it!
                $this->sinkAt($shot);
            }
        }
    }

    /*
    * Checks if the shot is hitting a ship or water, cannot shoot at missed shot places
    * @param pos_x integer
    * @param pos_y integer
    * @return $valid boolean
    */
    public function isShotValid($pos_x, $pos_y){
        $valid = false;
        $grid = $this->generateGrid();

        if(isset( $grid[ $pos_x, $pos_y ] )){
             if($grid[ $pos_x, $pos_y ] == 'W' || $grid[ $pos_x, $pos_y ] == 'S'){
                 $valid = true;
             }
        }

        return $valid;
    }

    public function sinkAt($shot){
        $shot_x = $shot->getPosX();
        $shot_y = $shot->getPosY();
        $sinked = false;

        $i = 0;
        $total_ships = size($this->ships);

        // Find ship and sink it
        while(!$sinked && $i< $total_ships){
            $ship = $this->ships[$i];
            $ship_x = $ship->getPosX();
            $ship_y = $ship->getPosY();
            $ship_size = $ship->getSize();

            if($ship_x == $shot_x){

                // Calculate y end axes
                if(!$ship->getHorizontal()){
                    $ship_y_end = $ship_y + $ship_size-1;
                }

                if($ship_y >= $shot_y && $ship_y_end <= $shot_y){
                    $sinked = true;
                    // Mark ship as sinked
                    for($y = $ship_y; $y <= $ship_y_end; $i++){
                        $this->grid[$shot_x][$y] = 'X';
                    }
                }

            } elseif($ship_y == $shot_y){
                // Calculate x end axes
                if($ship->getHorizontal()){
                    $ship_x_end = $ship_x + $ship_size-1;
                }

                if($ship_x >= $shot_x && $ship_x_end <= $shot_x){
                    $sinked = true;
                    // Mark ship as sinked
                    for($x = $ship_x; $x <= $ship_x_end; $i++){
                        $this->grid[$x][$shot_y] = 'X';
                    }
                }
            }

            $i++;

        }
    }
}
