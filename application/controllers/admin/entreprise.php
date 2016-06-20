<?php

class Entreprise extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('entreprise_model');

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
		$this->data['titre'] = 'Modifier les informations de l\'entreprise';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['entreprise'] = $this->entreprise_model->lister_entreprise();
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('entreprise/modifier', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function update()
	{
		$email = $this->input->post('email');
		$telephone1 = $this->input->post('telephone1');
		$telephone2 = $this->input->post('telephone2');
		$adresse = $this->input->post('adresse');
		$code_postal = $this->input->post('code_postal');
		$ville = $this->input->post('ville');
		$pays = $this->input->post('pays');
		$horaire = $this->input->post('horaire');

		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('telephone1', 'telephone 1', 'required');
		$this->form_validation->set_rules('telephone2', 'telephone 2', 'required');
		$this->form_validation->set_rules('adresse', 'adresse', 'required');
		$this->form_validation->set_rules('code_postal', 'code postal', 'required');
		$this->form_validation->set_rules('ville', 'ville', 'required');
		$this->form_validation->set_rules('pays', 'pays', 'required');
		$this->form_validation->set_rules('horaire', 'horaire', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			
			$this->index();
		}

		else
		{
			$this->entreprise_model->modifier_entreprise($email, $telephone1, $telephone2, $adresse, $code_postal, $ville, $pays, $horaire);

			$this->session->set_flashdata('succes','<p>Les informations de l\'entreprise à bien était modifié</p>');
			redirect("admin/entreprise");
		}
	}
}