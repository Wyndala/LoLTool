<?php

namespace LoLTool\Bundle\LoLToolBundle\Controller;

use LoLTool\Bundle\LoLToolBundle\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction() {
        $response = $this->render('LoLToolBundle:Default:list.html.twig', array('playerList' => $this->getPlayerListAction()));

        return $response;
    }

    public function getPlayerListAction() {
        $players = $this->getDoctrine()
            ->getRepository('LoLToolBundle:Player')
            ->findAll();

        if (!$players) {
            throw $this->createNotFoundException(
                'No players found'
            );
        }

        return $players;
    }

    public function singlePlayerAction($playerId) {
        $player = $this->getDoctrine()
            ->getRepository('LoLToolBundle:Player')
            ->findOneBy(array('playerId' => $playerId));

        $response = $this->render('LoLToolBundle:Default:profile.html.twig', array('player' => $player));

        return $response;
    }
}
