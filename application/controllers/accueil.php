<?php

class Accueil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('produit_model');
	}
	
	public function index()
	{
		$data['titre_page'] = 'Conceptcub $$$$Bitch$$$$';
		$data['produits'] = $this->produit_model->lister_produit();

		$this->load->view('theme/header', $data);
		$this->load->view('accueil', $data);
		$this->load->view('theme/footer', $data);
	}

}