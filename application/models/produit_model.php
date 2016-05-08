<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produit_model extends CI_Model
{
	protected $table = 'produit';

	public function lister_produit()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
        return $query->result_array();
	}

	public function selectionner_produit($url)
	{
		$this->db->where('url',$url);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_produit_par_id($id)
	{
		$this->db->where('idProduit',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_gamme_par_produit($url)
	{
		$this->db->select('idProduit');
		$this->db->where('url', $url);
		$query = $this->db->get($this->table);

		$result = $query->row();
		$id = $result->idProduit;

		$this->db->select('gamme.nom, gamme.miniature, gamme.url');
		$this->db->join('produit', 'gamme.produit_idProduit = produit.idProduit', 'left');
		$this->db->where('produit.idProduit',$id);
		$query = $this->db->get('gamme');

		return $query->result_array();
	}

	public function ajouter_produit($nom, $description, $couverture, $titre, $sous_titre, $url)
	{
		$this->db->set('nom', $nom);
		$this->db->set('description', $description);
		$this->db->set('couverture', $couverture);
		$this->db->set('titre', $titre);
		$this->db->set('sousTitre', $sous_titre);
		$this->db->set('url', $url);
		$this->db->set('dateAjout', 'NOW()', false);
		$this->db->set('dateModification', 'NOW()', false);
		
		return $this->db->insert($this->table);
	}

	public function modifier_produit($id, $nom, $description, $couverture, $titre, $sous_titre, $url)
	{
		$data = array(
					'nom' => $nom,
					'description' => $description,
					'couverture' => $couverture,
					'titre' => $titre,
					'sousTitre' => $sous_titre,
					'url' => $url,
				);

		$this->db->where('idproduit',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_produit($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idproduit',$id);
		$this->db->update($this->table,  $data);
	}
}