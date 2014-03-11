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

    public function updatePlayerAction($name)
    {
        $url = 'http://prod.api.pvp.net/api/lol/euw/v1.3/summoner/by-name/' . $name . '?api_key=' . $this->container->getParameter('api_key');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));

        $resp = curl_exec($curl);

        if(!curl_exec($curl)){
            die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
        }

        curl_close($curl);

        $decodedResponse = json_decode($resp, true);
        $playerResponse = array_pop($decodedResponse);

        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('LoLToolBundle:Player')->findOneBy(array('name'=> $name));

        if (!$player) {
            $answer = $this->createAction($playerResponse);
        } else {
            $player->setName($playerResponse['name']);
            $player->setPlayerId($playerResponse['id']);
            $player->setSummonerIconId($playerResponse['profileIconId']);
            $player->setSummonerLevel($playerResponse['summonerLevel']);

            $em->flush();
            $answer = 'Player ' . $playerResponse['id'] . ' updated!';
        }

        $response = $this->render('LoLToolBundle:Default:index.html.twig', array('response' => $answer));

        return $response;
    }

    public function createAction($playerResponse)
    {
        $player = new Player();
        $player->setName($playerResponse['name']);
        $player->setPlayerId($playerResponse['id']);
        $player->setSummonerIconId($playerResponse['profileIconId']);
        $player->setSummonerLevel($playerResponse['summonerLevel']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($player);
        $em->flush();

        return 'Created player with id '.$player->getId();
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
