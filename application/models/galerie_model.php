<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galerie_model extends CI_Model
{
	protected $table = 'galerie';
	protected $table_image = 'image';
	protected $table_galerie_has_image = 'galerie_has_image';

	public function lister_galerie()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_galerie($id)
	{
		$this->db->where('idGalerie',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_image($nom)
	{
		$this->db->where('nom',$nom);
		$query = $this->db->get($this->table_image);
		return $query->result_array();
	}

	public function selectionner_image_par_galerie($id)
	{
		$this->db->select('i.*');
		$this->db->join('galerie_has_image gi', 'gi.image_idImage = i.idImage', 'inner');
		$this->db->join('galerie g', 'gi.galerie_idGalerie = g.idGalerie', 'inner');
		$this->db->where('g.idGalerie',$id);
		$query = $this->db->get('image i');

		return $query->result_array();
	}

	public function ajouter_galerie($nom)
	{
		$this->db->set('nom',  $nom);
		
		return $this->db->insert($this->table);
	}

	public function ajouter_image($nom)
	{
		$this->db->set('nom',  $nom);
		
		return $this->db->insert($this->table_image);
	}

	public function associer_image($idGalerie, $idImage)
	{
		$this->db->set('galerie_idGalerie',  $idGalerie);
		$this->db->set('image_idImage', $idImage);
		
		return $this->db->insert($this->table_galerie_has_image);
	}

	public function modifier_galerie($id, $nom)
	{
		$data = array(
					'nom' => $nom,
				);

		$this->db->where('idGalerie',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_galerie($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idGalerie',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_image($id)
	{
		$this->db->where('idImage',$id);
		$this->db->delete($this->table_image);
	}
}