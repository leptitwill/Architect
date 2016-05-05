<?php

class Accueil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('produit_model');
		$this->load->model('membre_model');
		$this->load->model('accueil_model');
		$this->load->model('reseaux_sociaux_model');

		$this->data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();
	}
	
	public function index()
	{
		$this->data['titre'] = 'Pièce à vivre, bureau de jardin et studio de jardin';
		$this->data['produits'] = $this->produit_model->lister_produit();
		$this->data['membres'] = $this->membre_model->lister_membre();
		$this->data['accueil'] = $this->accueil_model->contenu_accueil();

		$this->load->view('theme/header', $this->data);
		$this->load->view('accueil', $this->data);
		$this->load->view('theme/footer', $this->data);
	}

}