<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Devis_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Espace_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }


  public function search($numero_page = 1,$nombre_resultat_affiche = 3, $keyword = '',$idUser = 1){
    $this->db->where('etat >', 0);
    $this->db->where('idUser ', $idUser);
    $keyword = trim($keyword);
    $calcul_limite = ($numero_page-1)*$nombre_resultat_affiche;
    $this->db->limit($nombre_resultat_affiche,$calcul_limite);
    $columns = $this->get_all_column_text();
    $i = 0;
    if ($keyword != ''){
      $this->db->group_start(); 
      foreach($columns as $column){
        if ($i == 0){
          $this->db->like($column->Field, $keyword, 'both');
        }
        else{
          $this->db->or_like($column->Field, $keyword, 'both');
        }
        $i+=1;
      }
      $this->db->group_end(); 
    }
    $query = $this->db->get('v_devis');
    return $query->result();
}

  public function all_resultat_search($keyword = '',$idUser = 1){
    $keyword = trim($keyword);
    $columns = $this->get_all_column_text();
    $i = 0;
    if ($keyword != ''){
      $this->db->group_start(); 
      foreach($columns as $column){
        if ($i == 0){
          $this->db->like($column->Field, $keyword, 'both');
        }
        else{
          $this->db->or_like($column->Field, $keyword, 'both');
        }
        $i+=1;
      }
      $this->db->group_end(); 
    }
    $this->db->where('etat >', 0);
    $this->db->where('idUser ', $idUser);
    $query = $this->db->get('v_devis');
    return $query->result();
  }

  public function findAllPagination($numero_page,$nombre_resultat_affiche,$idUser = 1){
    $calcul_limite = ($numero_page-1)*$nombre_resultat_affiche;
    $this->db->where('etat >', 0);
    $this->db->where('idUser ', $idUser);
    $this->db->limit($nombre_resultat_affiche,$calcul_limite);
    $this->db->order_by("date_creation", "desc");
    $query = $this->db->get("v_devis");
    return $query->result();
  }

  public function getNombrePage($nombre_resultat_affiche = 2, $idUser = 1){
    $this->db->where('etat >', 0);
    $this->db->where('idUser ', $idUser);
    $query = $this->db->get('v_devis');
    $rows = count(($query->result()));
    return ceil($rows/$nombre_resultat_affiche);
  }

  public function getNombrePageSearch($nbResultat_total, $nombre_resultat_affiche = 2){
    $rows = $nbResultat_total;
    return ceil($rows/$nombre_resultat_affiche);
  }
  public function get_all_column_text(){
    $query = $this->db->query("SHOW COLUMNS FROM v_devis WHERE Type = 'text'");
    return $query->result();
  }

  public function delete($id){
    $this->db->where('id', $id);
    $this->db->update('v_devis',[
      "etat" => 0
    ]);
  }

  public function insert($idUser,$type_projet, $description_projet, $montant){
    $this->db->insert('v_devis',[
      "idUser" => $idUser,
      "type_projet" => $type_projet,
      "description_projet" => $description_projet,
      "montant_estime" => $montant
    ]);
  }


  public function findAll($idUser = 1){
    $this->db->where('etat >', 0);
    $this->db->where('idUser ', $idUser);
    $this->db->order_by('date_creation','desc');
    $query = $this->db->get('v_devis');
    return $query->result();
  }

  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file v_Devis_model.php */
/* Location: ./application/models/Devis_model.php */