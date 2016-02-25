<?php

class Produits extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('produits_model');  
	}
	
	public function index()
	{
		$data['titre'] = 'Les produits conceptcub';
		$data['produits'] = $this->produits_model->lister_produit();

		$this->load->view('themes/header', $data);
		$this->load->view('produits/accueil', $data);
		$this->load->view('themes/footer', $data);
	}

	public function studio_de_jardin()
	{
		$titre = 'Studio de jardin';
		$data['titre'] = $titre;

		$this->load->view('themes/header', $data);
		$this->load->view('produits/bureau-de-jardin');
		$this->load->view('themes/footer');
	}

	public function bureau_de_jardin()
	{
		$titre = 'Bureau de jardin';
		$data['titre'] = $titre;

		$this->load->view('themes/header', $data);
		$this->load->view('produits/bureau-de-jardin');
		$this->load->view('themes/footer');
	}

	public function creer()
	{
		$data['titre'] = 'Ajouter un nouveau produit';
		$data['attributs'] = array('class' => 'creer');

		$this->load->view('themes/header', $data);
		$this->load->view('produits/creer', array('error' => ' ' ));
		$this->load->view('themes/footer');
	}

	public function upload()
	{
		$data['titre'] = 'Ajouter un produit !';
		$data['attributs'] = array('class' => 'creer');

		$nom = $this->input->post('nom');
		$description = $this->input->post('description');
		$miniature_nom = str_replace("_"," ",$nom);

		$config['upload_path'] = './assets/img/produits';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = strtolower($miniature_nom);
		$config['max_size']    = '3000';
		$config['max_width']  = '3000';
		$config['max_height']  = '5000';
		$config['min_width']  = '1920';
		$config['min_height']  = '400';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$this->load->view('themes/header', $data);
			$this->load->view('produits/creer', array('error' => ' ' ));
			$this->load->view('themes/footer');
		}

		elseif ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('themes/header', $data);
			$this->load->view('produits/creer', $error);
			$this->load->view('themes/footer');
		}

		else
		{
			$data = $this->upload->data();
			$this->thumb($data);

			$couverture = $data['file_name'];

			$this->produits_model->ajouter_produit($nom, $description, $couverture);

			redirect('/produits/', 'refresh');
		}
	}

	function thumb($data)
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
}