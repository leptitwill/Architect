<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Concept_model extends CI_Model
{
	protected $table = 'concept';
	protected $table_avantage = 'avantage';

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

	public function lister_avantages()
	{
		$this->db->select('a.*');
		$this->db->join('concept_has_avantage ca', 'ca.avantage_idAvantage = a.idAvantage', 'inner');
		$query = $this->db->get($this->table_avantage.' a');

		return $query->result_array();
	}
}
