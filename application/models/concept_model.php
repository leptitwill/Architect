<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Concept_model extends CI_Model
{
	protected $table = 'concept';

	public function lister_concept()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function modifier_concept($introduction)
	{
		$data = array(
					'introduction' => $introduction,
				);

		$this->db->update($this->table,  $data);
	}
}