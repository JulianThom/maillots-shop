<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Marque extends MY_Controller {

	public function index()//On injectera l'id du produit pour crééer un lien à chaque fois ficheProduit/1 par ex.
	{
		$this->load->library('user_agent');
		$referrer = null;
		if($this->agent->referrer())
		{
			$referrer = $this->agent->referrer();
		}	
		$this->load->model("Marque_model");
		$allMarques=$this->Marque_model->getAllMarques();
		$allMarquesForNav=$this->Marque_model->getAllMarquesbyAsc();
		// var_dump($allMarques);		
		// var_dump($allMarquesForNav);	
		$this->render("marque/showMarque", ["allMarques"=>$allMarques, 'btnRetour' => $referrer]);	
	}
}