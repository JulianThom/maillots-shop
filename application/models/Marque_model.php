<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Marque_model extends CI_Model {

	public function getAllMarques()
	{

		$requete=$this->db->get("marque"); //Requête récupérée dans la doc de code igniter
		return ($requete->result("Marque_model"));
	}
	public function getAllMarquesbyAsc()
	{
	$sql = 'SELECT marque.idmarque,  marque.nom from marque
			order by marque.nom asc';
		$requete=$this->db->query($sql);
		return ($requete->result("Marque_model"));	
	}	

	public function displayImage()
	{
		return base_url()."assets/images/".$this->image;
	}		
}