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
	}
	
	public function index($url = NULL)
	{
		if ($url == NULL)
		{
			$data['titre'] = 'Les gammes conceptcub';
			$data['gammes'] = $this->gamme_model->lister_gamme();
			$data['succes'] = $this->session->flashdata('succes');

			$this->load->view('theme/header', $data);
			$this->load->view('gamme/accueil', $data);
			$this->load->view('theme/footer', $data);
		}

		else
		{
			$data['gamme'] = $this->gamme_model->selectionner_gamme($url);
			$data['titre'] = str_replace("-"," ",$url); ;

			$this->load->view('theme/header', $data);
			$this->load->view('gamme/modele', $data);
			$this->load->view('theme/footer', $data);
		}
	}

	public function creer()
	{
		$data['titre'] = 'Ajouter une nouvelle gamme';
		$data['attributs'] = array('class' => 'creer');
		$data['produits'] = $this->produit_model->lister_produit();
		$data['error'] = '';
		$data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header', $data);
		$this->load->view('gamme/creer', $data);
		$this->load->view('theme/footer');
	}

	public function modifier($id)
	{
		$data['titre'] = 'Modifier une gamme';
		$data['attributs'] = array('class' => 'creer');
		$data['gamme'] = $this->gamme_model->selectionner_gamme_par_id($id);
		$data['error'] = '';
		$data['succes'] = '';

		$this->load->view('theme/header', $data);
		$this->load->view('gamme/modifier', $data);
		$this->load->view('theme/footer');
	}

	public function supprimer($id)
	{
		$data['gamme'] = $this->gamme_model->selectionner_gamme_par_id($id);

		$this->gamme_model->supprimer_gamme($id);

		$this->session->set_flashdata('succes','<p>La gamme à bien était supprimé</p>');
		redirect("gamme");
	}

	public function upload()
	{
		$data['titre'] = 'Ajouter une gamme !';
		$data['attributs'] = array('class' => 'creer');

		$nom = $this->input->post('nom');
		$description = $this->input->post('description');
		$specification = $this->input->post('specification');
		$produit = (int)$this->input->post('produit');
		$url = str_replace(" ","-",$nom);
		$url = strtolower($url);
		$nom_image = str_replace("-","_",$url);
		$nom_image = $this->supprimer_accent($nom_image);

		$config['upload_path'] = './assets/img/gamme';
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
		$this->form_validation->set_rules('specification', 'specification', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$data['error'] = '';
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('gamme/creer', $data);
			$this->load->view('theme/footer');
		}

		elseif ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('gamme/creer', $data);
			$this->load->view('theme/footer');
		}

		else
		{
			$data = $this->upload->data();
			$this->redimensionner($data);
			$this->recadrer($data);

			$couverture = $data['file_name'];
			$miniature = $data['raw_name'] . '_miniature' . $data['file_ext'];

			$this->gamme_model->ajouter_gamme($nom, $description, $couverture, $miniature, $specification, $url, $produit);

			$this->session->set_flashdata('succes','<p>Le gamme à bien était ajouté</p>');
			redirect("gamme");
		}
	}

	public function update($id)
	{
		$data['titre'] = 'Ajouter un nouveau gamme';
		$data['attributs'] = array('class' => 'creer');
		$gamme = $this->gamme_model->selectionner_gamme_par_id($id);


		$nom = $this->input->post('nom');
		$description = $this->input->post('description');
		$url = str_replace(" ","-",$nom);
		$url = strtolower($url);
		$nom_image = str_replace("-","_",$url);
		$nom_image = $this->supprimer_accent($nom_image);
		$fichier_envoye = $_FILES['userfile']['name'];

		$config['upload_path'] = './assets/img/gamme';
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
			$data['error'] = '';
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('gamme/modifier', $data);
			$this->load->view('theme/footer');
		}

		elseif ($fichier_envoye != "" && ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$data['succes'] = '';

			$this->load->view('theme/header', $data);
			$this->load->view('gamme/modifier', $data);
			$this->load->view('theme/footer');
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
				$couverture = $gamme[0]['couverture'];
			}

			$this->gamme_model->modifier_gamme($id, $nom, $description, $couverture, $url);

			$this->session->set_flashdata('succes','<p>Le gamme à bien était modifié</p>');
			redirect("gamme");
		}
	}

	function redimensionner($data)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] =$data['full_path'];
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 1920;
		$config['quality'] = 100;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

	function recadrer($data)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] =$data['full_path'];
		$config['create_thumb'] = TRUE;
		$config['thumb_marker'] = '_miniature';
		if ($data["image_height"] >= $data["image_width"]) {
			$config['master_dim'] = 'width';
		} else {
			$config['master_dim'] = 'height';
		}
		$config['width'] = 400;
		$config['height'] = 400;
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