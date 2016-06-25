<?php

class Contact extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('contact_model');
		$this->load->model('reseaux_sociaux_model');
		$this->load->model('entreprise_model');

		$this->data['entreprise'] = $this->entreprise_model->lister_entreprise();
		$this->data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();
		$this->data['produits'] = $this->produit_model->lister_produit();
	}
	
	public function index()
	{
		$this->data['titre'] = 'Contact';
		$this->data['sous_titre'] = 'Comment pouvons-nous vous renseigner ?';
		$this->data['succes'] = $this->session->flashdata('succes');
		$this->data['error'] = $this->session->flashdata('error');

		$this->load->view('theme/header', $this->data);
		$this->load->view('contact/accueil', $this->data);
		$this->load->view('theme/footer', $this->data);
	}

	public function envoyer_email()
	{
		$email_entreprise = $this->data['entreprise'][0]['email'];
		$email = $this->input->post('email');
		$objet = $this->input->post('objet');
		$message = $this->input->post('message');
		$data['message'] = nl2br(htmlentities($message));
		$data['objet'] = htmlentities($objet);
		$data['nom'] = $this->input->post('nom');
		$body = $this->load->view('contact/template', $data, TRUE);

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('objet', 'objet', 'required');
		$this->form_validation->set_rules('message', 'message', 'required');

		if ($this->form_validation->run() === FALSE )
		{
			$error = validation_errors();
			
			$this->index();
			return false;
		}

		$config = Array(
				'protocol' 	=> 'smtp',
				'smtp_host' => 'ssl://smtp.orange.fr',
				'smtp_port' => 465,
				'smtp_user' => 'w.west@orange.fr',
				'smtp_pass' => 'yoda02',
				'mailtype' 	=> 'html',
				'charset' 	=> 'iso-8859-1',
				'wordwrap' 	=> TRUE
		);

		$this->load->library('email', $config);

		$this->email->set_newline("\r\n");
		$this->email->from($email);
		$this->email->to($email_entreprise);
		$this->email->subject($objet);
		$this->email->message($body);

		if($this->email->send())
		{
			$this->session->set_flashdata('succes','<p>L\'email à bien était envoyé</p>');
			redirect("contact");
		}

		else
		{
			$this->session->set_flashdata('error','<p>Une erreur s\'est produite lors de l\'envoie de l\'email</p>');
			redirect("contact");
		}
	}

}