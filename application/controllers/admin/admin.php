<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('membre_model');

		$this->id = $this->session->userdata('idMembre');
		$this->data['membre'] = $this->membre_model->selectionner_membre($this->id);
	}
	
	public function index()
	{
		if (!$this->session->userdata('idMembre'))
		{
			redirect("admin/connexion");
		}

		else
		{
			redirect("admin/accueil");
		}
	}

	public function connexion()
	{
		$data['titre'] = 'Conceptcub - faite moi rêvé ....';
		$data['attributs'] = array('class' => 'connexion_form');
		$data['error'] = $this->session->flashdata('error');

		$this->load->view('admin/connexion', $data);
	}

	public function accueil()
	{
		$this->data['titre'] = 'Conceptcub - faite moi rêvé ....';

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('admin/accueil', $this->data);
	}

	public function login()
	{
		$email = $this->input->post('email');
		$mdp = $this->input->post('mdp');

		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('mdp', 'mdp', 'required');

		$result = $this->membre_model->login($email,$mdp);

		if ($this->form_validation->run() === FALSE )
		{
			$data['error'] = '';

			$this->session->set_flashdata('error','<p>Merci de remplir tous les champs</p>');
			redirect("admin/connexion");
		}

		elseif ($this->form_validation->run() == true && empty($result))
		{
			$this->session->set_flashdata('error', '<p>Adresse email ou mot de passe incorrect</p>');
			redirect('admin/connexion');
		}
		
		else
		{
			$this->session->set_userdata('idMembre', $result[0]['idMembre']);
			$this->session->set_flashdata('error', '<p>bravo</p>');

			redirect('admin');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('admin');
	}

}