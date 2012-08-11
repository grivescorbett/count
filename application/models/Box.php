<?php

/** @Entity */
class Box
{
	/** @Column(type="integer") */
	private $id;
	
	/** @Column(length=50) */
	private $boxName;
	
	/** @Column(type="integer") */
	private $boxNumber;	
	
	/**
	* @OneToMany(targetEntity="BoxedItem", mappedBy="box")
	*/
	private $boxedItems;
	
	public function __construct() {
		$this->features = new \Doctrine\Common\Collections\ArrayCollection();
	}
}
?>