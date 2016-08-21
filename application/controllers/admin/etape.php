<?php

class Etape extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('etape_model');

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
		$this->data['titre'] = 'Gestion des étapes clées';
		$this->data['etapes'] = $this->etape_model->lister_etape();
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('etape/accueil-admin', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function creer()
	{
		$this->data['titre'] = 'Ajouter une nouvelle étape';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');


		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('etape/creer', $this->data);
		$this->load->view('theme/footer-admin');
	}

	public function modifier($id)
	{
		$this->data['titre'] = 'Modifier une étape';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['etape'] = $this->etape_model->selectionner_etape($id);
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('etape/modifier', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function supprimer($id)
	{
		$this->etape_model->supprimer_etape($id);

		$this->session->set_flashdata('succes','<p>L\'étape à bien était supprimé</p>');
		redirect("admin/etape");
	}

	public function upload()
	{
		$titre = $this->input->post('titre');
		$contenu = $this->input->post('contenu');

		$this->form_validation->set_rules('titre', 'titre', 'required');
		$this->form_validation->set_rules('contenu', 'contenu', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();

			$this->creer();
			return false;
		}

		else
		{
			$this->etape_model->ajouter_etape($titre, $contenu);

			$this->session->set_flashdata('succes','<p>L\étape à bien était ajoutée</p>');
			redirect("admin/etape");
		}
	}

	public function update($id)
	{
		$titre = $this->input->post('titre');
		$contenu = $this->input->post('contenu');

		$this->form_validation->set_rules('titre', 'titre', 'required');
		$this->form_validation->set_rules('contenu', 'contenu', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();

			$this->creer();
			return false;
		}

		else
		{
			$this->etape_model->modifier_etape($id, $titre, $contenu);

			$this->session->set_flashdata('succes','<p>L\étape à bien était modifiée</p>');
			redirect("admin/etape");
		}
	}
}
