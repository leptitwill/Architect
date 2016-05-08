<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avantage_model extends CI_Model
{
	protected $table = 'avantage';

	public function lister_avantage()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_avantage($id)
	{
		$this->db->where('idAvantage',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_avantage($nom, $description, $icone)
	{
		$this->db->set('nom',  $nom);
		$this->db->set('description',  $description);
		$this->db->set('icone',  $icone);
		$this->db->set('dateAjout', 'NOW()', false);
		
		return $this->db->insert($this->table);
	}

	public function modifier_avantage($id, $nom, $description, $icone)
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

	public function login($email, $mdp){
		$this->db->where('email',$email);
		$this->db->where('motDePasse',$mdp);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
}