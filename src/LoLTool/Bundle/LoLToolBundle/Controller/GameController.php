<?php

namespace LoLTool\Bundle\LoLToolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LoLTool\Bundle\LoLToolBundle\Entity\Game;
use LoLTool\Bundle\LoLToolBundle\Entity\Champion;
use LoLTool\Bundle\LoLToolBundle\Entity\Statistics;

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
        var_dump($gameResponse['championId']);
        $game->setGameId($gameResponse['gameId']);
        $game->setInvalid($gameResponse['invalid']);
        $game->setGameMode($gameResponse['gameMode']);
        $game->setGameType($gameResponse['gameType']);
        $game->setSubType($gameResponse['subType']);
        $game->setMapId($gameResponse['mapId']);
        $game->setPlayerId($playerId);
        $game->setTeamId($gameResponse['teamId']);
        $game->setChampion($champion);
        $game->setSpell1($gameResponse['spell1']);
        $game->setSpell2($gameResponse['spell2']);
        $game->setLevel($gameResponse['level']);
        $game->setCreateDate($gameResponse['createDate']);
        $game->setFellowPlayers($gameResponse['fellowPlayers']);

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

        $statistic->setPlayerId($playerId);

        $statistic->setTotalDamageDealtToChampions($statisticResponse['totalDamageDealtToChampions']);
        $statistic->setGoldEarned($statisticResponse['goldEarned']);

        if (isset($statisticResponse['item0'])) {
            $statistic->setItem0($statisticResponse['item0']);
        } else {
            $statistic->setItem0();
        }
        if (isset($statisticResponse['item1'])) {
            $statistic->setItem1($statisticResponse['item1']);
        } else {
            $statistic->setItem1();
        }
        if (isset($statisticResponse['item2'])) {
            $statistic->setItem2($statisticResponse['item2']);
        } else {
            $statistic->setItem2();
        }
        if (isset($statisticResponse['item3'])) {
            $statistic->setItem3($statisticResponse['item3']);
        } else {
            $statistic->setItem3();
        }
        if (isset($statisticResponse['item4'])) {
            $statistic->setItem4($statisticResponse['item4']);
        } else {
            $statistic->setItem4();
        }
        if (isset($statisticResponse['item6'])) {
            $statistic->setItem6($statisticResponse['item6']);
        } else {
            $statistic->setItem6();
        }
        if (isset($statisticResponse['item6'])) {
            $statistic->setItem6($statisticResponse['item6']);
        } else {
            $statistic->setItem6();
        }

        if (isset($statisticResponse['wardPlaced'])) {
            $statistic->setWardPlaced($statisticResponse['wardPlaced']);
        } else {
            $statistic->setWardPlaced(0);
        }

        $statistic->setTotalDamageTaken($statisticResponse['totalDamageTaken']);

        if (isset($statisticResponse['trueDamageDealtPlayer'])) {
            $statistic->setTrueDamageDealtPlayer($statisticResponse['trueDamageDealtPlayer']);
        } else {
            $statistic->setTrueDamageDealtPlayer(0);
        }

        $statistic->setPhysicaldamageDealtPlayer($statisticResponse['physicalDamageDealtPlayer']);

        if (isset($statisticResponse['trueDamageDealtToChampions'])) {
            $statistic->setTrueDamageDealtToChampions($statisticResponse['trueDamageDealtToChampions']);
        } else {
            $statistic->setTrueDamageDealtToChampions(0);
        }

        if (isset($statisticResponse['totalUnitsHealed'])) {
            $statistic->setTotalUnitsHealed($statisticResponse['totalUnitsHealed']);
        } else {
            $statistic->setTotalUnitsHealed(0);
        }

        if (isset($statisticResponse['largestCriticalStrike'])) {
            $statistic->setLargestCriticalStrike($statisticResponse['largestCriticalStrike']);
        } else {
            $statistic->setLargestCriticalStrike(0);
        }

        $statistic->setLevel($statisticResponse['level']);
        if (isset($statisticResponse['neutralMinionsKilledYourJungle'])) {
            $statistic->setNeutralMinionsKilledYourJungle($statisticResponse['neutralMinionsKilledYourJungle']);
        } else {
            $statistic->setNeutralMinionsKilledYourJungle(0);
        }

        if (isset($statisticResponse['magicDamageDealtToChampions'])) {
            $statistic->setMagicDamageDealtToChampions($statisticResponse['magicDamageDealtToChampions']);
        } else {
            $statistic->setMagicDamageDealtToChampions(0);
        }

        if (isset($statisticResponse['turretsKilled'])) {
            $statistic->setTurretsKilled($statisticResponse['turretsKilled']);
        } else {
            $statistic->setTurretsKilled(0);
        }

        if (isset($statisticResponse['magicDamageDealtPlayer'])) {
            $statistic->setMagicDamageDealtPlayer($statisticResponse['magicDamageDealtPlayer']);
        } else {
            $statistic->setMagicDamageDealtPlayer(0);
        }

        if (isset($statisticResponse['assists'])) {
            $statistic->setAssists($statisticResponse['assists']);
        } else {
            $statistic->setAssists(0);
        }

        $statistic->setMagicDamageTaken($statisticResponse['magicDamageTaken']);

        if (isset($statisticResponse['numDeaths'])) {
            $statistic->setNumDeaths($statisticResponse['numDeaths']);
        } else {
            $statistic->setNumDeaths(0);
        }

        if (isset($statisticResponse['totalTimeCrowdControlDealt'])) {
            $statistic->setTotalTimeCrowdControlDealt($statisticResponse['totalTimeCrowdControlDealt']);
        } else {
            $statistic->setTotalTimeCrowdControlDealt(0);
        }

        if (isset($statisticResponse['largestMultiKill'])) {
            $statistic->setLargestMultiKill($statisticResponse['largestMultiKill']);
        } else {
            $statistic->setLargestMultiKill(0);
        }

        $statistic->setPhysicalDamageTaken($statisticResponse['physicalDamageTaken']);
        $statistic->setWin($statisticResponse['win']);
        $statistic->setTeam($statisticResponse['team']);
        $statistic->setTotalDamageDealt($statisticResponse['totalDamageDealt']);
        if (isset($statisticResponse['totalHeal'])) {
            $statistic->setTotalHeal($statisticResponse['totalHeal']);
        } else {
            $statistic->setTotalHeal(0);
        }

        if (isset($statisticResponse['minionsKilled'])) {
            $statistic->setMinionsKilled($statisticResponse['minionsKilled']);
        } else {
            $statistic->setMinionsKilled(0);
        }

        $statistic->setTimePlayed($statisticResponse['timePlayed']);
        $statistic->setPhysicalDamageDealtToChampions($statisticResponse['physicalDamageDealtToChampions']);

        if (isset($statisticResponse['championsKilled'])) {
            $statistic->setChampionsKilled($statisticResponse['championsKilled']);
        } else {
            $statistic->setChampionsKilled(0);
        }

        if (isset($statisticResponse['trueDamageTaken'])) {
            $statistic->setTrueDamageTaken($statisticResponse['trueDamageTaken']);
        } else {
            $statistic->setTrueDamageTaken(0);
        }

        if (isset($statisticResponse['neutralMinionsKilled'])) {
            $statistic->setNeutralMinionsKilled($statisticResponse['neutralMinionsKilled']);
        } else {
            $statistic->setNeutralMinionsKilled(0);
        }

        $statistic->setGoldSpent($statisticResponse['goldSpent']);

        $em->persist($statistic);
        $em->flush();

        return $statistic;
    }

    public function listPlayerGamesAction($playerId) {
        $games = $this->getDoctrine()
            ->getRepository('LoLToolBundle:Game')
            ->findBy(array('playerId' => $playerId), array('createDate' => 'DESC'));
        //var_dump($games[3]->getStatistics()->getWin());
        $response = $this->render('LoLToolBundle:Game:game.html.twig', array('gameList' => $games));

        return $response;
    }
}
