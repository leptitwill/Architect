<?php

class Galerie extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		ini_set('memory_limit', '256M');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('galerie_model');
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
		$this->data['titre'] = 'Gestion des galeries';
		$this->data['galeries'] = $this->galerie_model->lister_galerie();
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('galerie/accueil', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function creer()
	{
		$this->data['titre'] = 'Ajouter un nouveau réseau social';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');


		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('galerie/creer', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function modifier($id)
	{
		$this->data['titre'] = 'Modifier une galerie';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['galerie'] = $this->galerie_model->selectionner_galerie($id);
		$this->data['images'] = $this->galerie_model->selectionner_image_par_galerie($id);
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('galerie/modifier', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function supprimer($id)
	{
		$this->galerie_model->supprimer_galerie($id);

		$this->session->set_flashdata('succes','<p>Le réseau social à bien était supprimé</p>');
		redirect("admin/galerie");
	}

	public function upload()
	{
		$nom = $this->input->post('nom');
		$image = $this->input->post('image');
		$nom_image = str_replace("-","_",$nom);
		$nom_image = $this->supprimer_accent($nom);

		$config['upload_path'] = './assets/img/galerie';
		$config['allowed_types'] = 'svg|gif|png|jpg';
		$config['file_name'] = strtolower($nom_image);
		$config['min_width']  = '1920';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('image', 'image', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/galerie/creer");
		}

		elseif ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/galerie/creer");
		}

		else
		{
			$data = $this->upload->data();
			$this->redimensionner($data);

			$logo = $data['file_name'];

			$this->galerie_model->ajouter_galerie($nom, $lien, $logo);

			$this->session->set_flashdata('succes','<p>Le reseau social à bien était ajouté</p>');
			redirect("admin/galerie");
		}
	}

	public function update($id)
	{
		$nom = $this->input->post('nom');
		$image = $this->input->post('image');
		$nom_image = str_replace("-","_",$nom);
		$nom_image = $this->supprimer_accent($nom);
		$idGalerie = $id;

		$config['upload_path'] = './assets/img/galerie';
		$config['allowed_types'] = 'svg|gif|png|jpg';
		$config['file_name'] = strtolower($nom_image);
		$config['min_width']  = '1920';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->modifier($id);
		}

		elseif (! $this->upload->do_upload('image'))
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			$this->modifier($id);
		}

		else
		{
			$data = $this->upload->data();
			$this->redimensionner($data);
			
			$image = $data['file_name'];

			$this->galerie_model->ajouter_image($image);

			$this->data['image'] = $this->galerie_model->selectionner_image($image);
			$idImage = $this->data['image'][0]['idImage'];

			$this->galerie_model->associer_image($idGalerie, $idImage);

			$this->session->set_flashdata('succes','<p>L\'image à bien été ajouté</p>');
			redirect("admin/modifier($id)");
		}
	}

	function redimensionner($data)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] =$data['full_path'];
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 1920;
		$config['quality'] = 70;
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