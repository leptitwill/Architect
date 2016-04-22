<?php

class faq extends CI_Controller
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
		$this->load->view('faq/accueil', $this->data);
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
		$data['faq'] = $this->faq_model->selectionner_faq($id);

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

	function redimensionner($data)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] =$data['full_path'];
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 200;
		$config['height'] = 200;
		if ($data["image_height"] >= $data["image_width"]) {
			$config['master_dim'] = 'width';
		} else {
			$config['master_dim'] = 'height';
		}
		$config['quality'] = 100;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}

	function recadrer($data)
	{
		$dimensions = getimagesize($data['full_path']);
		$config['image_library'] = 'gd2';
		$config['source_image'] =$data['full_path'];
		$config['maintain_ratio'] = FALSE;
		$config['width'] = 200;
		$config['height'] = 200;
		$config['quality'] = 100;
		$config['x_axis'] = ($dimensions[0] / 2) - (200 / 2);
		$config['y_axis'] = ($dimensions[1] / 2) - (200 / 2);
		$this->image_lib->initialize($config);
		$this->image_lib->crop();
	}


	function supprimer_accent($mot)
	{
		$url = $mot;
		$url = preg_replace('#Ç#', 'C', $url);
		$url = preg_replace('#ç#', 'c', $url);
		$url = preg_replace('#è|é|ê|ë#', 'e', $url);
		$url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
		$url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
		$url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
		$url = preg_replace('#ì|í|î|ï#', 'i', $url);
		$url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
		$url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
		$url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
		$url = preg_replace('#ù|ú|û|ü#', 'u', $url);
		$url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
		$url = preg_replace('#ý|ÿ#', 'y', $url);
		$url = preg_replace('#Ý#', 'Y', $url);
		 
		return ($url);
	}
}