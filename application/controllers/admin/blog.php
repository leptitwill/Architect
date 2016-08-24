<?php

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('produit_model');
		$this->load->model('membre_model');
		$this->load->model('avantage_model');
		$this->load->model('solution_model');

		$this->id = $this->session->userdata('idMembre');
		$this->data['utilisateur'] = $this->membre_model->selectionner_membre($this->id);

		if (!$this->session->userdata('idMembre'))
		{
			redirect("admin/connexion");
		}
	}

	public function index()
	{
		$this->data['titre'] = 'Gestion des produits';
		$this->data['produits'] = $this->produit_model->lister_produit();
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('produit/accueil', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function creer()
	{
		$this->data['titre'] = 'Ajouter un nouveau produit';
		$this->data['attributs'] = array('class' => 'creer');
		$id = $this->session->userdata('idMembre');
		$this->data['membre'] = $this->membre_model->selectionner_membre($id);
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('produit/creer', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function modifier($id)
	{
		$this->data['titre'] = 'Modifier un produit';
		$this->data['attributs'] = array('class' => 'creer');

		$this->data['produit'] = $this->produit_model->selectionner_produit_par_id($id);
		$this->data['gammes'] = $this->produit_model->selectionner_gamme_par_produit_par_id($id);
		$this->data['avantages'] = $this->produit_model->selectionner_avantage_par_produit_par_id($id);
		$this->data['solutions'] = $this->produit_model->selectionner_solution_par_produit_par_id($id);

		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('produit/modifier', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function supprimer($id)
	{
		$this->produit_model->supprimer_produit($id);

		$this->session->set_flashdata('succes','<p>Le produit à bien était supprimé</p>');
		redirect("admin/produit");
	}

	public function upload()
	{
		$nom = $this->input->post('nom');
		$description = $this->input->post('description');
		$titre = $this->input->post('titre');
		$sous_titre = $this->input->post('sous_titre');
		$url = str_replace(" ","-",$nom);
		$url = strtolower($url);
		$url = $this->supprimer_accent($url);
		$nom_image = str_replace("-","_",$url);
		$nom_image = $this->supprimer_accent($nom_image);

		$config['upload_path'] = './assets/img/produit';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $nom_image;
		$config['min_width']  = '1920';
		$config['min_height']  = '400';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('titre', 'titre', 'required');
		$this->form_validation->set_rules('sous_titre', 'sous titre', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();

			$this->creer();
		}

		elseif ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			$this->creer();
		}

		else
		{
			$data = $this->upload->data();
			$this->redimensionner($data);

			$couverture = $data['file_name'];

			$this->produit_model->ajouter_produit($nom, $description, $couverture, $titre, $sous_titre, $url);

			$this->session->set_flashdata('succes','<p>Le produit à bien était ajouté</p>');
			redirect("admin/produit");
		}
	}

	public function update($id)
	{
		$produit = $this->produit_model->selectionner_produit_par_id($id);

		$nom = $this->input->post('nom');
		$description = $this->input->post('description');
		$titre = $this->input->post('titre');
		$sous_titre = $this->input->post('sous_titre');
		$url = str_replace(" ","-",$nom);
		$url = strtolower($url);
		$url = $this->supprimer_accent($url);
		$nom_image = str_replace("-","_",$url);
		$nom_image = $this->supprimer_accent($nom_image);
		$fichier_envoye = $_FILES['userfile']['name'];

		$config['upload_path'] = './assets/img/produit';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $nom_image;
		$config['min_width']  = '1920';
		$config['min_height']  = '400';
		$config['overwrite']  = TRUE;

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('titre', 'titre', 'required');
		$this->form_validation->set_rules('sous_titre', 'sous titre', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->modifier($id);
		}

		elseif ($fichier_envoye != "" && ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			$this->modifier($id);
		}

		else
		{
			if ($fichier_envoye != "")
			{
				$data = $this->upload->data();
				$this->redimensionner($data);

				$couverture = $data['file_name'];
			}

			else
			{
				$couverture = $produit[0]['couverture'];
			}

			$this->produit_model->modifier_produit($id, $nom, $description, $couverture, $titre, $sous_titre, $url);

			$this->session->set_flashdata('succes','<p>Le produit à bien était modifié</p>');
			redirect("admin/produit");
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
