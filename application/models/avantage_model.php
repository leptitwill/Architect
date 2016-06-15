<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avantage_model extends CI_Model
{
	protected $table = 'avantage';
	protected $table_produit = 'produit';
	protected $table_produit_has_avantage = 'produit_has_avantage';

	public function lister_avantage()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function lister_avantage_par_id($id)
	{
		$this->db->select('a.*');
		$this->db->join('produit_has_avantage pa', 'pa.avantage_idAvantage = a.idAvantage', 'inner');
		$this->db->join('produit p', 'pa.produit_idProduit = p.idProduit', 'inner');
		$this->db->where('p.idProduit', $id);
		$this->db->where('a.estSupprime', 0);
		$query = $this->db->get($this->table.' a');

		return $query->result_array();
	}

	public function selectionner_avantage($id)
	{
		$this->db->where('idAvantage',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_produit_par_avantage_par_id($id)
	{
		$this->db->select('p.idProduit, p.nom');
		$this->db->join('produit_has_avantage pa', 'pa.produit_idProduit = p.idProduit', 'inner');
		$this->db->join('avantage a', 'pa.avantage_idAvantage = a.idAvantage', 'inner');
		$this->db->where('a.idAvantage', $id);
		$query = $this->db->get($this->table_produit.' p');

		return $query->result_array();
	}

	public function ajouter_avantage($nom, $description, $icone)
	{
		$this->db->set('nom',  $nom);
		$this->db->set('description',  $description);
		$this->db->set('icone',  $icone);
		
		return $this->db->insert($this->table);
	}

	public function modifier_avantage($id, $nom, $description, $icone)
	{
		$data = array(
					'nom' => $nom,
					'description' => $description,
					'icone' => $icone,
				);

		$this->db->where('idAvantage',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_avantage($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idAvantage',$id);
		$this->db->update($this->table,  $data);
	}

	public function desassocierProduit($id)
	{
		$this->db->where('produit_idProduit',$id);
		$this->db->delete($this->table_produit_has_avantage);
	}

	public function associerProduit($idProduit, $idAvantage)
	{
		$this->db->set('produit_idProduit',  $idProduit);
		$this->db->set('avantage_idAvantage', $idAvantage);
		
		return $this->db->insert($this->table_produit_has_avantage);
	}
}