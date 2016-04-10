<?php

class Test extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('reseaux_sociaux_model'); 
	}
	
	public function index()
	{

		$data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();

	}

}