<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gamme_model extends CI_Model
{
	protected $table = 'gamme';

	public function lister_gamme()
	{
		$this->db->where('estSupprime', 0);
		$query = $this->db->get($this->table);
        return $query->result_array();
	}

	public function lister_gamme_par_id($id)
	{
		$this->db->where('estSupprime', 0);
		$this->db->where('produit_idProduit',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_gamme($url)
	{
		$this->db->where('url',$url);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_gamme_par_id($id)
	{
		$this->db->where('idGamme',$id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function selectionner_produit_par_gamme($url)
	{
		$this->db->select('p.*');
		$this->db->join('gamme g', 'p.idProduit = g.produit_idProduit', 'inner');
		$this->db->where('g.url',$url);
		$query = $this->db->get('produit p');

		return $query->result_array();
	}

	public function ajouter_gamme($nom, $description, $couverture, $plan, $atout1, $atout2, $taille, $prix, $equipement_serie, $equipement_option, $produit, $url)
	{
		$this->db->set('nom', $nom);
		$this->db->set('description', $description);
		$this->db->set('couverture', $couverture);
		$this->db->set('plan', $plan);
		$this->db->set('atout1', $atout1);
		$this->db->set('atout2', $atout2);
		$this->db->set('taille', $taille);
		$this->db->set('prix', $prix);
		$this->db->set('equipementSerie', $equipement_serie);
		$this->db->set('equipementOption', $equipement_option);
		$this->db->set('url', $url);
		$this->db->set('produit_idProduit', $produit);

		return $this->db->insert($this->table);
	}

	public function modifier_gamme($id, $nom, $description, $couverture, $plan, $pdf, $atout1, $atout2, $taille, $prix, $equipement_serie, $equipement_option, $produit, $galerie, $url)
	{
		$data = array(
					'nom' => $nom,
					'description' => $description,
					'couverture' => $couverture,
					'plan' => $plan,
					'pdf' => $pdf,
					'atout1' => $atout1,
					'atout2' => $atout2,
					'taille' => $taille,
					'prix'=> $prix,
					'equipementSerie' => $equipement_serie,
					'equipementOption' => $equipement_option,
					'url' => $url,
					'produit_idProduit' => $produit,
					'galerie_idGalerie' => $galerie
				);

		$this->db->where('idGamme',$id);
		$this->db->update($this->table,  $data);
	}

	public function supprimer_gamme($id)
	{
		$data = array(
					'estSupprime' => 1
				);

		$this->db->where('idGamme',$id);
		$this->db->update($this->table,  $data);
	}
}
