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
	
	public function index($produit, $url = NULL)
	{
		$this->data['gamme'] = $this->gamme_model->selectionner_gamme($url);
		$this->data['produit_url'] = $this->produit_model->selectionner_produit($produit);

		if ($url == NULL)
		{
			redirect('');
		}

		elseif (empty($this->data['produit_url']))
		{
			show_404();
		}

		elseif (empty($this->data['gamme']))
		{
			show_404();
		}

		else
		{
			$id = $this->data['gamme'][0]['produit_idProduit'];
			$this->data['produit'] = $this->gamme_model->selectionner_produit_par_gamme($url);
			$this->data['gammes_par_produit'] = $this->gamme_model->lister_gamme_par_id($id);
			$this->data['titre'] = str_replace("-"," ",$url);

			$this->load->view('theme/header', $this->data);
			$this->load->view('gamme/modele', $this->data);
			$this->load->view('theme/footer', $this->data);
		}
	}
}