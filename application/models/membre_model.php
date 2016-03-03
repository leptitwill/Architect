<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membre_model extends CI_Model
{
	protected $table = 'membre';

	public function lister_membre()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_membre($id)
	{
		$this->db->where('idMembre',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_membre($nom, $prenom, $role, $description, $mot_de_passe, $profil, $photo_profil)
	{
		$this->db->set('nom',  $nom);
		$this->db->set('prenom',  $prenom);
		$this->db->set('role',  $role);
		$this->db->set('description',  $description);
		$this->db->set('photo',  $photo_profil);
		$this->db->set('motDePasse',  $mot_de_passe);
		$this->db->set('profil',  $profil);
		$this->db->set('dateAjout', 'NOW()', false);
		
		return $this->db->insert($this->table);
	}
}