<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie extends CI_Controller {

	public function detailProduitByCategorie($idproduit)
	{
		$this->load->model("Produit_model");
		$getProduitByCategorie=$this->Produit_model->getProduitByCategorie($idproduit, 3);
		// var_dump($getProduitByCategorie);	
		$this->load->view("categorie/detailProduitByCategorie", ["getProduitByCategorie"=>$getProduitByCategorie]);		
	}
}