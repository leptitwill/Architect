<?php

class Contact extends CI_Controller
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
		$this->data['titre'] = 'Contact';
		$this->data['sous_titre'] = 'Comment pouvons-nous vous renseigner ?';
		//$this->data['contacts'] = $this->contact_model->lister_contact();
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header', $this->data);
		$this->load->view('contact/accueil', $this->data);
		$this->load->view('theme/footer', $this->data);
	}

}