<?php

namespace LoLTool\Bundle\LoLToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 */
class Player
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $playerId;

    /**
     * @var integer
     */
    private $summonerIconId;

    /**
     * @var integer
     */
    private $summonerLevel;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Player
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set playerId
     *
     * @param integer $playerId
     * @return Player
     */
    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;

        return $this;
    }

    /**
     * Get playerId
     *
     * @return integer 
     */
    public function getPlayerId()
    {
        return $this->playerId;
    }

    /**
     * Set summonerIconId
     *
     * @param integer $summonerIconId
     * @return Player
     */
    public function setSummonerIconId($summonerIconId)
    {
        $this->summonerIconId = $summonerIconId;

        return $this;
    }

    /**
     * Get summonerIconId
     *
     * @return integer 
     */
    public function getSummonerIconId()
    {
        return $this->summonerIconId;
    }

    /**
     * Set summonerLevel
     *
     * @param integer $summonerLevel
     * @return Player
     */
    public function setSummonerLevel($summonerLevel)
    {
        $this->summonerLevel = $summonerLevel;

        return $this;
    }

    /**
     * Get summonerLevel
     *
     * @return integer 
     */
    public function getSummonerLevel()
    {
        return $this->summonerLevel;
    }
}
