<?php

namespace BattleshipBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use BattleshipBundle\Entity\Cruiser;
use BattleshipBundle\Entity\Battleship;
use BattleshipBundle\Entity\Submarine;
use BattleshipBundle\Entity\Destroyer;
use BattleshipBundle\Entity\AircraftCarrier;
use BattleshipBundle\Entity\Game;
use BattleshipBundle\Entity\Board;
use BattleshipBundle\Entity\Player;

class GameController extends Controller
{
    /**
     * @Route("/start")
     */
    public function startAction()
    {
        $game = new Game();

        $this->createPlayers();
        $player1 = $this->getDoctrine()
                    ->getRepository('BattleshipBundle:Player')
                    ->find(1);
        $player2 = $this->getDoctrine()
                    ->getRepository('BattleshipBundle:Player')
                    ->find(2);

        $game->setPlayer1($player1);
        $game->setPlayer1($player2);

        $board1 = new Board();
        $board2 = new Board();
        $game->setBoardPlayer1($board1);
        $game->setBoardPlayer2($board2);

        // Create default player boards
        $ships_player1 = array(
            // Pos x, Pos y, horizontal
            new AircraftCarrier(9, 3, false),
            new Battleship(1, 0, true),
            new Cruiser(4, 2, true),
            new Destroyer(4, 6, true),
            new Submarine(1, 6)
        );

        $ships_player2 = array(
            // Pos x, Pos y, horizontal
            new AircraftCarrier(1, 2, true),
            new Battleship(2, 5, false),
            new Cruiser(6, 5, false),
            new Destroyer(8, 1, false),
            new Submarine(9, 7)
        );

        $board1->setShips($ships_player1);
        $board2->setShips($ships_player2);

        $game->setTurn($player1);

        $this->saveGame($game);


        return $this->render('BattleshipBundle:Game:start.html.twig', array(
            // ...
        ));
    }

    private function saveGame($game){
        $em = $this->getDoctrine()->getEntityManager();

        $em->persist($game->getBoardPlayer1());

        $em->persist($game->getBoardPlayer2());

        $em->persist($game);

        $em->flush();
    }

    public function createPlayers(){
        $em = $this->getDoctrine()->getEntityManager();

        $player1 = new Player();
        $player1->setName('Sawyer');
        $em->persist($player1);

        $player2 = new Player();
        $player2->setName('John');
        $em->persist($player2);

        $em->flush();
    }


}
