<?php

namespace BattleshipBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PlayerController extends Controller
{
    /**
     * @Route("/players", name="players_index")
     */
    public function indexAction()
    {
        $players = $this->getDoctrine()
           ->getRepository('BattleshipBundle:Player')
           ->findAll();

        return $this->render('BattleshipBundle:Players:index.html.twig', array(
            'players' => $players
        ));
    }

    /**
     * @Route("/players/new", name="new_player")
     */
    public function createAction()
    {
        return $this->render('BattleshipBundle:Players:edit.html.twig');
    }
}
