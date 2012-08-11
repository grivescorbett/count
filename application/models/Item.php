<?php
/** @Entity */
class Item
{
	/** @Column(type="integer") */
    private $id;
	
	/** @Column(length=50) */
	private $itemName;
	
	/** @Column(type="integer") */
	private $UPC;
}
?>