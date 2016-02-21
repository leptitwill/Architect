<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produits_model extends CI_Model
{
	protected $table = 'produits';

	public function lister_produit()
	{
		$query = $this->db->get('produits');
                return $query->result_array();
	}

	public function ajouter_produit($nom, $description, $couverture)
	{
		$this->db->set('nom',  $nom);
		$this->db->set('description',   $description);
		$this->db->set('couverture',   $couverture);
		$this->db->set('dateAjout', 'NOW()', false);
		$this->db->set('dateModification', 'NOW()', false);
		
		return $this->db->insert($this->table);
	}
}