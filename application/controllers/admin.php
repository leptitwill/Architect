<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('membre_model');
	}
	
	public function index()
	{
		$data['titre'] = 'Conceptcub - faite moi rêvé ....';
		$data['titre_page'] = 'Notre concept de pièce à vivre';
		$data['attributs'] = array('class' => 'connexion_form');
		$data['succes'] = $this->session->flashdata('succes');
		$data['error'] = $this->session->flashdata('error');

		$this->load->view('admin/connexion', $data);
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
			redirect("admin");
		}

		elseif ($this->form_validation->run() == true && empty($result))
		{
			$this->session->set_flashdata('error', '<p>Adresse email ou mot de passe incorrect</p>');
			redirect('admin');
		}
		
		else
		{
			$this->session->set_flashdata('error', '<p>bravo</p>');
			redirect('admin');        
		}
	}

}