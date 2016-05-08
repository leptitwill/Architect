<?php

class Produit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('produit_model');
		$this->load->model('reseaux_sociaux_model');
		$this->load->model('avantage_model');

		$this->data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();
		$this->data['produits'] = $this->produit_model->lister_produit();
	}
	
	public function index($url = NULL)
	{
		if ($url == NULL)
		{
			$this->data['titre'] = 'Les produits conceptcub';
			$this->data['produits'] = $this->produit_model->lister_produit();
			$this->data['succes'] = $this->session->flashdata('succes');

			$this->load->view('theme/header', $this->data);
			$this->load->view('produit/accueil', $this->data);
			$this->load->view('theme/footer', $this->data);
		}

		else
		{
			$this->data['produit'] = $this->produit_model->selectionner_produit($url);
			$this->data['gammes'] = $this->produit_model->selectionner_gamme_par_produit($url);
			$this->data['avantages'] = $this->avantage_model->lister_avantage();
			$this->data['titre'] = str_replace("-"," ",$url);

			$this->load->view('theme/header', $this->data);
			$this->load->view('produit/modele', $this->data);
			$this->load->view('theme/footer', $this->data);
		}
	}
}