<?php

class count extends CI_Controller {
	
	public function view($page = 'home')
	{
		if (!file_exists('application/views/pages/'.$page.'.php'))
		{
			show_404();
		}
		
		$data['title'] = ucfirst($page); 
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function addBox()
	{
		$boxName = $this->input->post('name');
		$boxNumber = $this->input->post('number');
		
		$box = new Entities\Box;
		$box->setBoxName($boxName);
		$box->setBoxNumber($boxNumber);
		$this->doctrine->em->persist($box);
		$this->doctrine->em->flush();
		
		echo "yay";
	}
	
	public function getBoxItems($boxId)
	{
		$box = $this->doctrine->em->find("Entities\Box", $boxId);
		
		$items = $box->getBoxedItems();
		$json = array();
		
		foreach($items as $item)
		{
			$itemType = $item->getItem();
			$json[$item->getId()] = array ( "count" => $item->getCount(), "item_id" => $itemType->getId(), "name" => $itemType->getItemName(), "upc" => $itemType->getUpc());
		}
		
		echo json_encode($json, JSON_FORCE_OBJECT);
	}
	
	public function getBoxes()
	{
		
		$boxes = $this->doctrine->em->getRepository("Entities\Box")->findAll();
		
		$json = array();
		foreach($boxes as $box)
		{
			$json[$box->getId()] = array ("name" => $box->getBoxName(), "number" => $box->getBoxNumber());
		}
		
		echo json_encode($json, JSON_FORCE_OBJECT);
	}
	
	public function getItemCache()
	{
		$itemTypes = $this->doctrine->em->getRepository("Entities\Item")->findAll();
		
		$json = array();
		foreach($itemTypes as $item)
		{
			$json[$item->getId()] = array ("upc" => $item->getUpc(), "name" => $item->getItemName());
		}
		echo json_encode($json, JSON_FORCE_OBJECT);
	}
}

?>