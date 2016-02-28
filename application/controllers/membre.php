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
	}
	
	public function index()
	{
		$data['titre'] = 'Les membres Conceptcub';
		$data['membres'] = $this->membre_model->lister_membre();

		$this->load->view('theme/header', $data);
		$this->load->view('membre/accueil', $data);
		$this->load->view('theme/footer', $data);
	}

	public function creer()
	{
		$data['titre'] = 'Ajouter un nouveau membre';
		$data['attributs'] = array('class' => 'creer');
		$data['profils'] = $this->profil_model->lister_profil();

		$this->load->view('theme/header', $data);
		$this->load->view('membre/creer', array('error' => ' ' ));
		$this->load->view('theme/footer');
	}

	public function modifier($id)
	{
		$data['titre'] = 'Modifier un membre';
		$data['attributs'] = array('class' => 'creer');
		$data['membre'] = $this->membre_model->selectionner_membre($id);

		$this->load->view('theme/header', $data);
		$this->load->view('membre/modifier', array('error' => ' ' ));
		$this->load->view('theme/footer');
	}

	public function upload()
	{
		$data['titre'] = 'Ajouter un membre !';
		$data['attributs'] = array('class' => 'creer');

		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$role = $this->input->post('role');
		$description = $this->input->post('description');
		$mot_de_passe = $this->input->post('mot_de_passe');
		$profil = $this->input->post('profil');
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
		$this->form_validation->set_rules('role', 'role', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('mot_de_passe', 'mot_de_passe', 'required');
		$this->form_validation->set_rules('profil', 'profil', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$this->load->view('theme/header', $data);
			$this->load->view('membre/creer', array('error' => ' ' ));
			$this->load->view('theme/footer');
		}

		elseif ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('theme/header', $data);
			$this->load->view('membre/creer', $error);
			$this->load->view('theme/footer');
		}

		else
		{
			$data = $this->upload->data();
			$this->redimensionner($data);
			$this->recadrer($data);

			$photo_profil = $data['file_name'];

			$this->membre_model->ajouter_membre($nom, $prenom, $role, $description, $mot_de_passe, $profil, $photo_profil);

			redirect('/membre/', 'refresh');
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