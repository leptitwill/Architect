<?php

class mentions extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('mentions_model');

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
		$this->data['titre'] = 'Modifier les mentions légales';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['mentions'] = $this->mentions_model->lister_mentions();
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('mentions/modifier', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function update()
	{
		$mentions = $this->input->post('mentions');

		$this->form_validation->set_rules('mentions', 'mentions', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			
			$this->index();
		}

		else
		{
			$this->mentions_model->modifier_mentions($mentions);

			$this->session->set_flashdata('succes','<p>Les mentions légales ont bien était modifié</p>');
			redirect("admin/mentions");
		}
	}
}