<?php

class Email_client extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('email_client_model');

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
		$this->data['titre'] = 'Gestion des emails clients';
		$this->data['emails_clients'] = $this->email_client_model->lister_emails_clients();

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('email_client/accueil-admin', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}
}