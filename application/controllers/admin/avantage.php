<?php

class Avantage extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('avantage_model');
		$this->load->model('membre_model');

		$this->id = $this->session->userdata('idMembre');
		$this->data['utilisateur'] = $this->membre_model->selectionner_membre($this->id);

		if (!$this->session->userdata('idMembre'))
		{
			redirect("admin/connexion");
		}
	}
	
	public function index($id = NULL)
	{
		if ($id == NULL)
		{
			$this->data['titre'] = 'Gestion des avantages';
			$this->data['avantages'] = $this->avantage_model->lister_avantage();
			$this->data['succes'] = $this->session->flashdata('succes');

			$this->load->view('theme/header-admin', $this->data);
			$this->load->view('avantage/accueil', $this->data);
			$this->load->view('theme/footer-admin', $this->data);
		}

		else
		{
			$this->data['titre'] = 'Gestion des avantages';
			$this->data['avantages'] = $this->avantage_model->lister_avantage_par_id($id);
			$this->data['succes'] = $this->session->flashdata('succes');

			$this->load->view('theme/header-admin', $this->data);
			$this->load->view('avantage/accueil', $this->data);
			$this->load->view('theme/footer-admin', $this->data);
		}
	}

	public function creer()
	{
		$this->data['titre'] = 'Ajouter un nouvel avantage';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');


		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('avantage/creer', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function modifier($id)
	{
		$this->data['titre'] = 'Modifier un avantage';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['avantage'] = $this->avantage_model->selectionner_avantage($id);
		$this->data['produits'] = $this->avantage_model->selectionner_produit_par_avantage_par_id($id);
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('avantage/modifier', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function supprimer($id)
	{
		$data['avantage'] = $this->avantage_model->selectionner_avantage($id);

		$this->avantage_model->supprimer_avantage($id);

		$this->session->set_flashdata('succes','<p>L\'avantage à bien était supprimé</p>');
		redirect("admin/avantage");
	}

	public function upload()
	{
		$nom = $this->input->post('nom');
		$description = $this->input->post('description');
		$nom_logo = $this->supprimer_accent($nom);

		$config['upload_path'] = './assets/img/avantage';
		$config['allowed_types'] = 'svg|gif|jpg|png';
		$config['file_name'] = strtolower($nom_logo);
		$config['min_height']  = '50';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/avantage/creer");
		}

		elseif ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/avantage/creer");
		}

		else
		{
			$data = $this->upload->data();
			$this->redimensionner($data);

			$icone = $data['file_name'];

			$this->avantage_model->ajouter_avantage($nom, $description, $icone);

			$this->session->set_flashdata('succes','<p>L\'avantage à bien était ajouté</p>');
			redirect("admin/avantage");
		}
	}

	public function update($id)
	{
		$avantage = $this->avantage_model->selectionner_avantage($id);

		$nom = $this->input->post('nom');
		$description = $this->input->post('description');
		$nom_logo = $this->supprimer_accent($nom);
		$fichier_envoye = $_FILES['userfile']['name'];

		$config['upload_path'] = './assets/img/avantage';
		$config['allowed_types'] = 'svg|gif|jpg|png';
		$config['file_name'] = strtolower($nom_logo);
		$config['min_height']  = '50';
		$config['overwrite']  = TRUE;

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/avantage/modifier/$id");
		}

		elseif ($fichier_envoye != "" && ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/avantage/modifier/$id");
		}

		else
		{
			if ($fichier_envoye != "")
			{
				$data = $this->upload->data();
				$this->redimensionner($data);

				$icone = $data['file_name'];
			}

			else 
			{
				$icone = $avantage[0]['icone'];
			}

			$this->avantage_model->modifier_avantage($id, $nom, $description, $icone);

			$this->session->set_flashdata('succes','<p>L\'avantage à bien était modifié</p>');
			redirect("admin/avantage");
		}
	}

	function redimensionner($data)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] =$data['full_path'];
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 50;
		$config['master_dim'] = 'height';
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