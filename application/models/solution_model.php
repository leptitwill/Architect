<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Solution_model extends CI_Model
{
	protected $table = 'solution';

	public function lister_solution()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_solution($id)
	{
		$this->db->where('idSolution',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_solution($nom, $description, $icone)
	{
		$this->db->set('nom',  $nom);
		$this->db->set('description',  $description);
		$this->db->set('icone',  $icone);
		$this->db->set('dateAjout', 'NOW()', false);
		
		return $this->db->insert($this->table);
	}

	public function modifier_solution($id, $nom, $description, $icone)
	{
		$data = array(
					'nom' => $nom,
					'description' => $description,
					'icone' => $icone,
				);

		$this->db->where('idSolution',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_solution($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idSolution',$id);
		$this->db->update($this->table,  $data);
	}
}