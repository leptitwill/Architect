<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galerie_model extends CI_Model
{
	protected $table = 'galerie';

	public function lister_galerie()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_galerie($id)
	{
		$this->db->where('idMembre',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_galerie($nom)
	{
		$this->db->set('nom',  $nom);
		
		return $this->db->insert($this->table);
	}

	public function modifier_galerie($id, $nom)
	{
		$data = array(
					'nom' => $nom,
				);

		$this->db->where('idGalerie',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_galerie($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idGalerie',$id);
		$this->db->update($this->table,  $data);
	}
}