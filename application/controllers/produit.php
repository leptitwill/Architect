<?php

class Produit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('produit_model');
		$this->load->model('reseaux_sociaux_model');
		$this->load->model('entreprise_model');

		$this->data['entreprise'] = $this->entreprise_model->lister_entreprise();
		$this->data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();
		$this->data['produits'] = $this->produit_model->lister_produit();
	}
	
	public function index($url = NULL)
	{
		$this->data['produit'] = $this->produit_model->selectionner_produit($url);
		$this->data['gammes'] = $this->produit_model->selectionner_gamme_par_produit($url);
		$this->data['avantages'] = $this->produit_model->selectionner_avantage_par_produit($url);
		$this->data['solutions'] = $this->produit_model->selectionner_solution_par_produit($url);
		$this->data['titre'] = str_replace("-"," ",$url);
		$this->data['titre'] = ucfirst($this->data['titre']);

		if ($url == NULL)
		{
			redirect('');
		}

		elseif (empty($this->data['produit']))
		{
			show_404();
		}

		else
		{
			$this->load->view('theme/header', $this->data);
			$this->load->view('produit/modele', $this->data);
			$this->load->view('theme/footer', $this->data);
		}
	}
}