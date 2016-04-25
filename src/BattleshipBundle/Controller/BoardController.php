<?php

namespace BattleshipBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BoardController extends Controller
{
    /**
     * @Route("/games/{id}", name="showBoard")
     */
    public function showBoardAction($id){
        $game = $this->getDoctrine()
                    ->getRepository('BattleshipBundle:Game')
                    ->findBy(array('player'.$id => $id ));

        $board = ($id == 1) ? $game->getBoardPlayer1() : $game->getBoardPlayer2();

        $player = ($id == 1) ? $game->getPlayer1() : $game->getPlayer2();

        $grid = $board->generateGrid();

        return $this->render('BattleshipBundle:Board:show_board.html.twig', array(
            'player' => $player,
            'grid' => $grid,
            'grid_size' => size($grid)
        ));
    }


    /**
     * @Route("/shot/{id}", name="shot")
     */
    public function shotAction($id){
        $em = $this->getDoctrine()->getEntityManager();

        // Ajax
        if ($request->isXmlHttpRequest ()) {

            $game = $this->getDoctrine()
                        ->getRepository('BattleshipBundle:Game')
                        ->findBy(array('player'.$id => $id ));

            $board = ($id == 1) ? $game->getBoardPlayer1() : $game->getBoardPlayer2();

            if($board->isShotValid($pos_x, $pos_y)){

                $shot = new Shot($pos_x, $pos_y);
                $shot->setBoard($board);

                $board->setShot($shot);

                $grid = $board->getGrid();

                $json = array(
                    "data" => array(
                        'player' => $player,
                        'grid' => $grid,
                        'grid_size' => size($grid)
                    )
                );

                $em->persist($shot);
                $em->persist($board);
                $em->flush();

            } else {
                // Missed shot
                $json = array (
                    "data" => array (
                        "error" => "Not permitted, not a valid movement"
                    )
                );
            }
        }

        $json = array (
            "data" => array (
                "responseCode" => 400,
                "error" => "Not permitted, only ajax request"
            )
        );

        return $this->render ( 'BattleshipBundle:Base:base.json.twig', $json );

    }

}
