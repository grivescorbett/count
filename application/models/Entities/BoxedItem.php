<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\BoxedItem
 */
class BoxedItem
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $count
     */
    private $count;

    /**
     * @var Entities\Item
     */
    private $item;


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
     * Set count
     *
     * @param integer $count
     * @return BoxedItem
     */
    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set item
     *
     * @param Entities\Item $item
     * @return BoxedItem
     */
    public function setItem(\Entities\Item $item = null)
    {
        $this->item = $item;
        return $this;
    }

    /**
     * Get item
     *
     * @return Entities\Item 
     */
    public function getItem()
    {
        return $this->item;
    }
}