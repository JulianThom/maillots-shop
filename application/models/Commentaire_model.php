<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Commentaire_model extends CI_Model {

	public function insertCommentaireDb($idProduit)
	{
		// var_dump($this->input->post('auteur'));
		// var_dump($this->input->post('message'));
		// var_dump($this->input->post('note'));	
		$dataForm=[
			"user"=>$this->input->post('auteur'),
			"contenu"=>$this->input->post('message'),
			"note"=>$this->input->post('note'),
			"produit_idproduit"=>$idProduit,
			"dateCommentaire"=> Date('Y-m-d H:i:s')
		];	
		$this->db->insert('commentaire', $dataForm);
	}

	public function getAllCommentairebyId($idProduit2)
	{
		$sql = 'SELECT * FROM `commentaire` WHERE produit_idproduit= ? order by `dateCommentaire` desc';
		$requete=$this->db->query($sql, [intval($idProduit2)]);
		return ($requete->result("Commentaire_model"));
	}			
}