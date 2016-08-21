<?php

class Concept extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('concept_model');
		$this->load->model('reseaux_sociaux_model');
		$this->load->model('entreprise_model');
		$this->load->model('membre_model');
		$this->load->model('faq_operatoire_model');
		$this->load->model('etape_model');

		$this->data['entreprise'] = $this->entreprise_model->lister_entreprise();
		$this->data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();
		$this->data['produits'] = $this->produit_model->lister_produit();
	}

	public function index()
	{
		$this->data['titre'] = 'Notre concept';
		$this->data['sous_titre'] = 'Apprenez en plus sur conceptcub';

		$this->data['concept'] = $this->concept_model->lister_concept();
		$this->data['avantages'] = $this->concept_model->lister_avantages();
		$this->data['faqs'] = $this->faq_operatoire_model->lister_faq();
		$this->data['etapes'] = $this->etape_model->lister_etape();
		$this->data['membres'] = $this->membre_model->lister_membre();

		$this->load->view('theme/header', $this->data);
		$this->load->view('concept/accueil', $this->data);
		$this->load->view('theme/footer', $this->data);
	}

}
