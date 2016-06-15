<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Solution_model extends CI_Model
{
	protected $table = 'solution';
	protected $table_produit = 'produit';
	protected $table_produit_has_solution = 'produit_has_solution';

	public function lister_solution()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function lister_solution_par_id($id)
	{
		$this->db->select('s.*');
		$this->db->join('produit_has_solution ps', 'ps.solution_idSolution = s.idSolution', 'inner');
		$this->db->join('produit p', 'ps.produit_idProduit = p.idProduit', 'inner');
		$this->db->where('p.idProduit', $id);
		$this->db->where('s.estSupprime', 0);
		$query = $this->db->get($this->table.' s');

		return $query->result_array();
	}

	public function selectionner_solution($id)
	{
		$this->db->where('idSolution',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_produit_par_solution_par_id($id)
	{
		$this->db->select('p.idProduit, p.nom');
		$this->db->join('produit_has_solution ps', 'ps.produit_idProduit = p.idProduit', 'inner');
		$this->db->join('solution s', 'ps.solution_idsolution = s.idSolution', 'inner');
		$this->db->where('s.idSolution', $id);
		$query = $this->db->get($this->table_produit.' p');

		return $query->result_array();
	}

	public function ajouter_solution($nom, $description, $icone)
	{
		$this->db->set('nom',  $nom);
		$this->db->set('description',  $description);
		$this->db->set('icone',  $icone);
		
		return $this->db->insert($this->table);
	}

	public function modifier_solution($id, $nom, $description, $icone)
	{
		$data = array(
					'nom' => $nom,
					'description' => $description,
					'icone' => $icone,
				);

		$this->db->where('idSolution',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_solution($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idSolution',$id);
		$this->db->update($this->table,  $data);
	}

	public function desassocierProduit($id)
	{
		$this->db->where('produit_idProduit',$id);
		$this->db->delete($this->table_produit_has_solution);
	}

	public function associerProduit($idProduit, $idSolution)
	{
		$this->db->set('produit_idProduit',  $idProduit);
		$this->db->set('solution_idSolution', $idSolution);
		
		return $this->db->insert($this->table_produit_has_solution);
	}
}