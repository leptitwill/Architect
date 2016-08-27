<?php

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('produit_model');
		$this->load->model('reseaux_sociaux_model');
		$this->load->model('entreprise_model');

		$this->load->model('blog_model');

		$this->data['entreprise'] = $this->entreprise_model->lister_entreprise();
		$this->data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();
		$this->data['produits'] = $this->produit_model->lister_produit();
	}

	public function index($url = NULL)
	{
		$this->data['articles'] = $this->blog_model->lister_article();
		$this->data['sb_articles'] = $this->blog_model->lister_article(3);
		$this->data['article'] = $this->blog_model->selectionner_article($url);

		if ($url == NULL)
		{
			$this->data['titre'] = 'Le blog';
			$this->data['sous_titre'] = 'Retez inspirez grâce à nos articles';

			$this->load->view('theme/header', $this->data);
			$this->load->view('blog/accueil', $this->data);
			$this->load->view('theme/footer', $this->data);
		}

		elseif (empty($this->data['article']))
		{
			show_404();
		}

		else
		{
			$this->data['titre'] = str_replace("-"," ",$url);
			$this->data['titre'] = ucfirst($this->data['titre']);

			$this->load->view('theme/header', $this->data);
			$this->load->view('blog/modele', $this->data);
			$this->load->view('theme/footer', $this->data);
		}
	}
}
