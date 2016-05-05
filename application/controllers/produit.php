<?php

class Produit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('produit_model');$this->load->model('membre_model');
		$this->load->model('reseaux_sociaux_model');

		$this->data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();
	}
	
	public function index($url = NULL)
	{
		if ($url == NULL)
		{
			$this->data['titre'] = 'Les produits conceptcub';
			$this->data['produits'] = $this->produit_model->lister_produit();
			$this->data['succes'] = $this->session->flashdata('succes');

			$this->load->view('theme/header', $this->data);
			$this->load->view('produit/accueil', $this->data);
			$this->load->view('theme/footer', $this->data);
		}

		else
		{
			$this->data['produit'] = $this->produit_model->selectionner_produit($url);
			$this->data['gammes'] = $this->produit_model->selectionner_gamme_par_produit($url);
			$this->data['titre'] = str_replace("-"," ",$url);

			$this->load->view('theme/header', $this->data);
			$this->load->view('produit/modele', $this->data);
			$this->load->view('theme/footer', $this->data);
		}
	}

	public function creer()
	{
		if(!$this->session->userdata('idMembre')) redirect('gamme');
		$this->data['titre'] = 'Ajouter un nouveau produit';
		$this->data['attributs'] = array('class' => 'creer');
		$id = $this->session->userdata('idMembre');
		$this->data['membre'] = $this->membre_model->selectionner_membre($id);
		$this->data['error'] = '';
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('produit/creer', $this->data);
	}

	public function modifier($id)
	{
		$this->data['titre'] = 'Modifier un produit';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['produit'] = $this->produit_model->selectionner_produit_par_id($id);
		$this->data['error'] = '';
		$this->data['succes'] = '';

		$this->load->view('theme/header', $this->data);
		$this->load->view('produit/modifier', $this->data);
		$this->load->view('theme/footer');
	}

	public function supprimer($id)
	{
		$this->data['produit'] = $this->produit_model->selectionner_produit_par_id($id);

		$this->produit_model->supprimer_produit($id);

		$this->session->set_flashdata('succes','<p>Le produit à bien était supprimé</p>');
		redirect("produit");
	}

	public function upload()
	{
		$this->data['titre'] = 'Ajouter un produit !';
		$this->data['attributs'] = array('class' => 'creer');

		$nom = $this->input->post('nom');
		$description = $this->input->post('description');
		$url = str_replace(" ","-",$nom);
		$url = strtolower($url);
		$url = $this->supprimer_accent($url);
		$nom_image = str_replace("-","_",$url);
		$nom_image = $this->supprimer_accent($nom_image);

		$config['upload_path'] = './assets/img/produit';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $nom_image;
		$config['max_size']    = '9000';
		$config['max_width']  = '3000';
		$config['max_height']  = '5000';
		$config['min_width']  = '1920';
		$config['min_height']  = '400';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$this->data['error'] = '';
			$this->data['succes'] = '';

			$this->load->view('theme/header', $this->data);
			$this->load->view('produit/creer', $this->data);
			$this->load->view('theme/footer');
		}

		elseif ( ! $this->upload->do_upload())
		{
			$this->data['error'] = $this->upload->display_errors();
			$this->data['succes'] = '';

			$this->load->view('theme/header', $this->data);
			$this->load->view('produit/creer', $this->data);
			$this->load->view('theme/footer');
		}

		else
		{
			$this->data = $this->upload->data();
			$this->redimensionner($this->data);

			$couverture = $this->data['file_name'];

			$this->produit_model->ajouter_produit($nom, $description, $couverture, $url);

			$this->session->set_flashdata('succes','<p>Le produit à bien était ajouté</p>');
			redirect("produit");
		}
	}

	public function update($id)
	{
		$this->data['titre'] = 'Ajouter un nouveau produit';
		$this->data['attributs'] = array('class' => 'creer');
		$produit = $this->produit_model->selectionner_produit_par_id($id);


		$nom = $this->input->post('nom');
		$description = $this->input->post('description');
		$url = str_replace(" ","-",$nom);
		$url = strtolower($url);
		$url = $this->supprimer_accent($url);
		$nom_image = str_replace("-","_",$url);
		$nom_image = $this->supprimer_accent($nom_image);
		$fichier_envoye = $_FILES['userfile']['name'];

		$config['upload_path'] = './assets/img/produit';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $nom_image;
		$config['max_size']    = '9000';
		$config['max_width']  = '3000';
		$config['max_height']  = '5000';
		$config['min_width']  = '1920';
		$config['min_height']  = '400';
		$config['overwrite']  = TRUE;

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$this->data['error'] = '';
			$this->data['succes'] = '';

			$this->load->view('theme/header', $this->data);
			$this->load->view('produit/modifier', $this->data);
			$this->load->view('theme/footer');
		}

		elseif ($fichier_envoye != "" && ! $this->upload->do_upload())
		{
			$this->data['error'] = $this->upload->display_errors();
			$this->data['succes'] = '';

			$this->load->view('theme/header', $this->data);
			$this->load->view('produit/modifier', $this->data);
			$this->load->view('theme/footer');
		}

		else
		{
			if ($fichier_envoye != "")
			{
				$this->data = $this->upload->data();
				$this->redimensionner($this->data);
				
				$couverture = $this->data['file_name'];
			}

			else 
			{
				$couverture = $produit[0]['couverture'];
			}

			$this->produit_model->modifier_produit($id, $nom, $description, $couverture, $url);

			$this->session->set_flashdata('succes','<p>Le produit à bien était modifié</p>');
			redirect("produit");
		}
	}

	function redimensionner($data)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] =$this->data['full_path'];
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 1920;
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