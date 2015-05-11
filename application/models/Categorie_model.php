<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie_model extends CI_Model {

	public function getCategorieClub()
	{
		$sql = 'SELECT * FROM `categorie`
				WHERE categorieParent != 0
				order by `nom` asc';
		$requete=$this->db->query($sql);
		return ($requete->result("Categorie_model"));
	}	
	public function getCategorieChampionnat()
	{
		$sql = 'SELECT * FROM `categorie`
				WHERE categorieParent = 0
				order by `nom` asc';
		$requete=$this->db->query($sql);
		return ($requete->result("Categorie_model"));
	}					
}