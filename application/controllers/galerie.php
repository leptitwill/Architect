<?php

class Galerie extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('galerie_model');
	}
	
	public function index()
	{
		$data['titre'] = 'Les galeries Conceptcub';
		$data['galeries'] = $this->galerie_model->lister_galerie();
		$data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header', $data);
		$this->load->view('galerie/accueil', $data);
		$this->load->view('theme/footer', $data);
	}

	public function creer()
	{
		$data['titre'] = 'Ajouter une nouvelle galerie';
		$data['attributs'] = array('class' => 'creer');
		$data['error'] = '';
		$data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header', $data);
		$this->load->view('galerie/creer', $data);
		$this->load->view('theme/footer');
	}

	public function modifier($id)
	{
		$data['titre'] = 'Modifier une galerie';
		$data['attributs'] = array('class' => 'creer');
		$data['galerie'] = $this->galerie_model->selectionner_galerie($id);
		$data['error'] = '';
		$data['succes'] = '';

		$this->load->view('theme/header', $data);
		$this->load->view('galerie/modifier', $data);
		$this->load->view('theme/footer');
	}

	public function supprimer($id)
	{
		$this->galerie_model->supprimer_galerie($id);

		$this->session->set_flashdata('succes','<p>La galerie à bien était supprimé</p>');
		redirect("galerie");
	}

	public function upload()
	{
		$data['titre'] = 'Ajouter une nouvelle galerie';
		$data['attributs'] = array('class' => 'creer');

		$nom = $this->input->post('nom');
		$image = $nom;
		$image = $this->supprimer_accent($image);

		$config['upload_path'] = './assets/img/galerie';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = strtolower($image);
		$config['max_size']    = '9000';
		$config['max_width']  = '6000';
		$config['max_height']  = '5000';
		$config['min_width']  = '1920';
		$config['min_height']  = '500';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$data['error'] = '';
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('galerie/creer', $data);
			$this->load->view('theme/footer');
		}

		elseif ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('galerie/creer', $data);
			$this->load->view('theme/footer');
		}

		else
		{
			$data = $this->upload->data();
			$this->redimensionner($data);
			$this->recadrer($data);

			$photo_profil = $data['file_name'];

			$this->membre_model->ajouter_membre($nom, $prenom, $email, $role, $description, $mot_de_passe, $profil, $photo_profil);

			$this->session->set_flashdata('succes','<p>Le membre à bien était ajouté</p>');
			redirect("membre");
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

			$this->load->view('theme/header', $data);
			$this->load->view('membre/modifier', $data);
			$this->load->view('theme/footer');
		}

		elseif ($fichier_envoye != "" && ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('membre/modifier', $data);
			$this->load->view('theme/footer');
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
			redirect("membre");
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