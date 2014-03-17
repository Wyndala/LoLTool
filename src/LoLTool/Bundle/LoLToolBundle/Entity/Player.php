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
     * @var \LoLTool\Bundle\LoLToolBundle\Entity\League
     */
    private $league;

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

    /**
     * Set league
     *
     * @param \LoLTool\Bundle\LoLToolBundle\Entity\League $league
     * @return Player
     */
    public function setLeague(\LoLTool\Bundle\LoLToolBundle\Entity\League $league = null)
    {
        $this->league = $league;

        return $this;
    }

    /**
     * Get league
     *
     * @return \LoLTool\Bundle\LoLToolBundle\Entity\League 
     */
    public function getLeague()
    {
        return $this->league;
    }
    /**
     * @var \LoLTool\Bundle\LoLToolBundle\Entity\League
     */
    private $league_3v3;

    /**
     * @var \LoLTool\Bundle\LoLToolBundle\Entity\League
     */
    private $league_5v5;


    /**
     * Set league_3v3
     *
     * @param \LoLTool\Bundle\LoLToolBundle\Entity\League $league3v3
     * @return Player
     */
    public function setLeague3v3(\LoLTool\Bundle\LoLToolBundle\Entity\League $league3v3 = null)
    {
        $this->league_3v3 = $league3v3;

        return $this;
    }

    /**
     * Get league_3v3
     *
     * @return \LoLTool\Bundle\LoLToolBundle\Entity\League 
     */
    public function getLeague3v3()
    {
        return $this->league_3v3;
    }

    /**
     * Set league_5v5
     *
     * @param \LoLTool\Bundle\LoLToolBundle\Entity\League $league5v5
     * @return Player
     */
    public function setLeague5v5(\LoLTool\Bundle\LoLToolBundle\Entity\League $league5v5 = null)
    {
        $this->league_5v5 = $league5v5;

        return $this;
    }

    /**
     * Get league_5v5
     *
     * @return \LoLTool\Bundle\LoLToolBundle\Entity\League 
     */
    public function getLeague5v5()
    {
        return $this->league_5v5;
    }
}
