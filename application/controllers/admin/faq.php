<?php

class Faq extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('faq_model');

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
		$this->data['titre'] = 'Gestion de la FAQ';
		$this->data['faqs'] = $this->faq_model->lister_faq();
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('faq/accueil-admin', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function creer()
	{
		$this->data['titre'] = 'Ajouter une nouvelle question';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');


		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('faq/creer', $this->data);
		$this->load->view('theme/footer-admin');
	}

	public function modifier($id)
	{
		$this->data['titre'] = 'Modifier une question';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['faq'] = $this->faq_model->selectionner_faq($id);
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('faq/modifier', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function supprimer($id)
	{
		$this->faq_model->supprimer_faq($id);

		$this->session->set_flashdata('succes','<p>La question à bien était supprimé</p>');
		redirect("admin/faq");
	}

	public function upload()
	{
		$question = $this->input->post('question');
		$reponse = $this->input->post('reponse');

		$this->form_validation->set_rules('question', 'question', 'required');
		$this->form_validation->set_rules('reponse', 'reponse', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/faq/creer");
		}

		else
		{
			$this->faq_model->ajouter_faq($question, $reponse);

			$this->session->set_flashdata('succes','<p>La question à bien était ajouté</p>');
			redirect("admin/faq");
		}
	}

	public function update($id)
	{
		$question = $this->input->post('question');
		$reponse = $this->input->post('reponse');

		$this->form_validation->set_rules('question', 'question', 'required');
		$this->form_validation->set_rules('reponse', 'reponse', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/faq/creer");
		}

		else
		{
			$this->faq_model->modifier_faq($id, $question, $reponse);

			$this->session->set_flashdata('succes','<p>La question à bien était modifié</p>');
			redirect("admin/faq");
		}
	}
}