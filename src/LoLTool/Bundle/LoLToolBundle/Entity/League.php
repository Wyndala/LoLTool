<?php

namespace LoLTool\Bundle\LoLToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * League
 */
class League
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $isHotStreak;

    /**
     * @var boolean
     */
    private $isFreshBlood;

    /**
     * @var string
     */
    private $leagueName;

    /**
     * @var boolean
     */
    private $isVeteran;

    /**
     * @var string
     */
    private $tier;

    /**
     * @var integer
     */
    private $lastPlayed;

    /**
     * @var string
     */
    private $playerOrTeamId;

    /**
     * @var integer
     */
    private $leaguePoints;

    /**
     * @var string
     */
    private $rank;

    /**
     * @var boolean
     */
    private $isInactive;

    /**
     * @var string
     */
    private $queueType;

    /**
     * @var string
     */
    private $playerOrTeamName;

    /**
     * @var integer
     */
    private $wins;

    /**
     * Set id
     * @param integer $id
     * @return League
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set isHotStreak
     *
     * @param boolean $isHotStreak
     * @return League
     */
    public function setIsHotStreak($isHotStreak)
    {
        $this->isHotStreak = $isHotStreak;

        return $this;
    }

    /**
     * Get isHotStreak
     *
     * @return boolean 
     */
    public function getIsHotStreak()
    {
        return $this->isHotStreak;
    }

    /**
     * Set isFreshBlood
     *
     * @param boolean $isFreshBlood
     * @return League
     */
    public function setIsFreshBlood($isFreshBlood)
    {
        $this->isFreshBlood = $isFreshBlood;

        return $this;
    }

    /**
     * Get isFreshBlood
     *
     * @return boolean 
     */
    public function getIsFreshBlood()
    {
        return $this->isFreshBlood;
    }

    /**
     * Set leagueName
     *
     * @param string $leagueName
     * @return League
     */
    public function setLeagueName($leagueName)
    {
        $this->leagueName = $leagueName;

        return $this;
    }

    /**
     * Get leagueName
     *
     * @return string 
     */
    public function getLeagueName()
    {
        return $this->leagueName;
    }

    /**
     * Set isVeteran
     *
     * @param boolean $isVeteran
     * @return League
     */
    public function setIsVeteran($isVeteran)
    {
        $this->isVeteran = $isVeteran;

        return $this;
    }

    /**
     * Get isVeteran
     *
     * @return boolean 
     */
    public function getIsVeteran()
    {
        return $this->isVeteran;
    }

    /**
     * Set tier
     *
     * @param string $tier
     * @return League
     */
    public function setTier($tier)
    {
        $this->tier = $tier;

        return $this;
    }

    /**
     * Get tier
     *
     * @return string 
     */
    public function getTier()
    {

        return ucfirst(strtolower($this->tier));
    }

    /**
     * Set lastPlayed
     *
     * @param integer $lastPlayed
     * @return League
     */
    public function setLastPlayed($lastPlayed)
    {
        $this->lastPlayed = $lastPlayed;

        return $this;
    }

    /**
     * Get lastPlayed
     *
     * @return integer 
     */
    public function getLastPlayed()
    {
        return $this->lastPlayed;
    }

    /**
     * Set playerOrTeamId
     *
     * @param string $playerOrTeamId
     * @return League
     */
    public function setPlayerOrTeamId($playerOrTeamId)
    {
        $this->playerOrTeamId = $playerOrTeamId;

        return $this;
    }

    /**
     * Get playerOrTeamId
     *
     * @return string 
     */
    public function getPlayerOrTeamId()
    {
        return $this->playerOrTeamId;
    }

    /**
     * Set leaguePoints
     *
     * @param integer $leaguePoints
     * @return League
     */
    public function setLeaguePoints($leaguePoints)
    {
        $this->leaguePoints = $leaguePoints;

        return $this;
    }

    /**
     * Get leaguePoints
     *
     * @return integer 
     */
    public function getLeaguePoints()
    {
        return $this->leaguePoints;
    }

    /**
     * Set rank
     *
     * @param string $rank
     * @return League
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return string 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set isInactive
     *
     * @param boolean $isInactive
     * @return League
     */
    public function setIsInactive($isInactive)
    {
        $this->isInactive = $isInactive;

        return $this;
    }

    /**
     * Get isInactive
     *
     * @return boolean 
     */
    public function getIsInactive()
    {
        return $this->isInactive;
    }

    /**
     * Set queueType
     *
     * @param string $queueType
     * @return League
     */
    public function setQueueType($queueType)
    {
        $this->queueType = $queueType;

        return $this;
    }

    /**
     * Get queueType
     *
     * @return string 
     */
    public function getQueueType()
    {
        return $this->queueType;
    }

    /**
     * Set playerOrTeamName
     *
     * @param string $playerOrTeamName
     * @return League
     */
    public function setPlayerOrTeamName($playerOrTeamName)
    {
        $this->playerOrTeamName = $playerOrTeamName;

        return $this;
    }

    /**
     * Get playerOrTeamName
     *
     * @return string 
     */
    public function getPlayerOrTeamName()
    {
        return $this->playerOrTeamName;
    }

    /**
     * Set wins
     *
     * @param integer $wins
     * @return League
     */
    public function setWins($wins)
    {
        $this->wins = $wins;

        return $this;
    }

    /**
     * Get wins
     *
     * @return integer 
     */
    public function getWins()
    {
        return $this->wins;
    }
}
