<?php

/** @Entity */
class BoxedItem
{
	/** @Column(type="integer") */
    private $id;
	
	/**
	* @OneToOne(targetEntity="Item")
	* @JoinColumn(name="item_id", referencedColumnName="id")
	*/
	private $item;
	
	/** @Column(type="integer") */
	private $count;
}
?>