<?php

class Membre extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('encrypt');

		$this->load->model('membre_model');
		$this->load->model('profil_model');

		$this->id = $this->session->userdata('idMembre');
		$this->data['utilisateur'] = $this->membre_model->selectionner_membre($this->id);

		if (!$this->session->userdata('idMembre'))
		{
			redirect("admin/connexion");
		}
	}
	
	public function index()
	{
		$this->data['titre'] = 'Gestion des membres';
		$this->data['membres'] = $this->membre_model->lister_membre();
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('membre/accueil', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function creer()
	{
		$this->data['titre'] = 'Ajouter un nouveau membre';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['profils'] = $this->profil_model->lister_profil();
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');


		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('membre/creer', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function modifier($id)
	{
		$this->data['titre'] = 'Modifier un membre';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['profils'] = $this->profil_model->lister_profil();
		$this->data['membre'] = $this->membre_model->selectionner_membre($id);
		$this->data['error'] = '';
		$this->data['succes'] = '';

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('membre/modifier', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function supprimer($id)
	{
		$data['membre'] = $this->membre_model->selectionner_membre($id);

		$this->membre_model->supprimer_membre($id);

		$this->session->set_flashdata('succes','<p>Le membre à bien était supprimé</p>');
		redirect("admin/membre");
	}

	public function upload()
	{
		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$email = $this->input->post('email');
		$role = $this->input->post('role');
		$description = $this->input->post('description');
		$mdp = $this->input->post('mot_de_passe');
		$profil = (int)$this->input->post('profil');
		$photo = $nom . '_' . $prenom;
		$nom_photo = $this->supprimer_accent($photo);

		$config['upload_path'] = './assets/img/membre';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = strtolower($nom_photo);
		$config['min_width']  = '200';
		$config['min_height']  = '200';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('prenom', 'prenom', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('role', 'role', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('mot_de_passe', 'mot de passe', 'required');
		$this->form_validation->set_rules('profil', 'profil', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/membre/creer");
		}

		elseif ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/membre/creer");
		}

		else
		{
			$data = $this->upload->data();
			$this->redimensionner($data);
			$this->recadrer($data);

			$photo_profil = $data['file_name'];

			$mot_de_passe = sha1($mdp);

			$this->membre_model->ajouter_membre($nom, $prenom, $email, $role, $description, $mot_de_passe, $profil, $photo_profil);

			$this->session->set_flashdata('succes','<p>Le membre à bien était ajouté</p>');
			redirect("admin/membre");
		}
	}

	public function update($id)
	{
		$membre = $this->membre_model->selectionner_membre($id);

		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$email = $this->input->post('email');
		$role = $this->input->post('role');
		$description = $this->input->post('description');
		$mdp = $this->input->post('mot_de_passe');
		$profil = (int)$this->input->post('profil');
		$photo = $nom . '_' . $prenom;
		$nom_photo = $this->supprimer_accent($photo);
		$fichier_envoye = $_FILES['userfile']['name'];

		$config['upload_path'] = './assets/img/membre';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = strtolower($nom_photo);
		$config['min_width']  = '200';
		$config['min_height']  = '200';
		$config['overwrite']  = TRUE;

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('prenom', 'prenom', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('role', 'role', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('mot_de_passe', 'mot de passe', 'required');
		$this->form_validation->set_rules('profil', 'profil', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/membre/modifier/$id");
		}

		elseif ($fichier_envoye != "" && ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			redirect("admin/membre/modifier/$id");
		}

		else
		{
			if ($fichier_envoye != "")
			{
				$data = $this->upload->data();
				$this->redimensionner($data);
				$this->recadrer($data);

				$photo_profil = $data['file_name'];
			}

			else 
			{
				$photo_profil = $membre[0]['photo'];
			}

			if ($mdp != $membre[0]['motDePasse'])
			{
				$mot_de_passe = sha1($mdp);
			}

			else 
			{
				$mot_de_passe = $membre[0]['motDePasse'];
			}

			$this->membre_model->modifier_membre($id, $nom, $prenom, $email, $role, $description, $mot_de_passe, $profil, $photo_profil);

			$this->session->set_flashdata('succes','<p>Le membre à bien était modifié</p>');
			redirect("admin/membre");
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