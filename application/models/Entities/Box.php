<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\Box
 */
class Box
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $boxName
     */
    private $boxName;

    /**
     * @var integer $boxNumber
     */
    private $boxNumber;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $boxedItems;

    public function __construct()
    {
        $this->boxedItems = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set boxName
     *
     * @param string $boxName
     * @return Box
     */
    public function setBoxName($boxName)
    {
        $this->boxName = $boxName;
        return $this;
    }

    /**
     * Get boxName
     *
     * @return string 
     */
    public function getBoxName()
    {
        return $this->boxName;
    }

    /**
     * Set boxNumber
     *
     * @param integer $boxNumber
     * @return Box
     */
    public function setBoxNumber($boxNumber)
    {
        $this->boxNumber = $boxNumber;
        return $this;
    }

    /**
     * Get boxNumber
     *
     * @return integer 
     */
    public function getBoxNumber()
    {
        return $this->boxNumber;
    }

    /**
     * Add boxedItems
     *
     * @param Entities\BoxedItem $boxedItems
     * @return Box
     */
    public function addBoxedItem(\Entities\BoxedItem $boxedItems)
    {
        $this->boxedItems[] = $boxedItems;
        return $this;
    }

    /**
     * Get boxedItems
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getBoxedItems()
    {
        return $this->boxedItems;
    }
}