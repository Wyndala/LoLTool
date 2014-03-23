<?php

namespace LoLTool\Bundle\LoLToolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LoLTool\Bundle\LoLToolBundle\Entity\Game;
use LoLTool\Bundle\LoLToolBundle\Entity\Champion;
use LoLTool\Bundle\LoLToolBundle\Entity\Statistics;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class GameController extends Controller
{

    public function updateRecentGamesAction($playerId) {
        $recentGames = $this->getRecentGames($playerId);

        foreach ($recentGames as $id => $game) {

            $this->updateGameAction($game['gameId'], $game, $playerId);
        }

        $response = $this->render('LoLToolBundle:Default:index.html.twig', array('response' => 'test'));

        return $response;
    }

    public function updateGameAction($gameId, $gameResponse, $playerId) {
        $em = $this->getDoctrine()->getManager();
        $game = $em->getRepository('LoLToolBundle:Game')->findOneBy(array('gameId'=> $gameId, 'playerId' => $playerId));

        if (!$game) {
            $game = new Game();
            $statistic = $this->updateStatisticsAction($gameResponse['stats'], $playerId);
        } else {
            $statistic = $this->updateStatisticsAction($gameResponse['stats'], $playerId, $game->getStatsId());
        }

        $champion = $em->getRepository('LoLToolBundle:Champion')->findOneBy(array('championId'=> $gameResponse['championId']));

        $spell1 = $em->getRepository('LoLToolBundle:Spell')->findOneBy(array('spellKey'=> $gameResponse['spell1']));
        $spell2 = $em->getRepository('LoLToolBundle:Spell')->findOneBy(array('spellKey'=> $gameResponse['spell2']));

        $game->setGameId($gameResponse['gameId']);
        $game->setInvalid($gameResponse['invalid']);
        $game->setGameMode($gameResponse['gameMode']);
        $game->setGameType($gameResponse['gameType']);
        $game->setSubType($gameResponse['subType']);
        $game->setMapId($gameResponse['mapId']);
        $game->setPlayerId($playerId);
        $game->setTeamId($gameResponse['teamId']);

        $game->setSpell1($spell1);
        $game->setSpell2($spell2);
        $game->setLevel($gameResponse['level']);
        $game->setCreateDate($gameResponse['createDate']);
        $game->setFellowPlayers($gameResponse['fellowPlayers']);

        $game->setChampion($champion);
        $game->setStatistics($statistic);
        $em->persist($game);
        $em->flush();

        return 'Created player with id '.$game->getId();
    }

    public function getRecentGames($playerId) {
        $url = 'http://prod.api.pvp.net/api/lol/euw/v1.3/game/by-summoner/' . $playerId . '/recent?api_key=' . $this->container->getParameter('api_key');

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
        $gamesResponse = array_pop($decodedResponse);

        return $gamesResponse;
    }

    public function updateStatisticsAction($statisticResponse, $playerId, $statisticsId = 0) {
        $em = $this->getDoctrine()->getManager();
        $statistic = $em->getRepository('LoLToolBundle:Statistics')->findOneBy(array('id'=> $statisticsId));

        if (!$statistic) {
            $statistic = new Statistics();
        }

        $normalizer = new GetSetMethodNormalizer();
        $encoder = new JsonEncoder();

        $serializer = new Serializer(array($normalizer), array($encoder));
        $statisticResponse['id'] = $statistic->getId();
        $statisticResponse['playerId'] = $playerId;
        $statisticsFromJSON = $serializer->deserialize(json_encode($statisticResponse),'LoLTool\Bundle\LoLToolBundle\Entity\Statistics','json');
        $em = $this->getDoctrine()->getManager();

        $statisticsFromJSON = $em->merge($statisticsFromJSON);
        $em->flush();

        return $statisticsFromJSON;
    }

    public function listPlayerGamesAction($playerId) {
        $games = $this->getPlayerGames($playerId);

        $response = $this->render('LoLToolBundle:Game:game.html.twig', array('gameList' => $games));

        return $response;
    }

    public function getPlayerGames($playerId) {
        $games = $this->getDoctrine()
            ->getRepository('LoLToolBundle:Game')
            ->findBy(array('playerId' => $playerId), array('createDate' => 'DESC'));
        return $games;
    }

    public function showSingleGameAction($gameId) {
        $game = $this->getDoctrine()
            ->getRepository('LoLToolBundle:Game')
            ->findOneBy(array('gameId' => $gameId));
        $response = $this->render('LoLToolBundle:Game:single_game.html.twig', array('game' => $game));

        return $response;
    }
}
