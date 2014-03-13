<?php

namespace LoLTool\Bundle\LoLToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Champion
 */
class Champion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $championId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var integer
     */
    private $attackRank;

    /**
     * @var integer
     */
    private $defenseRank;

    /**
     * @var integer
     */
    private $magicRank;

    /**
     * @var integer
     */
    private $difficultyRank;

    /**
     * @var boolean
     */
    private $botEnabled;

    /**
     * @var boolean
     */
    private $freeToPlay;

    /**
     * @var boolean
     */
    private $botMmEnabled;

    /**
     * @var boolean
     */
    private $rankedPlayEnabled;


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
     * Set championId
     *
     * @param integer $championId
     * @return Champion
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
     * Set name
     *
     * @param string $name
     * @return Champion
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
     * Set active
     *
     * @param boolean $active
     * @return Champion
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set attackRank
     *
     * @param integer $attackRank
     * @return Champion
     */
    public function setAttackRank($attackRank)
    {
        $this->attackRank = $attackRank;

        return $this;
    }

    /**
     * Get attackRank
     *
     * @return integer 
     */
    public function getAttackRank()
    {
        return $this->attackRank;
    }

    /**
     * Set defenseRank
     *
     * @param integer $defenseRank
     * @return Champion
     */
    public function setDefenseRank($defenseRank)
    {
        $this->defenseRank = $defenseRank;

        return $this;
    }

    /**
     * Get defenseRank
     *
     * @return integer 
     */
    public function getDefenseRank()
    {
        return $this->defenseRank;
    }

    /**
     * Set magicRank
     *
     * @param integer $magicRank
     * @return Champion
     */
    public function setMagicRank($magicRank)
    {
        $this->magicRank = $magicRank;

        return $this;
    }

    /**
     * Get magicRank
     *
     * @return integer 
     */
    public function getMagicRank()
    {
        return $this->magicRank;
    }

    /**
     * Set difficultyRank
     *
     * @param integer $difficultyRank
     * @return Champion
     */
    public function setDifficultyRank($difficultyRank)
    {
        $this->difficultyRank = $difficultyRank;

        return $this;
    }

    /**
     * Get difficultyRank
     *
     * @return integer 
     */
    public function getDifficultyRank()
    {
        return $this->difficultyRank;
    }

    /**
     * Set botEnabled
     *
     * @param boolean $botEnabled
     * @return Champion
     */
    public function setBotEnabled($botEnabled)
    {
        $this->botEnabled = $botEnabled;

        return $this;
    }

    /**
     * Get botEnabled
     *
     * @return boolean 
     */
    public function getBotEnabled()
    {
        return $this->botEnabled;
    }

    /**
     * Set freeToPlay
     *
     * @param boolean $freeToPlay
     * @return Champion
     */
    public function setFreeToPlay($freeToPlay)
    {
        $this->freeToPlay = $freeToPlay;

        return $this;
    }

    /**
     * Get freeToPlay
     *
     * @return boolean 
     */
    public function getFreeToPlay()
    {
        return $this->freeToPlay;
    }

    /**
     * Set botMmEnabled
     *
     * @param boolean $botMmEnabled
     * @return Champion
     */
    public function setBotMmEnabled($botMmEnabled)
    {
        $this->botMmEnabled = $botMmEnabled;

        return $this;
    }

    /**
     * Get botMmEnabled
     *
     * @return boolean 
     */
    public function getBotMmEnabled()
    {
        return $this->botMmEnabled;
    }

    /**
     * Set rankedPlayEnabled
     *
     * @param boolean $rankedPlayEnabled
     * @return Champion
     */
    public function setRankedPlayEnabled($rankedPlayEnabled)
    {
        $this->rankedPlayEnabled = $rankedPlayEnabled;

        return $this;
    }

    /**
     * Get rankedPlayEnabled
     *
     * @return boolean 
     */
    public function getRankedPlayEnabled()
    {
        return $this->rankedPlayEnabled;
    }
    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $media;


    /**
     * Set media
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $media
     * @return Champion
     */
    public function setMedia(\Application\Sonata\MediaBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getMedia()
    {
        return $this->media;
    }
}
