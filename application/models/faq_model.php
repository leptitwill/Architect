<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq_model extends CI_Model
{
	protected $table = 'faq';

	public function lister_faq()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_faq($id)
	{
		$this->db->where('idFaq',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_faq($question, $reponse)
	{
		$this->db->set('question',  $question);
		$this->db->set('reponse',  $reponse);
		
		return $this->db->insert($this->table);
	}

	public function modifier_faq($id, $question, $reponse)
	{
		$data = array(
					'question' => $question,
					'reponse' => $reponse,
				);

		$this->db->where('idFaq',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_faq($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idFaq',$id);
		$this->db->update($this->table,  $data);
	}
}