<?php

namespace LoLTool\Bundle\LoLToolBundle\Controller;

use LoLTool\Bundle\LoLToolBundle\Entity\Spell;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class SpellController extends Controller
{
    public function createSpellAction()
    {
        $url = 'http://prod.api.pvp.net/api/lol/static-data/euw/v1/summoner-spell?spellData=image,key&api_key=' . $this->container->getParameter('api_key');

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
        $spellResponse = array_pop($decodedResponse);

        foreach ($spellResponse as $spell) {
            $this->createOrUpdateSpell($spell['key'], $spell);
        }

        $response = $this->render('LoLToolBundle:Default:index.html.twig', array('response' => 'Yeah'));
        return $response;
    }

    public function createOrUpdateSpell($spellKey, $spellResp) {
        $em = $this->getDoctrine()->getManager();
        $spell = $em->getRepository('LoLToolBundle:Spell')->findOneBy(array('spellKey'=> $spellKey));

        if (!$spell) {
            $spell = new Spell();
        }

        $normalizer = new GetSetMethodNormalizer();
        $encoder = new JsonEncoder();
        $spellResp['spellKey'] = $spellResp['key'];
        $serializer = new Serializer(array($normalizer), array($encoder));
        $spellFromJSON = $serializer->deserialize(json_encode($spellResp),'LoLTool\Bundle\LoLToolBundle\Entity\Spell','json');

        $spellFromJSON = $em->merge($spellFromJSON);

        $em->flush();
    }

}
