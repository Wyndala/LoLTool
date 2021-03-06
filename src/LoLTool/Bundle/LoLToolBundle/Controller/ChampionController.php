<?php

namespace LoLTool\Bundle\LoLToolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LoLTool\Bundle\LoLToolBundle\Entity\Champion;
use Application\Sonata\MediaBundle\Entity\Media;

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

        $response = $this->render('LoLToolBundle:Default:index.html.twig', array('response' => 'updated Champion-Data'));

        return $response;
    }

    public function updateChampionAction($championId, $championResponse) {
        $em = $this->getDoctrine()->getManager();
        $champion = $em->getRepository('LoLToolBundle:Champion')->findOneBy(array('championId'=> $championId));

        if (!$champion) {
            $champion = new Champion();
        }

        $champion->setMedia($this->createImage($championResponse['name']));

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

        //Ahri_Square_0

        return 'Created player with id '.$champion->getChampionId();
    }

    /**
     * @param $name
     * @return Media
     */

    public function createImage($name) {
        $kernel = $this->get('kernel');
        $path = $kernel->locateResource('@LoLToolBundle/Resources/public/images/champions/' . $name . '_Square_0.png');

        $mediaManager = $this->get('sonata.media.manager.media');
        $media = new Media;
        $media->setBinaryContent($path);
        $media->setContext('default');
        $media->setProviderName('sonata.media.provider.image');

        $mediaManager->save($media);

        return $media;
    }

}
