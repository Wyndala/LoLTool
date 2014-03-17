<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 11.03.14
 * Time: 13:50
 */

namespace LoLTool\Bundle\LoLToolBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class PlayerAdmin extends Admin {
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Name'))
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        if ($this->nameExists($object->getName())) {
            $errorElement->with('name')->addViolation('Player exists!')->end();
        }
    }



    public function prePersist($object) {
        $playerResponse = $this->getPlayerResponseByName($object->getName());

        $object = $this->populatePlayerObject($object, $playerResponse);
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
        ;
    }

    protected function nameExists($name) {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();
        $player = $em->getRepository('LoLToolBundle:Player')->findOneBy(array('name'=> $name));

        if ($player) {
            return true;
        }
        return false;
    }

    public function populatePlayerObject($playerObject, $playerResponse)
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();
        $player = $em->getRepository('LoLToolBundle:Player')->findOneBy(array('name'=> $playerObject->getName()));

        if (!$player) {
            $playerObject->setName($playerResponse['name']);
            $playerObject->setPlayerId($playerResponse['id']);
            $playerObject->setSummonerIconId($playerResponse['profileIconId']);
            $playerObject->setSummonerLevel($playerResponse['summonerLevel']);
        } else {
            $playerObject->setName($playerResponse['name']);
            $playerObject->setPlayerId($playerResponse['id']);
            $playerObject->setSummonerIconId($playerResponse['profileIconId']);
            $playerObject->setSummonerLevel($playerResponse['summonerLevel']);
        }

        return $playerObject;
    }

    public function getPlayerResponseByName($name)
    {
        $url = 'http://prod.api.pvp.net/api/lol/euw/v1.3/summoner/by-name/' . $name . '?api_key='. $this->getConfigurationPool()->getContainer()->getParameter('api_key');

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

        return $playerResponse;
    }

    public function getLeagueStatsResponseByPlayerId($playerId)
    {
        $url = 'https://prod.api.pvp.net/api/lol/euw/v2.3/league/by-summoner/' . $playerId  . '/entry?api_key='. $this->getConfigurationPool()->getContainer()->getParameter('api_key');

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

        return $playerResponse;
    }
} 