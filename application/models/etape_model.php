<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etape_model extends CI_Model
{
	protected $table = 'etape';

	public function lister_etape()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_etape($id)
	{
		$this->db->where('idEtape',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_etape($titre, $contenu)
	{
		$this->db->set('titre',  $titre);
		$this->db->set('contenu',  $contenu);

		return $this->db->insert($this->table);
	}

	public function modifier_etape($id, $titre, $contenu)
	{
		$data = array(
					'titre' => $titre,
					'contenu' => $contenu,
				);

		$this->db->where('idEtape',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_etape($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idEtape',$id);
		$this->db->update($this->table,  $data);
	}
}
