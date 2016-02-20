<?php

class Produits extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data = array();
		$data['pseudo'] = 'Arthur';
		$data['email'] = 'email@ndd.fr';
		$data['en_ligne'] = true;
		$data['titre_page'] = 'Nos produits';

		$this->load->view('themes/header', $data);
		$this->load->view('produits/accueil', $data);
		$this->load->view('themes/footer', $data);
	}

	public function studioDeJardin()
	{
		$this->load->view('produits/studio-jardin');
	}

	public function bureauDeJardin()
	{
		$this->load->view('produits/bureau-jardin');
	}
}