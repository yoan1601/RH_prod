<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Realisation_model
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

class Realisation_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function inserer($data, $imgs_pub) {
    try {
      $this->db->trans_begin();
      $this->db->insert('achievements', $data);
      $last_inserted_id = $this->db->insert_id();
      foreach ($imgs_pub as $key => $image) {
        $data_img = [
          'idAchievement' => $last_inserted_id,
          'image' => $image
        ];
        $this->db->insert('achievements_images', $data_img);
      }
      $this->db->trans_commit();
    } catch (Exception $ex) {
      $this->db->trans_rollback();
        // echo $ex;
        throw $ex;
    }
  
  }

public function getById($id = 1) {
  $this->db->where('id', $id); 
  $query = $this->db->get("v_realisations");
  $tab = json_decode(json_encode($query->result()), true);
  return $tab[0];
}

public function get_all_images($id){
  $this->db->where('idAchievement', $id);
  $this->db->order_by('id', 'ASC');
  $query = $this->db->get('achievements_images');
  return $query->result();
}

public function setAllImages_oneAchievement($achievement) {
  $this->db->where('idAchievement', $achievement['id']);
  $achievement['images'] = json_decode(json_encode($this->db->get("achievements_images")->result()), true);
  return $achievement;
}

public function setAllImages($achievements) {
  foreach ($achievements as $key => $a) {
    $this->db->where('idAchievement', $a['id']);
    $a['images'] = json_decode(json_encode($this->db->get("achievements_images")), true);
  }
}  

public function search($numero_page = 1,$nombre_resultat_affiche = 3, $keyword = '', $year = ''){
      $year = trim($year);
      $keyword = trim($keyword);
      $calcul_limite = ($numero_page-1)*$nombre_resultat_affiche;
      $this->db->limit($nombre_resultat_affiche,$calcul_limite);
      if ($year != ''){
        $this->db->where("annee_demarrage", $year);
      }
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
      $query = $this->db->get('v_realisations');
      return $query->result();
  }

  public function all_resultat_search($keyword = '', $year = ''){
    $year = trim($year);
    $keyword = trim($keyword);
    if ($year != ''){
      $this->db->where("annee_demarrage", $year);
    }
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
    $query = $this->db->get('v_realisations');
    return $query->result();
  }

  public function get_all_column_text(){
    $query = $this->db->query("SHOW COLUMNS FROM v_realisations WHERE Type = 'text'");
    return $query->result();
  }

  public function findAllPagination($numero_page,$nombre_resultat_affiche){
    $calcul_limite = ($numero_page-1)*$nombre_resultat_affiche;
    $this->db->limit($nombre_resultat_affiche,$calcul_limite);
    // $this->db->order_by("id");
    $this->db->where('etat >', 0);
    $query = $this->db->get("v_realisations");
    return $query->result();
  }

  public function getNombrePage($nombre_resultat_affiche = 2){
    $this->db->where('etat >', 0);
    $query = $this->db->get('v_realisations');
    $rows = count(($query->result()));
    return ceil($rows/$nombre_resultat_affiche);
  }

  public function getNombrePageSearch($nbResultat_total, $nombre_resultat_affiche = 2){
    $rows = $nbResultat_total;
    return ceil($rows/$nombre_resultat_affiche);
  }
  
  public function delete($id){
    $this->db->where('id', $id);
    $this->db->update('achievements',[
      "etat" => 0
    ]);
  }


  public function findAll(){
    $this->db->where('etat >', 0);
    $query = $this->db->get("v_realisations");
    return $query->result();
  }

  public function getAllYears() {
    $this->db->where('etat >', 0);
    $query = $this->db->get("v_realisations_all_year");
    return $query->result();
  }

  public function index()
  {
    // 
  }

  public function findAllPays(){
    // $this->db->where('etat >', 0);
    $query = $this->db->get("pays");
    return $query->result();
  }

  public function find_all_pays($motcle){
    $this->db->limit(5);
    $motcle = trim($motcle);
    if ($motcle != ''){
      $this->db->like('nom_FR', $motcle, 'after');
      $this->db->or_like('nom_EN', $motcle, 'after');
    }
    $query = $this->db->get("pays");
    return $query->result();
  }

  // ------------------------------------------------------------------------

}

/* End of file Realisation_model.php */
/* Location: ./application/models/Realisation_model.php */