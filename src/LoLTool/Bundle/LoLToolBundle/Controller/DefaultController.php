<?php

namespace LoLTool\Bundle\LoLToolBundle\Controller;

use LoLTool\Bundle\LoLToolBundle\Entity\Player;
use LoLTool\Bundle\LoLToolBundle\Entity\League;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LoLTool\Bundle\LoLToolBundle\Controller\GameController;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

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
            $leagueResponse = $this->getLeagueStatsResponseByPlayerId($playerResponse['id']);
            if (is_array($leagueResponse)) {
                foreach ($leagueResponse as $leagueEntry) {
                    if ($leagueEntry['queueType'] == 'RANKED_TEAM_5x5') {
                        $player->setLeague5v5($this->createLeagueAction($leagueEntry, $player->getLeague5v5()));
                    } else if ($leagueEntry['queueType'] == 'RANKED_TEAM_3x3') {
                        $player->setLeague3v3($this->createLeagueAction($leagueEntry, $player->getLeague3v3()));
                    } else if ($leagueEntry['queueType'] == 'RANKED_SOLO_5x5') {
                        $player->setLeague($this->createLeagueAction($leagueEntry, $player->getLeague()));
                    }
                }
            }

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

        $leagueResponse = $this->getLeagueStatsResponseByPlayerId($playerResponse['id']);

        foreach ($leagueResponse as $leagueEntry) {
            if ($leagueEntry['queueType'] == 'RANKED_TEAM_5x5') {
                $player->setLeague5v5($this->createLeagueAction($leagueEntry));
            } else if ($leagueEntry['queueType'] == 'RANKED_TEAM_3x3') {
                $player->setLeague3v3($this->createLeagueAction($leagueEntry));
            } else if ($leagueEntry['queueType'] == 'RANKED_SOLO_5x5') {
                $player->setLeague($this->createLeagueAction($leagueEntry));
            }
        }

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

        $gameController = new GameController();
        $gameController->setContainer($this->container);

        $gameList = $gameController->getPlayerGames($playerId);

        $response = $this->render('LoLToolBundle:Default:profile.html.twig', array('player' => $player, 'gameList' => $gameList));

        return $response;
    }

    public function getLeagueStatsResponseByPlayerId($playerId)
    {
        $url = 'http://prod.api.pvp.net/api/lol/euw/v2.3/league/by-summoner/' . $playerId  . '/entry?api_key='. $this->container->getParameter('api_key');

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


        return $decodedResponse;
    }

    public function createLeagueAction($leagueResponse, $league = null)
    {

        if (!$league) {
            $league = new League();
        }

        $normalizer = new GetSetMethodNormalizer();
        $encoder = new JsonEncoder();

        $serializer = new Serializer(array($normalizer), array($encoder));
        $leagueResponse['id'] = $league->getId();
        $leagueFromJSON = $serializer->deserialize(json_encode($leagueResponse),'LoLTool\Bundle\LoLToolBundle\Entity\League','json');
        $em = $this->getDoctrine()->getManager();

        $leagueFromJSON = $em->merge($leagueFromJSON);

        $em->flush();

        return $leagueFromJSON;
    }
}
