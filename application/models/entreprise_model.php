<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entreprise_model extends CI_Model
{
	protected $table = 'entreprise';

	public function lister_entreprise()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function modifier_entreprise($email, $telephone1, $telephone2, $adresse, $code_postal, $ville, $pays, $horaire)
	{
		$data = array(
					'email' => $email,
					'telephone1' => $telephone1,
					'telephone2' => $telephone2,
					'adresse' => $adresse,
					'codePostal' => $code_postal,
					'ville' => $ville,
					'pays' => $pays,
					'horaire' => $horaire
				);

		$this->db->update($this->table,  $data);
	}
}