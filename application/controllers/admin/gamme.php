<?php

class Gamme extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('gamme_model');
		$this->load->model('produit_model');
		$this->load->model('galerie_model');
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
			$this->data['titre'] = 'Gestion des gammes';
			$this->data['gammes'] = $this->gamme_model->lister_gamme();
			$this->data['succes'] = $this->session->flashdata('succes');

			$this->load->view('theme/header-admin', $this->data);
			$this->load->view('gamme/accueil', $this->data);
			$this->load->view('theme/footer-admin', $this->data);
		}

		else
		{
			$this->data['titre'] = 'Gestion des gammes';
			$this->data['gammes'] = $this->gamme_model->lister_gamme_par_id($id);
			$this->data['succes'] = $this->session->flashdata('succes');

			$this->load->view('theme/header-admin', $this->data);
			$this->load->view('gamme/accueil', $this->data);
			$this->load->view('theme/footer-admin', $this->data);
		}
	}

	public function creer()
	{
		$this->data['titre'] = 'Ajouter une nouvelle gamme';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['produits'] = $this->produit_model->lister_produit();
		$this->data['galeries'] = $this->galerie_model->lister_galerie();

		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('gamme/creer', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function modifier($id)
	{
		$this->data['titre'] = 'Modifier une gamme';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['produits'] = $this->produit_model->lister_produit();
		$this->data['galeries'] = $this->galerie_model->lister_galerie();
		$this->data['gamme'] = $this->gamme_model->selectionner_gamme_par_id($id);

		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('gamme/modifier', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function supprimer($id)
	{
		$this->gamme_model->supprimer_gamme($id);

		$this->session->set_flashdata('succes','<p>La gamme à bien était supprimé</p>');
		redirect("admin/gamme");
	}

	public function upload()
	{
		$nom = $this->input->post('nom');
		$description = $this->input->post('description');
		$atout1 = $this->input->post('atout1');
		$atout2 = $this->input->post('atout2');
		$taille = $this->input->post('taille');
		$prix = $this->input->post('prix');
		$equipement_serie = $this->input->post('equipement_serie');
		$equipement_option = $this->input->post('equipement_option');
		$produit = (int)$this->input->post('produit');
		$galerie = (int)$this->input->post('galerie');
		$url = str_replace(" ","-",$nom);
		$url = strtolower($url);
		$nom_image = str_replace("-","_",$url);
		$nom_image = $this->supprimer_accent($nom_image);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('atout1', 'premier atout', 'required');
		$this->form_validation->set_rules('atout2', 'second atout', 'required');
		$this->form_validation->set_rules('taille', 'taille', 'required');
		$this->form_validation->set_rules('prix', 'prix', 'required');
		$this->form_validation->set_rules('equipement_serie', 'équipement de série', 'required');
		$this->form_validation->set_rules('equipement_option', 'équipement en option', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			
			$this->creer();
			return false;
		}

		$config['upload_path'] = './assets/img/gamme';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $nom_image;
		$config['min_width']  = '1920';
		$config['min_height']  = '400';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('couverture'))
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			$this->creer();
			return false;
		} 

		else
		{
			$data_couverture = $this->upload->data();
		}

        $config2['upload_path'] = './assets/img/gamme';
		$config2['allowed_types'] = 'gif|jpg|png';
		$config2['file_name'] = $nom_image . '_plan';
		$config2['min_width']  = '1000';

		$this->upload->initialize($config2);

		if ( ! $this->upload->do_upload('plan'))
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			$this->creer();
			return false;
		} 

		else
		{
			$data_plan = $this->upload->data();
		}

		$this->redimensionner($data_couverture, 1920);
		$this->redimensionner($data_plan, 1000);

		$couverture = $data_couverture['file_name'];
		$plan = $data_plan['file_name'];

		$this->gamme_model->ajouter_gamme($nom, $description, $couverture, $plan, $atout1, $atout2, $taille, $prix, $equipement_serie, $equipement_option, $produit, $galerie, $url);

		$this->session->set_flashdata('succes','<p>La gamme à bien était ajouté</p>');
		redirect("admin/gamme");
	}

	public function update($id)
	{
		$gamme = $this->gamme_model->selectionner_gamme_par_id($id);

		$nom = $this->input->post('nom');
		$description = $this->input->post('description');
		$atout1 = $this->input->post('atout1');
		$atout2 = $this->input->post('atout2');
		$taille = $this->input->post('taille');
		$prix = $this->input->post('prix');
		$equipement_serie = $this->input->post('equipement_serie');
		$equipement_option = $this->input->post('equipement_option');
		$produit = (int)$this->input->post('produit');
		$galerie = (int)$this->input->post('galerie');
		$url = str_replace(" ","-",$nom);
		$url = strtolower($url);
		$nom_image = str_replace("-","_",$url);
		$nom_image = $this->supprimer_accent($nom_image);
		$fichier_couverture = $_FILES['couverture']['name'];
		$fichier_plan = $_FILES['plan']['name'];
		$fichier_pdf = $_FILES['pdf']['name'];

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('atout1', 'premier atout', 'required');
		$this->form_validation->set_rules('atout2', 'second atout', 'required');
		$this->form_validation->set_rules('taille', 'taille', 'required');
		$this->form_validation->set_rules('prix', 'prix', 'required');
		$this->form_validation->set_rules('equipement_serie', 'équipement de série', 'required');
		$this->form_validation->set_rules('equipement_option', 'équipement en option', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->modifier($id);

			return false;
		}

		$config['upload_path'] = './assets/img/gamme';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $nom_image;
		$config['min_width']  = '1920';
		$config['min_height']  = '400';
		$config['overwrite']  = TRUE;

		$this->load->library('upload', $config);

		if ($fichier_couverture != "" && ! $this->upload->do_upload('couverture'))
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			$this->modifier($id);
			return false;
		} 

		else
		{
			$data_couverture = $this->upload->data();
		}

        $config2['upload_path'] = './assets/img/gamme';
		$config2['allowed_types'] = 'gif|jpg|png';
		$config2['file_name'] = $nom_image . '_plan';
		$config2['min_width']  = '1000';
		$config2['overwrite']  = TRUE;

		$this->upload->initialize($config2);

		if ($fichier_plan != "" && ! $this->upload->do_upload('plan'))
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			$this->modifier($id);
			return false;
		} 

		else
		{
			$data_plan = $this->upload->data();
		}

		$config3['upload_path'] = './assets/img/gamme';
		$config3['allowed_types'] = 'pdf';
		$config3['file_name'] = $nom_image . '_pdf';
		$config3['overwrite']  = TRUE;

		$this->upload->initialize($config3);

		if ($fichier_pdf != "" && ! $this->upload->do_upload('pdf'))
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			$this->modifier($id);
			return false;
		} 

		else
		{
			$data_pdf = $this->upload->data();
		}

		if ($fichier_couverture != "")
		{
			$this->redimensionner($data_couverture, 1920);
			
			$couverture = $data_couverture['file_name'];
		}

		else 
		{
			$couverture = $gamme[0]['couverture'];
		}

		if ($fichier_plan != "")
		{
			$this->redimensionner($data_plan, 1920);
			
			$plan = $data_plan['file_name'];
		}

		else 
		{
			$plan = $gamme[0]['plan'];
		}

		if ($fichier_pdf != "")
		{	
			$pdf = $data_pdf['file_name'];
		}

		else 
		{
			$pdf = $gamme[0]['pdf'];
		}

		$this->gamme_model->modifier_gamme($id, $nom, $description, $couverture, $plan, $pdf, $atout1, $atout2, $taille, $prix, $equipement_serie, $equipement_option, $produit, $galerie, $url);

		$this->session->set_flashdata('succes','<p>La gamme à bien était modifié</p>');
		redirect("admin/gamme");
	}

	function redimensionner($data, $width)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = $data['full_path'];
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = $width;
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