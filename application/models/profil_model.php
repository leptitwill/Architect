<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil_model extends CI_Model
{
	protected $table = 'profil';

	public function lister_profil()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_profil($nom, $description, $couverture)
	{
		$this->db->set('nom',  $nom);
		$this->db->set('description',   $description);
		$this->db->set('couverture',   $couverture);
		$this->db->set('dateAjout', 'NOW()', false);
		$this->db->set('dateModification', 'NOW()', false);
		
		return $this->db->insert($this->table);
	}
}