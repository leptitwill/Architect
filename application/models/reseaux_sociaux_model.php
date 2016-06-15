<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reseaux_sociaux_model extends CI_Model
{
	protected $table = 'reseaux_sociaux';

	public function lister_reseaux_sociaux()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_reseaux_sociaux($id)
	{
		$this->db->where('idReseauxSociaux',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_reseaux_sociaux($nom, $lien, $logo)
	{
		$this->db->set('nom', $nom);
		$this->db->set('lien', $lien);
		$this->db->set('logo', $logo);
		
		return $this->db->insert($this->table);
	}

	public function modifier_reseaux_sociaux($id, $nom, $lien, $logo)
	{
		$data = array(
					'nom' => $nom,
					'lien' => $lien,
					'logo' => $logo,
				);

		$this->db->where('idReseauxSociaux',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_reseaux_sociaux($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idReseauxSociaux',$id);
		$this->db->update($this->table,  $data);
	}
}