<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\Item
 */
class Item
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $itemName
     */
    private $itemName;

    /**
     * @var integer $upc
     */
    private $upc;


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
     * Set itemName
     *
     * @param string $itemName
     * @return Item
     */
    public function setItemName($itemName)
    {
        $this->itemName = $itemName;
        return $this;
    }

    /**
     * Get itemName
     *
     * @return string 
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * Set upc
     *
     * @param integer $upc
     * @return Item
     */
    public function setUpc($upc)
    {
        $this->upc = $upc;
        return $this;
    }

    /**
     * Get upc
     *
     * @return integer 
     */
    public function getUpc()
    {
        return $this->upc;
    }
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $itemTypes;

    public function __construct()
    {
        $this->itemTypes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add itemTypes
     *
     * @param Entities\BoxedItem $itemTypes
     * @return Item
     */
    public function addBoxedItem(\Entities\BoxedItem $itemTypes)
    {
        $this->itemTypes[] = $itemTypes;
        return $this;
    }

    /**
     * Get itemTypes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getItemTypes()
    {
        return $this->itemTypes;
    }
}