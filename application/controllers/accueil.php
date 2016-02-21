<?php

class Accueil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct(); 
	}
	
	public function index()
	{
		$data['titre_page'] = 'Conceptcub $$$$Bitch$$$$';

		$this->load->view('themes/header', $data);
		$this->load->view('accueil', $data);
		$this->load->view('themes/footer', $data);
	}

}