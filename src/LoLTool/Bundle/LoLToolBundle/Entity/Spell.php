<?php

namespace LoLTool\Bundle\LoLToolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spell
 */
class Spell
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
     * @var string
     */
    private $description;

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
     * @return Spell
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
     * Set description
     *
     * @param string $description
     * @return Spell
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set summonerLevel
     *
     * @param integer $summonerLevel
     * @return Spell
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
     * Set id
     *
     * @param string $id
     * @return Spell
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * @var string
     */
    private $spellKey;


    /**
     * Set spellKey
     *
     * @param string $spellKey
     * @return Spell
     */
    public function setSpellKey($spellKey)
    {
        $this->spellKey = $spellKey;

        return $this;
    }

    /**
     * Get spellKey
     *
     * @return string 
     */
    public function getSpellKey()
    {
        return $this->spellKey;
    }
}
