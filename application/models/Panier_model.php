<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Panier_model extends CI_Model {

	public function produitPanier($getCookie)
	{
		$sql = 'SELECT produit.*, marque.nom as nomMarque FROM produit
				INNER JOIN marque ON produit.marque_idmarque=marque.idmarque
				WHERE idproduit IN ?';
				$requete=$this->db->query($sql, [$getCookie]);
				return ($requete->result("Panier_model"));
	}
	public function displayImage()
	{
		return base_url()."assets/images/".$this->image;
	}							
}