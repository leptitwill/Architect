<?php

class Partenaire extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('partenaire_model');
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
		$this->data['titre'] = 'Les partenaires Conceptcub';
		$this->data['partenaires'] = $this->partenaire_model->lister_partenaire();
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('partenaire/accueil', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function creer()
	{
		$data['titre'] = 'Ajouter un nouveau partenaire';
		$data['attributs'] = array('class' => 'creer');
		$data['error'] = '';
		$data['succes'] = $this->session->flashdata('succes');


		$this->load->view('theme/header', $data);
		$this->load->view('partenaire/creer', $data);
		$this->load->view('theme/footer');
	}

	public function modifier($id)
	{
		$data['titre'] = 'Modifier un partenaire';
		$data['attributs'] = array('class' => 'creer');
		$data['partenaire'] = $this->partenaire_model->selectionner_partenaire($id);
		$data['error'] = '';
		$data['succes'] = '';

		$this->load->view('theme/header', $data);
		$this->load->view('partenaire/modifier', $data);
		$this->load->view('theme/footer');
	}

	public function supprimer($id)
	{
		$data['partenaire'] = $this->partenaire_model->selectionner_partenaire($id);

		$this->partenaire_model->supprimer_partenaire($id);

		$this->session->set_flashdata('succes','<p>Le partenaire à bien était supprimé</p>');
		redirect("partenaire");
	}

	public function upload()
	{
		$data['titre'] = 'Ajouter un nouveau partenaire';
		$data['attributs'] = array('class' => 'creer');

		$nom = $this->input->post('nom');
		$nom_logo = $this->supprimer_accent($nom);

		$config['upload_path'] = './assets/img/partenaire';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = strtolower($nom_logo);
		$config['max_size']    = '3000';
		$config['max_width']  = '3000';
		$config['max_height']  = '5000';
		$config['min_width']  = '100';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$data['error'] = '';
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('partenaire/creer', $data);
			$this->load->view('theme/footer');
		}

		elseif ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('partenaire/creer', $data);
			$this->load->view('theme/footer');
		}

		else
		{
			$data = $this->upload->data();
			$this->redimensionner($data);

			$logo = $data['file_name'];

			$this->partenaire_model->ajouter_partenaire($nom, $logo);

			$this->session->set_flashdata('succes','<p>Le partenaire à bien était ajouté</p>');
			redirect("partenaire");
		}
	}

	public function update($id)
	{
		$data['titre'] = 'Mettre à jour le partenaire';
		$data['attributs'] = array('class' => 'creer');
		$partenaire = $this->partenaire_model->selectionner_partenaire($id);

		$nom = $this->input->post('nom');
		$nom_logo = $this->supprimer_accent($nom);
		$fichier_envoye = $_FILES['userfile']['name'];

		$config['upload_path'] = './assets/img/partenaire';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = strtolower($nom_logo);
		$config['max_size']    = '3000';
		$config['max_width']  = '3000';
		$config['max_height']  = '5000';
		$config['min_width']  = '100';
		$config['overwrite']  = TRUE;

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$data['error'] = '';
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('partenaire/modifier', $data);
			$this->load->view('theme/footer');
		}

		elseif ($fichier_envoye != "" && ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('partenaire/modifier', $data);
			$this->load->view('theme/footer');
		}

		else
		{
			if ($fichier_envoye != "")
			{
				$data = $this->upload->data();
				$this->redimensionner($data);

				$logo = $data['file_name'];
			}

			else 
			{
				$logo = $partenaire[0]['logo'];
			}

			$this->partenaire_model->modifier_partenaire($id, $nom, $logo);

			$this->session->set_flashdata('succes','<p>Le partenaire à bien était modifié</p>');
			redirect("partenaire");
		}
	}

	function redimensionner($data)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] =$data['full_path'];
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 100;
		$config['master_dim'] = 'width';
		$config['quality'] = 100;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
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