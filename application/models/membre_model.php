<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membre_model extends CI_Model
{
	protected $table = 'membre';

	public function lister_membre()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_membre($id)
	{
		$this->db->where('idMembre',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_membre($nom, $prenom, $email, $role, $description, $mot_de_passe, $profil, $photo_profil)
	{
		$this->db->set('nom',  $nom);
		$this->db->set('prenom',  $prenom);
		$this->db->set('email',  $email);
		$this->db->set('role',  $role);
		$this->db->set('description',  $description);
		$this->db->set('photo',  $photo_profil);
		$this->db->set('motDePasse',  $mot_de_passe);
		$this->db->set('profil',  $profil);
		
		return $this->db->insert($this->table);
	}

	public function modifier_membre($id, $nom, $prenom, $email, $role, $description, $mot_de_passe, $profil, $photo_profil)
	{
		$data = array(
					'nom' => $nom,
					'prenom' => $prenom,
					'email' => $email,
					'role' => $role,
					'description' => $description,
					'photo' => $photo_profil,
					'motDePasse' => $mot_de_passe,
					'profil' => $profil
				);

		$this->db->where('idMembre',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_membre($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idMembre',$id);
		$this->db->update($this->table,  $data);
	}

	public function login($email, $mdp){
		$this->db->where('email',$email);
		$this->db->where('motDePasse',$mdp);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
}