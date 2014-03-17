<?php

namespace LoLTool\Bundle\LoLToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 */
class Game
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $gameId;

    /**
     * @var boolean
     */
    private $invalid;

    /**
     * @var string
     */
    private $gameMode;

    /**
     * @var string
     */
    private $gameType;

    /**
     * @var string
     */
    private $subType;

    /**
     * @var integer
     */
    private $mapId;

    /**
     * @var integer
     */
    private $playerId;

    /**
     * @var integer
     */
    private $teamId;

    /**
     * @var integer
     */
    private $championId;

    /**
     * @var integer
     */
    private $spell1;

    /**
     * @var integer
     */
    private $spell2;

    /**
     * @var integer
     */
    private $level;

    /**
     * @var integer
     */
    private $createDate;

    /**
     * @var array
     */
    private $fellowPlayers;

    /**
     * @var integer
     */
    private $statsId;

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
     * Set gameId
     *
     * @param integer $gameId
     * @return Game
     */
    public function setGameId($gameId)
    {
        $this->gameId = $gameId;

        return $this;
    }

    /**
     * Get gameId
     *
     * @return integer 
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * Set invalid
     *
     * @param boolean $invalid
     * @return Game
     */
    public function setInvalid($invalid)
    {
        $this->invalid = $invalid;

        return $this;
    }

    /**
     * Get invalid
     *
     * @return boolean 
     */
    public function getInvalid()
    {
        return $this->invalid;
    }

    /**
     * Set gameMode
     *
     * @param string $gameMode
     * @return Game
     */
    public function setGameMode($gameMode)
    {
        $this->gameMode = $gameMode;

        return $this;
    }

    /**
     * Get gameMode
     *
     * @return string 
     */
    public function getGameMode()
    {
        return $this->gameMode;
    }

    /**
     * Set gameType
     *
     * @param string $gameType
     * @return Game
     */
    public function setGameType($gameType)
    {
        $this->gameType = $gameType;

        return $this;
    }

    /**
     * Get gameType
     *
     * @return string 
     */
    public function getGameType()
    {
        return $this->gameType;
    }

    /**
     * Set subType
     *
     * @param string $subType
     * @return Game
     */
    public function setSubType($subType)
    {
        $this->subType = $subType;

        return $this;
    }

    /**
     * Get subType
     *
     * @return string 
     */
    public function getSubType()
    {
       switch($this->subType) {
           case 'NONE': return 'Custom Game';
           case 'NORMAL': return 'Custom Game';
           case 'NORMAL_3x3': return 'Normal 3 vs 3';
           case 'ODIN_UNRANKED': return 'Dominion';
           case 'ARAM_UNRANKED_5x5': return 'All Random All Mid';
           case 'BOT': return 'Bot Game 5 vs 5';
           case 'BOT_3x3': return 'Bot Game 3 vs 3';
           case 'RANKED_SOLO_5x5': return 'Ranked Solo 5 vs 5';
           case 'RANKED_TEAM_3x3': return 'Ranked Team 3 vs 3';
           case 'RANKED_TEAM_5x5': return 'Ranked Team 5 vs 5';
           default: return $this->subType;
       }


    }

    /**
     * Set mapId
     *
     * @param integer $mapId
     * @return Game
     */
    public function setMapId($mapId)
    {
        $this->mapId = $mapId;

        return $this;
    }

    /**
     * Get mapId
     *
     * @return integer 
     */
    public function getMapId()
    {
        return $this->mapId;
    }

    /**
     * Set playerId
     *
     * @param integer $playerId
     * @return Game
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
     * Set teamId
     *
     * @param integer $teamId
     * @return Game
     */
    public function setTeamId($teamId)
    {
        $this->teamId = $teamId;

        return $this;
    }

    /**
     * Get teamId
     *
     * @return integer 
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * Set championId
     *
     * @param integer $championId
     * @return Game
     */
    public function setChampionId($championId)
    {
        $this->championId = $championId;

        return $this;
    }

    /**
     * Get championId
     *
     * @return integer 
     */
    public function getChampionId()
    {
        return $this->championId;
    }

    /**
     * Set spell1
     *
     * @param integer $spell1
     * @return Game
     */
    public function setSpell1($spell1)
    {
        $this->spell1 = $spell1;

        return $this;
    }

    /**
     * Get spell1
     *
     * @return integer 
     */
    public function getSpell1()
    {
        return $this->spell1;
    }

    /**
     * Set spell2
     *
     * @param integer $spell2
     * @return Game
     */
    public function setSpell2($spell2)
    {
        $this->spell2 = $spell2;

        return $this;
    }

    /**
     * Get spell2
     *
     * @return integer 
     */
    public function getSpell2()
    {
        return $this->spell2;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return Game
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set createDate
     *
     * @param integer $createDate
     * @return Game
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return bigint
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set fellowPlayers
     *
     * @param array $fellowPlayers
     * @return Game
     */
    public function setFellowPlayers($fellowPlayers)
    {
        $this->fellowPlayers = $fellowPlayers;

        return $this;
    }

    /**
     * Get fellowPlayers
     *
     * @return array 
     */
    public function getFellowPlayers()
    {
        return $this->fellowPlayers;
    }

    /**
     * Set statsId
     *
     * @param integer $statsId
     * @return Game
     */
    public function setStatsId($statsId = 0)
    {
        $this->statsId = $statsId;
        return $this;
    }

    /**
     * Get statsId
     *
     * @return integer 
     */
    public function getStatsId()
    {
        return $this->statsId;
    }
    /**
     * @var \LoLTool\Bundle\LoLToolBundle\Entity\Statistics
     */
    private $statistics;


    /**
     * Set statistics
     *
     * @param \LoLTool\Bundle\LoLToolBundle\Entity\Statistics $statistics
     * @return Game
     */
    public function setStatistics(\LoLTool\Bundle\LoLToolBundle\Entity\Statistics $statistics = null)
    {
        $this->statistics = $statistics;

        return $this;
    }

    /**
     * Get statistics
     *
     * @return \LoLTool\Bundle\LoLToolBundle\Entity\Statistics 
     */
    public function getStatistics()
    {
        return $this->statistics;
    }
    /**
     * @var \LoLTool\Bundle\LoLToolBundle\Entity\Champion
     */
    private $champion;


    /**
     * Set champion
     *
     * @param \LoLTool\Bundle\LoLToolBundle\Entity\Champion $champion
     * @return Game
     */
    public function setChampion(\LoLTool\Bundle\LoLToolBundle\Entity\Champion $champion = null)
    {
        $this->champion = $champion;

        return $this;
    }

    /**
     * Get champion
     *
     * @return \LoLTool\Bundle\LoLToolBundle\Entity\Champion 
     */
    public function getChampion()
    {
        return $this->champion;
    }
}
