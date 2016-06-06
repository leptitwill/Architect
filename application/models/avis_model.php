<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avis_model extends CI_Model
{
	protected $table = 'avis';

	public function lister_avis()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_avis($id)
	{
		$this->db->where('idAvis',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_avis($message, $auteur)
	{
		$this->db->set('message',  $message);
		$this->db->set('auteur',  $auteur);
		$this->db->set('dateAjout', 'NOW()', false);
		
		return $this->db->insert($this->table);
	}

	public function modifier_avis($id, $message, $auteur)
	{
		$data = array(
					'message' => $message,
					'auteur' => $auteur,
				);

		$this->db->where('idAvis',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_avis($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idAvis',$id);
		$this->db->update($this->table,  $data);
	}
}