<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produit_model extends CI_Model
{
	protected $table = 'produit';
	protected $table_avantage = 'avantage';
	protected $table_solution = 'solution';

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
		$this->db->select('g.*');
		$this->db->join('produit p', 'g.produit_idProduit = p.idProduit', 'inner');
		$this->db->where('p.url',$url);
		$query = $this->db->get('gamme g');

		return $query->result_array();
	}

	public function selectionner_gamme_par_produit_par_id($id)
	{
		$this->db->select('g.*');
		$this->db->join('produit p', 'g.produit_idProduit = p.idProduit', 'inner');
		$this->db->where('p.idProduit',$id);
		$query = $this->db->get('gamme g');

		return $query->result_array();
	}

	public function selectionner_avantage_par_produit($url)
	{
		$this->db->select('a.*');
		$this->db->join('produit_has_avantage pa', 'pa.avantage_idAvantage = a.idAvantage', 'inner');
		$this->db->join('produit p', 'pa.produit_idProduit = p.idProduit', 'inner');
		$this->db->where('p.url', $url);
		$query = $this->db->get($this->table_avantage.' a');

		return $query->result_array();
	}

	public function selectionner_avantage_par_produit_par_id($id)
	{
		$this->db->select('a.*');
		$this->db->join('produit_has_avantage pa', 'pa.avantage_idAvantage = a.idAvantage', 'inner');
		$this->db->join('produit p', 'pa.produit_idProduit = p.idProduit', 'inner');
		$this->db->where('p.idProduit', $id);
		$query = $this->db->get($this->table_avantage.' a');

		return $query->result_array();
	}

	public function selectionner_solution_par_produit($url)
	{
		$this->db->select('s.*');
		$this->db->join('produit_has_solution ps', 'ps.solution_idsolution = s.idsolution', 'inner');
		$this->db->join('produit p', 'ps.produit_idProduit = p.idProduit', 'inner');
		$this->db->where('p.url', $url);
		$query = $this->db->get($this->table_solution.' s');

		return $query->result_array();
	}

	public function selectionner_solution_par_produit_par_id($id)
	{
		$this->db->select('s.*');
		$this->db->join('produit_has_solution ps', 'ps.solution_idsolution = s.idsolution', 'inner');
		$this->db->join('produit p', 'ps.produit_idProduit = p.idProduit', 'inner');
		$this->db->where('p.idProduit', $id);
		$query = $this->db->get($this->table_solution.' s');

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