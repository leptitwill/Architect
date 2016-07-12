<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_client_model extends CI_Model
{
	protected $table = 'email_client';

	public function lister_emails_clients()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
}