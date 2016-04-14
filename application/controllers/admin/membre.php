<?php

class Membre extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('membre_model');
		$this->load->model('profil_model');

		$this->id = $this->session->userdata('idMembre');
		$this->data['membre'] = $this->membre_model->selectionner_membre($this->id);
	}
	
	public function index()
	{
		$this->data['titre'] = 'Gestion des membres';
		$this->data['membres'] = $this->membre_model->lister_membre();
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('membre/accueil', $this->data);
	}

	public function creer()
	{
		$this->data['titre'] = 'Ajouter un nouveau membre';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['profils'] = $this->profil_model->lister_profil();
		$this->data['error'] = '';
		$this->data['succes'] = $this->session->flashdata('succes');


		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('membre/creer', $this->data);
	}

	public function modifier($id)
	{
		$data['titre'] = 'Modifier un membre';
		$data['attributs'] = array('class' => 'creer');
		$data['profils'] = $this->profil_model->lister_profil();
		$data['membre'] = $this->membre_model->selectionner_membre($id);
		$data['error'] = '';
		$data['succes'] = '';

		$this->load->view('theme/header-admin', $data);
		$this->load->view('membre/modifier', $data);
	}

	public function supprimer($id)
	{
		$data['membre'] = $this->membre_model->selectionner_membre($id);

		$this->membre_model->supprimer_membre($id);

		$this->session->set_flashdata('succes','<p>Le membre à bien était supprimé</p>');
		redirect("membre");
	}

	public function upload()
	{
		$data['titre'] = 'Ajouter un nouveau membre';
		$data['attributs'] = array('class' => 'creer');
		$data['profils'] = $this->profil_model->lister_profil();

		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$email = $this->input->post('email');
		$role = $this->input->post('role');
		$description = $this->input->post('description');
		$mot_de_passe = $this->input->post('mot_de_passe');
		$profil = (int)$this->input->post('profil');
		$photo = $nom . '_' . $prenom;
		$nom_photo = $this->supprimer_accent($photo);

		$config['upload_path'] = './assets/img/membre';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = strtolower($nom_photo);
		$config['max_size']    = '3000';
		$config['max_width']  = '3000';
		$config['max_height']  = '5000';
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
			$data['error'] = '';
			$data['succes'] = '';

			$this->load->view('theme/header-admin', $data);
			$this->load->view('membre/creer', $data);;
		}

		elseif ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['succes'] = '';

			$this->load->view('theme/header-admin', $data);
			$this->load->view('membre/creer', $data);;
		}

		else
		{
			$data = $this->upload->data();
			$this->redimensionner($data);
			$this->recadrer($data);

			$photo_profil = $data['file_name'];

			$this->membre_model->ajouter_membre($nom, $prenom, $email, $role, $description, $mot_de_passe, $profil, $photo_profil);

			$this->session->set_flashdata('succes','<p>Le membre à bien était ajouté</p>');
			redirect("admin/membre");
		}
	}

	public function update($id)
	{
		$data['titre'] = 'Ajouter un nouveau membre';
		$data['attributs'] = array('class' => 'creer');
		$data['profils'] = $this->profil_model->lister_profil();
		$membre = $this->membre_model->selectionner_membre($id);


		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$email = $this->input->post('email');
		$role = $this->input->post('role');
		$description = $this->input->post('description');
		$mot_de_passe = $this->input->post('mot_de_passe');
		$profil = (int)$this->input->post('profil');
		$photo = $nom . '_' . $prenom;
		$nom_photo = $this->supprimer_accent($photo);
		$fichier_envoye = $_FILES['userfile']['name'];

		$config['upload_path'] = './assets/img/membre';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = strtolower($nom_photo);
		$config['max_size']    = '3000';
		$config['max_width']  = '3000';
		$config['max_height']  = '5000';
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
			$data['error'] = '';
			$data['succes'] = '';

			$this->load->view('theme/header-admin', $data);
			$this->load->view('membre/modifier', $data);;
		}

		elseif ($fichier_envoye != "" && ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['succes'] = '';

			$this->load->view('theme/header-admin', $data);
			$this->load->view('membre/modifier', $data);;
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