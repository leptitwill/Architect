<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model
{
	protected $table = 'article';

	public function lister_article($limit = NULL)
	{
		$this->db->where('estSupprime', 0);
		$this->db->order_by('date', 'DESC');
		$query = $this->db->get($this->table, $limit);
        return $query->result_array();
	}

	public function selectionner_article($url)
	{
		$this->db->where('url',$url);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_article_par_id($id)
	{
		$this->db->where('idProduit',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function ajouter_article($nom, $description, $couverture, $url)
	{
		$this->db->set('nom', $nom);
		$this->db->set('contenu', $contenu);
		$this->db->set('couverture', $couverture);
		$this->db->set('url', $url);
		$this->db->set('date', date(d-M-Y));

		return $this->db->insert($this->table);
	}

	public function modifier_article($id, $nom, $contenu, $couverture, $url)
	{
		$data = array(
					'nom' => $nom,
					'contenu' => $contenu,
					'couverture' => $couverture,
					'url' => $url,
				);

		$this->db->where('idArticle',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_article($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idproduit',$id);
		$this->db->update($this->table,  $data);
	}
}
