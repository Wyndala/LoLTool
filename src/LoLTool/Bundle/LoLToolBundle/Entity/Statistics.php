<?php

namespace LoLTool\Bundle\LoLToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistics
 */
class Statistics
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $playerId = 0;

    /**
     * @var integer
     */
    private $totalDamageDealtToChampions = 0;

    /**
     * @var integer
     */
    private $goldEarned = 0;

    /**
     * @var integer
     */
    private $item2 = 0;

    /**
     * @var integer
     */
    private $item1 = 0;

    /**
     * @var integer
     */
    private $item5 = 0;

    /**
     * @var integer
     */
    private $wardPlaced = 0;

    /**
     * @var integer
     */
    private $item0 = 0;

    /**
     * @var integer
     */
    private $trueDamageDealtPlayer = 0;

    /**
     * @var integer
     */
    private $physicaldamageDealtPlayer = 0;

    /**
     * @var integer
     */
    private $trueDamageDealtToChampions = 0;

    /**
     * @var integer
     */
    private $totalUnitsHealed = 0;

    /**
     * @var integer
     */
    private $largestCriticalStrike = 0;

    /**
     * @var integer
     */
    private $level = 0;

    /**
     * @var integer
     */
    private $neutralMinionsKilledYourJungle = 0;

    /**
     * @var integer
     */
    private $magicDamageDealtToChampions = 0;

    /**
     * @var integer
     */
    private $turretsKilled = 0;

    /**
     * @var integer
     */
    private $magicDamageDealtPlayer = 0;

    /**
     * @var integer
     */
    private $assists = 0;

    /**
     * @var integer
     */
    private $magicDamageTaken = 0;

    /**
     * @var integer
     */
    private $totalDamageTaken = 0;

    /**
     * @var integer
     */
    private $numDeaths = 0;

    /**
     * @var integer
     */
    private $totalTimeCrowdControlDealt = 0;

    /**
     * @var integer
     */
    private $largestMultiKill = 0;

    /**
     * @var integer
     */
    private $physicalDamageTaken = 0;

    /**
     * @var boolean
     */
    private $win;

    /**
     * @var integer
     */
    private $team = 0;

    /**
     * @var integer
     */
    private $totalDamageDealt = 0;

    /**
     * @var integer
     */
    private $totalHeal = 0;

    /**
     * @var integer
     */
    private $item4 = 0;

    /**
     * @var integer
     */
    private $item3 = 0;

    /**
     * @var integer
     */
    private $item6 = 0;

    /**
     * @var integer
     */
    private $minionsKilled = 0;

    /**
     * @var integer
     */
    private $timePlayed = 0;

    /**
     * @var integer
     */
    private $physicalDamageDealtToChampions = 0;

    /**
     * @var integer
     */
    private $championsKilled = 0;

    /**
     * @var integer
     */
    private $trueDamageTaken = 0;

    /**
     * @var integer
     */
    private $neutralMinionsKilled = 0;

    /**
     * @var integer
     */
    private $goldSpent = 0;

    /**
     * @ORM\OneToOne(targetEntity="Player", inversedBy="statistics")
     * @ORM\JoinColumn(name="playerId", referencedColumnName="playerId")
     */
    protected $player;

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
     * Set playerId
     *
     * @param integer $playerId
     * @return Statistics
     */
    public function setPlayerId($playerId = 0)
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
     * Set totalDamageDealtToChampions
     *
     * @param integer $totalDamageDealtToChampions
     * @return Statistics
     */
    public function setTotalDamageDealtToChampions($totalDamageDealtToChampions = 0)
    {
        $this->totalDamageDealtToChampions = $totalDamageDealtToChampions;

        return $this;
    }

    /**
     * Get totalDamageDealtToChampions
     *
     * @return integer 
     */
    public function getTotalDamageDealtToChampions()
    {
        return $this->totalDamageDealtToChampions;
    }

    /**
     * Set goldEarned
     *
     * @param integer $goldEarned
     * @return Statistics
     */
    public function setGoldEarned($goldEarned = 0)
    {
        $this->goldEarned = $goldEarned;

        return $this;
    }

    /**
     * Get goldEarned
     *
     * @return integer 
     */
    public function getGoldEarned()
    {
        return $this->goldEarned;
    }

    /**
     * Set item2
     *
     * @param integer $item2
     * @return Statistics
     */
    public function setItem2($item2 = 0)
    {
        $this->item2 = $item2;

        return $this;
    }

    /**
     * Get item2
     *
     * @return integer 
     */
    public function getItem2()
    {
        return $this->item2;
    }

    /**
     * Set item5
     *
     * @param integer $item5
     * @return Statistics
     */
    public function setItem5($item5 = 0)
    {
        $this->item5 = $item5;

        return $this;
    }

    /**
     * Get item5
     *
     * @return integer
     */
    public function getItem5()
    {
        return $this->item5;
    }

    /**
     * Set item1
     *
     * @param integer $item1
     * @return Statistics
     */
    public function setItem1($item1 = 0)
    {
        $this->item1 = $item1;

        return $this;
    }

    /**
     * Get item1
     *
     * @return integer 
     */
    public function getItem1()
    {
        return $this->item1;
    }

    /**
     * Set wardPlaced
     *
     * @param integer $wardPlaced
     * @return Statistics
     */
    public function setWardPlaced($wardPlaced = 0)
    {
        $this->wardPlaced = $wardPlaced;

        return $this;
    }

    /**
     * Get wardPlaced
     *
     * @return integer 
     */
    public function getWardPlaced()
    {
        return $this->wardPlaced;
    }

    /**
     * Set item0
     *
     * @param integer $item0
     * @return Statistics
     */
    public function setItem0($item0 = 0)
    {
        $this->item0 = $item0;

        return $this;
    }

    /**
     * Get item0
     *
     * @return integer 
     */
    public function getItem0()
    {
        return $this->item0;
    }

    /**
     * Set trueDamageDealtPlayer
     *
     * @param integer $trueDamageDealtPlayer
     * @return Statistics
     */
    public function setTrueDamageDealtPlayer($trueDamageDealtPlayer = 0)
    {
        $this->trueDamageDealtPlayer = $trueDamageDealtPlayer;

        return $this;
    }

    /**
     * Get trueDamageDealtPlayer
     *
     * @return integer 
     */
    public function getTrueDamageDealtPlayer()
    {
        return $this->trueDamageDealtPlayer;
    }

    /**
     * Set physicaldamageDealtPlayer
     *
     * @param integer $physicaldamageDealtPlayer
     * @return Statistics
     */
    public function setPhysicaldamageDealtPlayer($physicaldamageDealtPlayer = 0)
    {
        $this->physicaldamageDealtPlayer = $physicaldamageDealtPlayer;

        return $this;
    }

    /**
     * Get physicaldamageDealtPlayer
     *
     * @return integer 
     */
    public function getPhysicaldamageDealtPlayer()
    {
        return $this->physicaldamageDealtPlayer;
    }

    /**
     * Set trueDamageDealtToChampions
     *
     * @param integer $trueDamageDealtToChampions
     * @return Statistics
     */
    public function setTrueDamageDealtToChampions($trueDamageDealtToChampions = 0)
    {
        $this->trueDamageDealtToChampions = $trueDamageDealtToChampions;

        return $this;
    }

    /**
     * Get trueDamageDealtToChampions
     *
     * @return integer 
     */
    public function getTrueDamageDealtToChampions()
    {
        return $this->trueDamageDealtToChampions;
    }

    /**
     * Set totalUnitsHealed
     *
     * @param integer $totalUnitsHealed
     * @return Statistics
     */
    public function setTotalUnitsHealed($totalUnitsHealed = 0)
    {
        $this->totalUnitsHealed = $totalUnitsHealed;

        return $this;
    }

    /**
     * Get totalUnitsHealed
     *
     * @return integer 
     */
    public function getTotalUnitsHealed()
    {
        return $this->totalUnitsHealed;
    }

    /**
     * Set largestCriticalStrike
     *
     * @param integer $largestCriticalStrike
     * @return Statistics
     */
    public function setLargestCriticalStrike($largestCriticalStrike = 0)
    {
        $this->largestCriticalStrike = $largestCriticalStrike;

        return $this;
    }

    /**
     * Get largestCriticalStrike
     *
     * @return integer 
     */
    public function getLargestCriticalStrike()
    {
        return $this->largestCriticalStrike;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return Statistics
     */
    public function setLevel($level = 0)
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
     * Set neutralMinionsKilledYourJungle
     *
     * @param integer $neutralMinionsKilledYourJungle
     * @return Statistics
     */
    public function setNeutralMinionsKilledYourJungle($neutralMinionsKilledYourJungle = 0)
    {
        $this->neutralMinionsKilledYourJungle = $neutralMinionsKilledYourJungle;

        return $this;
    }

    /**
     * Get neutralMinionsKilledYourJungle
     *
     * @return integer 
     */
    public function getNeutralMinionsKilledYourJungle()
    {
        return $this->neutralMinionsKilledYourJungle;
    }

    /**
     * Set magicDamageDealtToChampions
     *
     * @param integer $magicDamageDealtToChampions
     * @return Statistics
     */
    public function setMagicDamageDealtToChampions($magicDamageDealtToChampions = 0)
    {
        $this->magicDamageDealtToChampions = $magicDamageDealtToChampions;

        return $this;
    }

    /**
     * Get magicDamageDealtToChampions
     *
     * @return integer 
     */
    public function getMagicDamageDealtToChampions()
    {
        return $this->magicDamageDealtToChampions;
    }

    /**
     * Set turretsKilled
     *
     * @param integer $turretsKilled
     * @return Statistics
     */
    public function setTurretsKilled($turretsKilled = 0)
    {
        $this->turretsKilled = $turretsKilled;

        return $this;
    }

    /**
     * Get turretsKilled
     *
     * @return integer 
     */
    public function getTurretsKilled()
    {
        return $this->turretsKilled;
    }

    /**
     * Set magicDamageDealtPlayer
     *
     * @param integer $magicDamageDealtPlayer
     * @return Statistics
     */
    public function setMagicDamageDealtPlayer($magicDamageDealtPlayer = 0)
    {
        $this->magicDamageDealtPlayer = $magicDamageDealtPlayer;

        return $this;
    }

    /**
     * Get magicDamageDealtPlayer
     *
     * @return integer 
     */
    public function getMagicDamageDealtPlayer()
    {
        return $this->magicDamageDealtPlayer;
    }

    /**
     * Set assists
     *
     * @param integer $assists
     * @return Statistics
     */
    public function setAssists($assists = 0)
    {
        $this->assists = $assists;

        return $this;
    }

    /**
     * Get assists
     *
     * @return integer 
     */
    public function getAssists()
    {
        return $this->assists;
    }

    /**
     * Set totalDamageTaken
     *
     * @param integer $totalDamageTaken
     * @return Statistics
     */
    public function setTotalDamageTaken($totalDamageTaken = 0)
    {
        $this->totalDamageTaken = $totalDamageTaken;

        return $this;
    }

    /**
     * Get totalDamageTaken
     *
     * @return integer
     */
    public function getTotalDamageTaken()
    {
        return $this->totalDamageTaken;
    }


    /**
     * Set magicDamageTaken
     *
     * @param integer $magicDamageTaken
     * @return Statistics
     */
    public function setMagicDamageTaken($magicDamageTaken = 0)
    {
        $this->magicDamageTaken = $magicDamageTaken;

        return $this;
    }

    /**
     * Get magicDamageTaken
     *
     * @return integer 
     */
    public function getMagicDamageTaken()
    {
        return $this->magicDamageTaken;
    }

    /**
     * Set numDeaths
     *
     * @param integer $numDeaths
     * @return Statistics
     */
    public function setNumDeaths($numDeaths = 0)
    {
        $this->numDeaths = $numDeaths;

        return $this;
    }

    /**
     * Get numDeaths
     *
     * @return integer 
     */
    public function getNumDeaths()
    {
        return $this->numDeaths;
    }

    /**
     * Set totalTimeCrowdControlDealt
     *
     * @param integer $totalTimeCrowdControlDealt
     * @return Statistics
     */
    public function setTotalTimeCrowdControlDealt($totalTimeCrowdControlDealt = 0)
    {
        $this->totalTimeCrowdControlDealt = $totalTimeCrowdControlDealt;

        return $this;
    }

    /**
     * Get totalTimeCrowdControlDealt
     *
     * @return integer 
     */
    public function getTotalTimeCrowdControlDealt()
    {
        return $this->totalTimeCrowdControlDealt;
    }

    /**
     * Set largestMultiKill
     *
     * @param integer $largestMultiKill
     * @return Statistics
     */
    public function setLargestMultiKill($largestMultiKill = 0)
    {
        $this->largestMultiKill = $largestMultiKill;

        return $this;
    }

    /**
     * Get largestMultiKill
     *
     * @return integer 
     */
    public function getLargestMultiKill()
    {
        return $this->largestMultiKill;
    }

    /**
     * Set physicalDamageTaken
     *
     * @param integer $physicalDamageTaken
     * @return Statistics
     */
    public function setPhysicalDamageTaken($physicalDamageTaken = 0)
    {
        $this->physicalDamageTaken = $physicalDamageTaken;

        return $this;
    }

    /**
     * Get physicalDamageTaken
     *
     * @return integer 
     */
    public function getPhysicalDamageTaken()
    {
        return $this->physicalDamageTaken;
    }

    /**
     * Set win
     *
     * @param boolean $win
     * @return Statistics
     */
    public function setWin($win = 0)
    {
        $this->win = $win;

        return $this;
    }

    /**
     * Get win
     *
     * @return boolean 
     */
    public function getWin()
    {
        return $this->win;
    }

    /**
     * Set team
     *
     * @param integer $team
     * @return Statistics
     */
    public function setTeam($team = 0)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return integer 
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set totalDamageDealt
     *
     * @param integer $totalDamageDealt
     * @return Statistics
     */
    public function setTotalDamageDealt($totalDamageDealt = 0)
    {
        $this->totalDamageDealt = $totalDamageDealt;

        return $this;
    }

    /**
     * Get totalDamageDealt
     *
     * @return integer 
     */
    public function getTotalDamageDealt()
    {
        return $this->totalDamageDealt;
    }

    /**
     * Set totalHeal
     *
     * @param integer $totalHeal
     * @return Statistics
     */
    public function setTotalHeal($totalHeal = 0)
    {
        $this->totalHeal = $totalHeal;

        return $this;
    }

    /**
     * Get totalHeal
     *
     * @return integer 
     */
    public function getTotalHeal()
    {
        return $this->totalHeal;
    }

    /**
     * Set item4
     *
     * @param integer $item4
     * @return Statistics
     */
    public function setItem4($item4 = 0)
    {
        $this->item4 = $item4;

        return $this;
    }

    /**
     * Get item4
     *
     * @return integer 
     */
    public function getItem4()
    {
        return $this->item4;
    }

    /**
     * Set item3
     *
     * @param integer $item3
     * @return Statistics
     */
    public function setItem3($item3 = 0)
    {
        $this->item3 = $item3;

        return $this;
    }

    /**
     * Get item3
     *
     * @return integer 
     */
    public function getItem3()
    {
        return $this->item3;
    }

    /**
     * Set item6
     *
     * @param integer $item6
     * @return Statistics
     */
    public function setItem6($item6 = 0)
    {
        $this->item6 = $item6;

        return $this;
    }

    /**
     * Get item6
     *
     * @return integer 
     */
    public function getItem6()
    {
        return $this->item6;
    }

    /**
     * Set minionsKilled
     *
     * @param integer $minionsKilled
     * @return Statistics
     */
    public function setMinionsKilled($minionsKilled = 0)
    {
        $this->minionsKilled = $minionsKilled;

        return $this;
    }

    /**
     * Get minionsKilled
     *
     * @return integer 
     */
    public function getMinionsKilled()
    {
        return $this->minionsKilled;
    }

    /**
     * Set timePlayed
     *
     * @param integer $timePlayed
     * @return Statistics
     */
    public function setTimePlayed($timePlayed = 0)
    {
        $this->timePlayed = $timePlayed;

        return $this;
    }

    /**
     * Get timePlayed
     *
     * @return integer 
     */
    public function getTimePlayed()
    {
        return $this->timePlayed;
    }

    /**
     * Set physicalDamageDealtToChampions
     *
     * @param integer $physicalDamageDealtToChampions
     * @return Statistics
     */
    public function setPhysicalDamageDealtToChampions($physicalDamageDealtToChampions = 0)
    {
        $this->physicalDamageDealtToChampions = $physicalDamageDealtToChampions;

        return $this;
    }

    /**
     * Get physicalDamageDealtToChampions
     *
     * @return integer 
     */
    public function getPhysicalDamageDealtToChampions()
    {
        return $this->physicalDamageDealtToChampions;
    }

    /**
     * Set championsKilled
     *
     * @param integer $championsKilled
     * @return Statistics
     */
    public function setChampionsKilled($championsKilled = 0)
    {
        $this->championsKilled = $championsKilled;

        return $this;
    }

    /**
     * Get championsKilled
     *
     * @return integer 
     */
    public function getChampionsKilled()
    {
        return $this->championsKilled;
    }

    /**
     * Set trueDamageTaken
     *
     * @param integer $trueDamageTaken
     * @return Statistics
     */
    public function setTrueDamageTaken($trueDamageTaken = 0)
    {
        $this->trueDamageTaken = $trueDamageTaken;

        return $this;
    }

    /**
     * Get trueDamageTaken
     *
     * @return integer 
     */
    public function getTrueDamageTaken()
    {
        return $this->trueDamageTaken;
    }

    /**
     * Set neutralMinionsKilled
     *
     * @param integer $neutralMinionsKilled
     * @return Statistics
     */
    public function setNeutralMinionsKilled($neutralMinionsKilled = 0)
    {
        $this->neutralMinionsKilled = $neutralMinionsKilled;

        return $this;
    }

    /**
     * Get neutralMinionsKilled
     *
     * @return integer 
     */
    public function getNeutralMinionsKilled()
    {
        return $this->neutralMinionsKilled;
    }

    /**
     * Set goldSpent
     *
     * @param integer $goldSpent
     * @return Statistics
     */
    public function setGoldSpent($goldSpent = 0)
    {
        $this->goldSpent = $goldSpent;

        return $this;
    }

    /**
     * Get goldSpent
     *
     * @return integer 
     */
    public function getGoldSpent()
    {
        return $this->goldSpent;
    }
}
