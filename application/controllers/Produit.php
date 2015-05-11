<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit extends CI_Controller {

	public function ficheProduit($idProduit)//On injectera l'id du produit pour crééer un lien à chaque fois ficheProduit/1 par ex.
	{
		//Création du bouton retour
		$this->load->library('user_agent');
		$referrer = null;
		if($this->agent->referrer())
		{
			$referrer = $this->agent->referrer();
		}
		//Fin création bouton
		$this->load->model("Produit_model");
		$this->load->model("Commentaire_model");
		$getUnProduitPourFiche=$this->Produit_model->findProduitById($idProduit);
		$moyenneCommentaires=$this->Produit_model->getAvgCommentaire($idProduit);
		$nombreCommentaires=$this->Produit_model->getNbCommentaire($idProduit);		
		// var_dump($nombreCommentaires);	

		$this->load->helper('form');
		$this->load->library('form_validation');
		//$this->form_validation->set_message('required', 'Champ requis');
		$this->form_validation->set_rules('auteur', '"Nom"', 'required|min_length[2]');
		$this->form_validation->set_rules('note', '"Note"', 'required|less_than[6]|greater_than[0]');	
		$this->form_validation->set_rules('message', '"Message"', 'required|max_length[500]');	

		 if ($this->form_validation->run() == TRUE)	
		 {
		 	
		 	$this->Commentaire_model->insertCommentaireDb($getUnProduitPourFiche->idproduit);
		 	$this->session->set_flashdata("successCommentaire", "<div class='alert alert-success'>Votre commentaire a bien été ajouté.</div>");
			redirect ("produit/ficheProduit/".$idProduit);		 	
		 }

		$allCommentaireById=$this->Commentaire_model->getAllCommentairebyId($idProduit);	
		$this->load->view("produit/ficheProduit", [
							"allCommentaireById"=>$allCommentaireById,
							"getUnProduitPourFiche"=>$getUnProduitPourFiche,
							"moyenneCommentaires"=>$moyenneCommentaires,
							"nombreCommentaires"=>$nombreCommentaires,
							'btnRetour' => $referrer
						]);
		// var_dump($allCommentaireById);
	}
	public function detailMarque($idMarque)
	{
		$this->load->library('user_agent');
		$referrer = null;
		if($this->agent->referrer())
		{
			$referrer = $this->agent->referrer();
		}
		$this->load->model("Produit_model");
		$getProduitbyMarque=$this->Produit_model->findLesProduitsDesMarquesById($idMarque, 3);
		// var_dump($getProduitbyMarque);	
		$this->load->view("produit/detailMarque", ["getProduitbyMarque"=>$getProduitbyMarque, 'btnRetour' => $referrer]);		
	}		
}