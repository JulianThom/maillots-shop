<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit_model extends CI_Model {

	public function findLimit($nb)//Nombre de produits par page à renvoyer dans l'appel de la fonction
	{
		// $requete=$this->db->get("produit", $nb); //Pour faire une requête qui correspond à "SELECT * FROM produit".
		// return ($requete->result("Produit_model"));
		// 2ème façon de faire une requête
		$sql = 'SELECT *, AVG(commentaire.note) as noteMoyenne, count(commentaire.idcommentaire) as nombreCommentaire FROM `produit`
				INNER JOIN commentaire on produit.idproduit=commentaire.produit_idproduit
				group by idproduit
				order by noteMoyenne desc
				LIMIT ?';
		$requete2=$this->db->query($sql, $nb);
		return ($requete2->result("Produit_model"));
	}

	public function findProduitById($id)
	{

		$requete=$this->db->get_where("produit", ['idproduit' => intval($id)]); //Requête récupérée dans la doc de code igniter
		return ($requete->unbuffered_row("Produit_model"));	//unbuffered_row pour récupérer un seul produit (équivalent au Fetch())	
	}

	public function findLesProduitsDesMarquesById($id2, $nb2)
	{
		
		$sql = 'SELECT produit.*, marque.nom as nomMarque, marque.description as descMarque, AVG(commentaire.note) as noteMoyenne, count(commentaire.idcommentaire) as nombreCommentaire FROM produit
				LEFT JOIN marque ON produit.marque_idmarque=marque.idmarque
				LEFT JOIN commentaire on produit.idproduit=commentaire.produit_idproduit
				WHERE produit.marque_idmarque=?
				group by idproduit
				order by noteMoyenne desc
				LIMIT ?';
		$requete=$this->db->query($sql, [intval($id2), $nb2]);
		return ($requete->result("Produit_model"));	

		// $requete=$this->db->get_where("produit", ['marque_idmarque' => intval($id2)]); //Requête récupérée dans la doc de code igniter
		// $this->db->join('marque', 'produit.marque_idmarque = marque.idmarque');
		// return ($requete->result("Produit_model"));	//unbuffered_row pour récupérer un seul produit (équivalent au Fetch())	
	}	
	public function getAvgCommentaire($id3)
	{
		
		$sql = 'SELECT AVG(note) as noteMoyenne FROM commentaire	 WHERE produit_idproduit= ?';
		$requete=$this->db->query($sql, [intval($id3)]);
		return ($requete->result("Produit_model"));	
	}
	public function getNbCommentaire($id4)
	{
		
		$sql = 'SELECT count(`idcommentaire`) as nbCommentaires FROM commentaire WHERE produit_idproduit= ?';
		$requete=$this->db->query($sql, [intval($id4)]);
		return ($requete->result("Produit_model"));	
	}		

	public function getImgSlider()
	{		
		$sql = 'SELECT * FROM `slider`';
		$requete=$this->db->query($sql);
		return ($requete->result("Produit_model"));	
	}	

	public function displayImage()
	{
		return base_url()."assets/images/".$this->image;
	}
	public function getProduitByCategorie($id5, $nb5)
	{		
		$sql = 'SELECT produit.*, categorie.nom as nomCategorie, categorie.description as descCategorie, AVG(commentaire.note) as noteMoyenne, count(commentaire.idcommentaire) as nombreCommentaire FROM produit
		INNER JOIN categorie_has_produit ON produit.idproduit=categorie_has_produit.produit_idproduit
		INNER JOIN categorie ON categorie_has_produit.categorie_idcategorie=categorie.idcategorie
		LEFT JOIN commentaire ON produit.idproduit=commentaire.produit_idproduit
		WHERE idcategorie =?
		group by idproduit
		order by noteMoyenne desc
		LIMIT ?';
		$requete=$this->db->query($sql, [intval($id5), $nb5]);
		return ($requete->result("Produit_model"));	
	}			
}

