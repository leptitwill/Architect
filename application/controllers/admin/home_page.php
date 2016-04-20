<?php

class Home_page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('produit_model');
		$this->load->model('membre_model');

		$this->id = $this->session->userdata('idMembre');
		$this->data['utilisateur'] = $this->membre_model->selectionner_membre($this->id);

		if (!$this->session->userdata('idMembre'))
		{
			redirect("admin/connexion");
		}
	}
	
	public function index()
	{
		$this->data['titre'] = 'Gestion de la page d\'accueil';
		$this->data['produits'] = $this->produit_model->lister_produit();
		$this->data['membres'] = $this->membre_model->lister_membre();

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('accueil-admin', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

}