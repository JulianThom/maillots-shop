<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends CI_Controller {

	public function ajout()
	{
		//On test si l'user tape directement dans l'URL la page panier
		if (empty($this->input->post("quantity")) || empty($this->input->post("idProduit"))) {
			redirect ("main");
		}


		$idProduit=$this->input->post("idProduit");
		$quantity=$this->input->post("quantity");
		$panier=unserialize(get_cookie("cart"));
		if (empty($panier)) {
			$panier=[];
		}
		if (isset($panier[$idProduit])) {
			$panier[$idProduit]=intval($panier[$idProduit])+intval($quantity);
		} else {
			$panier[$idProduit]=intval($quantity);
		}
		set_cookie("cart", $panier);
		redirect ("panier");
	}
	public function index()
	{
		$getCookie=unserialize(get_cookie("cart"));
		$this->load->model("Panier_model");
		$getProduitPanier = [];
		if (!empty($getCookie)) {
			$getProduitPanier=$this->Panier_model->produitPanier(array_keys($getCookie));
		}
		// var_dump($getCookie);
		// var_dump($getProduitPanier);			
		$this->load->view("produit/panier", ["getProduitPanier"=>$getProduitPanier, "getCookie"=>$getCookie]);
	}
	public function action($choixAction, $idProduit)
	{
		$getCookie=unserialize(get_cookie("cart"));
		$this->load->model("Panier_model");
		var_dump($getCookie);
		if (empty($getCookie)) {
			redirect ("panier");
		}

		if (array_key_exists($idProduit, $getCookie)) {
			switch ($choixAction) {
				case 'supprimer':
				unset($getCookie[$idProduit]);
					break;
				
				case 'up':
				$getCookie[$idProduit]++;
					break;

				case 'down':
				if ($getCookie[$idProduit]>0) {
					$getCookie[$idProduit]--;
					break;					
				} else {
					$getCookie[$idProduit]=0;
					break;
				}
				
			}
				set_cookie("cart", $getCookie);	

			} else {
				// flash
			}
		
		redirect ("panier");	
	}	
}