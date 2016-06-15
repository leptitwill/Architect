<?php

class Avis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('avis_model');

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
		$this->data['titre'] = 'Gestion des avis';
		$this->data['avis_clients'] = $this->avis_model->lister_avis();
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('avis/accueil-admin', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function creer()
	{
		$this->data['titre'] = 'Ajouter un nouvel avis';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');


		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('avis/creer', $this->data);
		$this->load->view('theme/footer-admin');
	}

	public function modifier($id)
	{
		$this->data['titre'] = 'Modifier un avis';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['avis_client'] = $this->avis_model->selectionner_avis($id);
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('avis/modifier', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function supprimer($id)
	{
		$this->avis_model->supprimer_avis($id);

		$this->session->set_flashdata('succes','<p>L\'avis à bien était supprimé</p>');
		redirect("admin/avis");
	}

	public function upload()
	{
		$message = $this->input->post('message');
		$auteur = $this->input->post('auteur');

		$this->form_validation->set_rules('message', 'message', 'required');
		$this->form_validation->set_rules('auteur', 'auteur', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/avis/creer");
		}

		else
		{
			$this->avis_model->ajouter_avis($message, $auteur);

			$this->session->set_flashdata('succes','<p>L\'avis à bien était ajouté</p>');
			redirect("admin/avis");
		}
	}

	public function update($id)
	{
		$auteur = $this->input->post('auteur');
		$message = $this->input->post('message');
		$message = str_replace( "\n", '<br />', $message ); 

		$this->form_validation->set_rules('auteur', 'auteur', 'required');
		$this->form_validation->set_rules('message', 'message', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/avis/creer");
		}

		else
		{
			$this->avis_model->modifier_avis($id, $message, $auteur);

			$this->session->set_flashdata('succes','<p>L\'avis à bien était modifié</p>');
			redirect("admin/avis");
		}
	}
}