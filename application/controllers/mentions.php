<?php

class Mentions extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('contact_model');
		$this->load->model('reseaux_sociaux_model');
		$this->load->model('entreprise_model');

		$this->data['entreprise'] = $this->entreprise_model->lister_entreprise();
		$this->data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();
		$this->data['produits'] = $this->produit_model->lister_produit();
	}
	
	public function index()
	{
		$this->data['titre'] = 'Mentions légales';

		$this->load->view('theme/header', $this->data);
		$this->load->view('mentions/accueil', $this->data);
		$this->load->view('theme/footer', $this->data);
	}

}