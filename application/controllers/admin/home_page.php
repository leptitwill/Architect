<?php

class Home_page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('produit_model');
		$this->load->model('membre_model');
		$this->load->model('accueil_model');
		$this->load->model('avantage_model');
		$this->load->model('reseaux_sociaux_model');
		$this->load->model('galerie_model');
		$this->load->model('avis_model');

		$this->data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();

		$this->id = $this->session->userdata('idMembre');
		$this->data['utilisateur'] = $this->membre_model->selectionner_membre($this->id);

		if (!$this->session->userdata('idMembre'))
		{
			redirect("admin/connexion");
		}
	}
	
	public function index()
	{
		$this->data['titre'] = 'Gestion de la page d\'accueil';
		$this->data['produits'] = $this->produit_model->lister_produit();
		$this->data['avantages'] = $this->avantage_model->lister_avantage();
		$this->data['membres'] = $this->membre_model->lister_membre();
		$this->data['accueil'] = $this->accueil_model->contenu_accueil();
		$idGalerie = $this->data['accueil'][0]['galerie_idGalerie'];
		$this->data['images'] = $this->galerie_model->selectionner_image_par_galerie($idGalerie);
		$this->data['avis_clients'] = $this->avis_model->lister_avis();

		$this->load->view('theme/header-admin', $this->data);
		$this->load->view('accueil-admin', $this->data);
		$this->load->view('theme/footer-admin', $this->data);
	}

	public function modifier()
	{
		$id = $_POST['id'];
		$contenu = $_POST['contenu'];
		
		$this->accueil_model->modifier_accueil($id, $contenu);

		return $ok = TRUE;
	}

}