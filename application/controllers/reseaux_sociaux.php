<?php

class Reseaux_sociaux extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('reseaux_sociaux_model'); 
	}
	
	public function index()
	{
		$data['titre'] = 'Les reseaux sociaux Conceptcub';
		$data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();
		$data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header', $data);
		$this->load->view('reseaux_sociaux/accueil', $data);
		$this->load->view('theme/footer', $data);
	}

	public function creer()
	{
		$data['titre'] = 'Ajouter un nouveau reseau social';
		$data['attributs'] = array('class' => 'creer');
		$data['error'] = '';
		$data['succes'] = $this->session->flashdata('succes');


		$this->load->view('theme/header', $data);
		$this->load->view('reseaux_sociaux/creer', $data);
		$this->load->view('theme/footer');
	}

	public function modifier($id)
	{
		$data['titre'] = 'Modifier un reseau social';
		$data['attributs'] = array('class' => 'creer');
		$data['reseaux_sociaux'] = $this->reseaux_sociaux_model->selectionner_reseaux_sociaux($id);
		$data['error'] = '';
		$data['succes'] = '';

		$this->load->view('theme/header', $data);
		$this->load->view('reseaux_sociaux/modifier', $data);
		$this->load->view('theme/footer');
	}

	public function supprimer($id)
	{
		$data['reseaux_sociaux'] = $this->reseaux_sociaux_model->selectionner_reseaux_sociaux($id);

		$this->reseaux_sociaux_model->supprimer_reseaux_sociaux($id);

		$this->session->set_flashdata('succes','<p>Le reseau social à bien était supprimé</p>');
		redirect("reseaux_sociaux");
	}

	public function upload()
	{
		$data['titre'] = 'Ajouter un nouveau reseau social';
		$data['attributs'] = array('class' => 'creer');

		$nom = $this->input->post('nom');
		$lien = $this->input->post('lien');
		$nom_logo = $this->supprimer_accent($nom);

		$config['upload_path'] = './assets/img/reseaux_sociaux';
		$config['allowed_types'] = 'svg|gif|png|jpg';
		$config['file_name'] = strtolower($nom_logo);
		$config['max_size']    = '3000';
		$config['max_width']  = '3000';
		$config['max_height']  = '5000';
		$config['min_width']  = '40';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('lien', 'lien', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$data['error'] = '';
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('reseaux_sociaux/creer', $data);
			$this->load->view('theme/footer');
		}

		elseif ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('reseaux_sociaux/creer', $data);
			$this->load->view('theme/footer');
		}

		else
		{
			$data = $this->upload->data();
			$this->redimensionner($data);

			$logo = $data['file_name'];

			$this->reseaux_sociaux_model->ajouter_reseaux_sociaux($nom, $lien, $logo);

			$this->session->set_flashdata('succes','<p>Le reseau social à bien était ajouté</p>');
			redirect("reseaux_sociaux");
		}
	}

	public function update($id)
	{
		$data['titre'] = 'Mettre à jour le reseau social';
		$data['attributs'] = array('class' => 'creer');
		$reseaux_sociaux = $this->reseaux_sociaux_model->selectionner_reseaux_sociaux($id);

		$nom = $this->input->post('nom');
		$lien = $this->input->post('lien');
		$nom_logo = $this->supprimer_accent($nom);
		$fichier_envoye = $_FILES['userfile']['name'];

		$config['upload_path'] = './assets/img/reseaux_sociaux';
		$config['allowed_types'] = 'svg|gif|png|jpg';
		$config['file_name'] = strtolower($nom_logo);
		$config['max_size']    = '3000';
		$config['max_width']  = '3000';
		$config['max_height']  = '5000';
		$config['min_width']  = '40';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('lien', 'lien', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$data['error'] = '';
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('reseaux_sociaux/modifier', $data);
			$this->load->view('theme/footer');
		}

		elseif ($fichier_envoye != "" && ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('reseaux_sociaux/modifier', $data);
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
				$logo = $reseaux_sociaux[0]['logo'];
			}

			$this->reseaux_sociaux_model->modifier_reseaux_sociaux($id, $nom, $lien, $logo);

			$this->session->set_flashdata('succes','<p>Le reseau social à bien était modifié</p>');
			redirect("reseaux_sociaux");
		}
	}

	function redimensionner($data)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] =$data['full_path'];
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 40;
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