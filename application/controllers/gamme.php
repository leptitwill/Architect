<?php

class Gamme extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('gamme_model');
		$this->load->model('produit_model');
		$this->load->model('reseaux_sociaux_model');
		$this->load->model('entreprise_model');

		$this->data['entreprise'] = $this->entreprise_model->lister_entreprise();
		$this->data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();
		$this->data['produits'] = $this->produit_model->lister_produit();
	}
	
	public function index($url = NULL)
	{
		if ($url == NULL)
		{
			$this->data['titre'] = 'Les gammes conceptcub';
			$this->data['gammes'] = $this->gamme_model->lister_gamme();
			$this->data['succes'] = $this->session->flashdata('succes');

			$this->load->view('theme/header', $this->data);
			$this->load->view('gamme/accueil', $this->data);
			$this->load->view('theme/footer', $this->data);
		}

		else
		{
			$url = $_POST['url'];
			$this->data['gamme'] = $this->gamme_model->selectionner_gamme($url);
			$this->data['titre'] = str_replace("-"," ",$url); ;

			$this->load->view('gamme/modele', $this->data);
		}
	}
}