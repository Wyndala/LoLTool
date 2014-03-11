<?php

namespace LoLTool\Bundle\LoLToolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LoLTool\Bundle\LoLToolBundle\Entity\Champion;

class ChampionController extends Controller
{
    public function updateChampionDataAction()
    {
        $url = 'http://prod.api.pvp.net//api/lol/euw/v1.1/champion?api_key=' . $this->container->getParameter('api_key');

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
        $championsResponse = array_pop($decodedResponse);

        foreach ($championsResponse as $champion) {
            $this->updateChampionAction($champion['id'], $champion);
        }

        return new Response('Created player with id ');
    }

    public function updateChampionAction($championId, $championResponse) {
        $em = $this->getDoctrine()->getManager();
        $champion = $em->getRepository('LoLToolBundle:Champion')->findOneBy(array('championId'=> $championId));

        if (!$champion) {
            $champion = new Champion();
        }

        $champion->setChampionId($championResponse['id']);
        $champion->setName($championResponse['name']);
        $champion->setActive($championResponse['active']);
        $champion->setAttackRank($championResponse['attackRank']);
        $champion->setDefenseRank($championResponse['defenseRank']);
        $champion->setMagicRank($championResponse['magicRank']);
        $champion->setDifficultyRank($championResponse['difficultyRank']);
        $champion->setBotEnabled($championResponse['botEnabled']);
        $champion->setFreeToPlay($championResponse['freeToPlay']);
        $champion->setBotMmEnabled($championResponse['botMmEnabled']);
        $champion->setRankedPlayEnabled($championResponse['rankedPlayEnabled']);
        $em->persist($champion);
        $em->flush();

        return 'Created player with id '.$champion->getChampionId();
    }

}
