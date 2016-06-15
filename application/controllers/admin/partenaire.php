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
		$this->data['titre'] = 'Gestion des partenaires';
		$this->data['partenaires'] = $this->partenaire_model->lister_partenaire();
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('partenaire/accueil', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function creer()
	{
		$this->data['titre'] = 'Ajouter un nouveau partenaire';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');


		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('partenaire/creer', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function modifier($id)
	{
		$this->data['titre'] = 'Modifier un partenaire';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['partenaire'] = $this->partenaire_model->selectionner_partenaire($id);
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('partenaire/modifier', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function supprimer($id)
	{
		$this->partenaire_model->supprimer_partenaire($id);

		$this->session->set_flashdata('succes','<p>Le partenaire à bien était supprimé</p>');
		redirect("admin/partenaire");
	}

	public function upload()
	{
		$nom = $this->input->post('nom');
		$type = $this->input->post('type');
		$nom_logo = $this->supprimer_accent($nom);

		$config['upload_path'] = './assets/img/partenaire';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = strtolower($nom_logo);
		$config['min_width']  = '100';
		$config['min_height']  = '40';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('type', 'domaine d\'activité', 'required');
		$this->form_validation->set_rules('nom', 'nom', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/partenaire/creer");
		}

		elseif ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/partenaire/creer");
		}

		else
		{
			$data = $this->upload->data();
			$this->redimensionner($data);

			$logo = $data['file_name'];

			$this->partenaire_model->ajouter_partenaire($nom, $logo, $type);

			$this->session->set_flashdata('succes','<p>Le partenaire à bien était ajouté</p>');
			redirect("admin/partenaire");
		}
	}

	public function update($id)
	{
		$partenaire = $this->partenaire_model->selectionner_partenaire($id);

		$nom = $this->input->post('nom');
		$type = $this->input->post('type');
		$nom_logo = $this->supprimer_accent($nom);
		$fichier_envoye = $_FILES['userfile']['name'];

		$config['upload_path'] = './assets/img/partenaire';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = strtolower($nom_logo);
		$config['min_width']  = '100';
		$config['min_height']  = '40';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('type', 'type', 'required');
		$this->form_validation->set_rules('nom', 'nom', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/partenaire/modifier/$id");
		}

		elseif ($fichier_envoye != "" && ! $this->upload->do_upload())
		{
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/partenaire/modifier/$id");
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

			$this->partenaire_model->modifier_partenaire($id, $nom, $logo, $type);

			$this->session->set_flashdata('succes','<p>Le partenaire à bien était modifié</p>');
			redirect("admin/partenaire");
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