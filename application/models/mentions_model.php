<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mentions_model extends CI_Model
{
	protected $table = 'mentions';

	public function lister_mentions()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function modifier_mentions($mentions)
	{
		$data = array(
					'contenu' => $mentions,
				);

		$this->db->update($this->table,  $data);
	}
}