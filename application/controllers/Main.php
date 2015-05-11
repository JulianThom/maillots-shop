<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// //Chargé dans le fichier autoload
		// $this->load->helper('url');
		$this->load->helper('text');		
		$this->load->model("Produit_model");	
		$allProduits=$this->Produit_model->findLimit(3); //Pour afficher la fonction findLimit();
		$imgSlider=$this->Produit_model->getImgSlider();
		//On charge le render pour remplacer le "load->view"		
		$this->render("accueil", ["allProduits"=>$allProduits, "imgSlider"=>$imgSlider]); //view toujours en dernier

	}
}