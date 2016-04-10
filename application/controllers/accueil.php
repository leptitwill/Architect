<?php

class Accueil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('produit_model');
		$this->load->model('membre_model');
	}
	
	public function index()
	{
		$data['titre'] = 'Conceptcub - faite moi rêvé ....';
		$data['titre_page'] = 'Notre concept de pièce à vivre';
		$data['produits'] = $this->produit_model->lister_produit();
		$data['membres'] = $this->membre_model->lister_membre();

		$this->load->view('theme/header', $data);
		$this->load->view('accueil', $data);
		$this->load->view('theme/footer', $data);
	}

}