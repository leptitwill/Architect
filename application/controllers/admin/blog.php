<?php

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('blog_model');
		$this->load->model('membre_model');

		$this->id = $this->session->userdata('idMembre');
		$this->data['utilisateur'] = $this->membre_model->selectionner_membre($this->id);

		if (!$this->session->userdata('idMembre'))
		{
			redirect("admin/connexion");
		}
	}

	public function index()
	{
		$this->data['titre'] = 'Gestion des articles';
		$this->data['articles'] = $this->blog_model->lister_article();
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('blog/accueil-admin', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function creer()
	{
		$this->data['titre'] = 'Ajouter un nouveau article';
		$this->data['attributs'] = array('class' => 'creer');
		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('blog/creer', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function modifier($id)
	{
		$this->data['titre'] = 'Modifier un article';
		$this->data['attributs'] = array('class' => 'creer');

		$this->data['article'] = $this->blog_model->selectionner_article_par_id($id);

		$this->data['error'] = $this->session->flashdata('error');
		$this->data['succes'] = $this->session->flashdata('succes');

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('blog/modifier', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function supprimer($id)
	{
		$this->blog_model->supprimer_article($id);

		$this->session->set_flashdata('succes','<p>L’article à bien était supprimé</p>');
		redirect("admin/blog");
	}

	public function upload()
	{
		$date = date("Y-m-d");
		$nom = $this->input->post('nom');
		$contenu = $_POST['contenu'];
		$auteur = $this->data['utilisateur']['0']['prenom'] . ' ' . $this->data['utilisateur']['0']['nom'];
		$url = str_replace(" ","-",$nom);
		$url = str_replace("'","-",$url);
		$url = strtolower($url);
		$url = $this->supprimer_accent($url);
		$nom_image = str_replace("-","_",$url);
		$nom_image = $this->supprimer_accent($nom_image);

		$config['upload_path'] = './assets/img/blog';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $nom_image;
		$config['min_width']  = '1920';
		$config['min_height']  = '400';

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('contenu', 'contenu', 'required');

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

			$this->blog_model->ajouter_article($nom, $contenu, $couverture, $url, $auteur, $date);

			$this->session->set_flashdata('succes','<p>L\'article à bien était ajouté</p>');
			redirect("admin/blog");
		}
	}

	public function update($id)
	{
		$article = $this->blog_model->selectionner_article_par_id($id);

		$nom = $this->input->post('nom');
		$contenu = $this->input->post('contenu');
		$url = str_replace(" ","-",$nom);
		$url = str_replace("'","-",$url);
		$url = strtolower($url);
		$url = $this->supprimer_accent($url);
		$nom_image = str_replace("-","_",$url);
		$nom_image = $this->supprimer_accent($nom_image);
		$fichier_envoye = $_FILES['userfile']['name'];

		$config['upload_path'] = './assets/img/blog';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $nom_image;
		$config['min_width']  = '1920';
		$config['min_height']  = '400';
		$config['overwrite']  = TRUE;

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('contenu', 'contenu', 'required');

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
				$couverture = $article[0]['couverture'];
			}

			$this->blog_model->modifier_article($id, $nom, $contenu, $couverture, $url);

			$this->session->set_flashdata('succes','<p>L\'article à bien était modifié</p>');
			redirect("admin/blog");
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
