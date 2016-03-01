<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produit_model extends CI_Model
{
	protected $table = 'produit';

	public function lister_produit()
	{
		$query = $this->db->get($this->table);
                return $query->result_array();
	}

	public function selectionner_produit($url)
	{
		$this->db->where('url',$url);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_produit($nom, $description, $couverture, $url)
	{
		$this->db->set('nom', $nom);
		$this->db->set('description', $description);
		$this->db->set('couverture', $couverture);
		$this->db->set('url', $url);
		$this->db->set('dateAjout', 'NOW()', false);
		$this->db->set('dateModification', 'NOW()', false);
		
		return $this->db->insert($this->table);
	}
}