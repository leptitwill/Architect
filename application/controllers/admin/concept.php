<?php

class Concept extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('produit_model');
		$this->load->model('membre_model');
		$this->load->model('concept_model');

		$this->id = $this->session->userdata('idMembre');
		$this->data['utilisateur'] = $this->membre_model->selectionner_membre($this->id);

		if (!$this->session->userdata('idMembre'))
		{
			redirect("admin/connexion");
		}
	}

	public function index()
	{
		$this->data['titre'] = 'Gestion de la page concept';

		$this->data['avantages'] = $this->concept_model->lister_avantages();

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('concept/accueil-admin', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}
}
