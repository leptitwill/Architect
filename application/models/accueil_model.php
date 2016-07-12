<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accueil_model extends CI_Model
{
	protected $table = 'accueil';
	protected $table_email = 'email_client';

	public function contenu_accueil()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function modifier_accueil($id, $contenu)
	{
		$data = array(
			$id => $contenu
		);

		$this->db->update($this->table,  $data);
	}

	public function ajouter_email($email)
	{
		$this->db->set('email', $email);
		
		return $this->db->insert($this->table_email);
	}

}