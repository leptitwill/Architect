<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gamme_model extends CI_Model
{
	protected $table = 'gamme';

	public function lister_gamme()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
        return $query->result_array();
	}

	public function lister_gamme_par_id($id)
	{
		$this->db->where('estSupprime', 0);
		$this->db->where('produit_idProduit',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_gamme($url)
	{
		$this->db->where('url',$url);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_gamme_par_id($id)
	{
		$this->db->where('idGamme',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_gamme($nom, $description, $couverture, $miniature, $specification, $url, $produit)
	{
		$this->db->set('nom', $nom);
		$this->db->set('description', $description);
		$this->db->set('couverture', $couverture);
		$this->db->set('miniature', $miniature);
		$this->db->set('specification', $specification);
		$this->db->set('url', $url);
		$this->db->set('produit_idProduit', $produit);
		$this->db->set('dateAjout', 'NOW()', false);
		$this->db->set('dateModification', 'NOW()', false);
		
		return $this->db->insert($this->table);
	}

	public function modifier_gamme($id, $nom, $description, $couverture, $miniature, $specification, $url, $produit)
	{
		$data = array(
					'nom' => $nom,
					'description' => $description,
					'couverture' => $couverture,
					'miniature' => $miniature,
					'specification' => $specification,
					'url' => $url,
					'produit_idProduit' => $produit,
					'dateModification' => 'NOW()'
				);

		$this->db->where('idGamme',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_gamme($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idGamme',$id);
		$this->db->update($this->table,  $data);
	}
}