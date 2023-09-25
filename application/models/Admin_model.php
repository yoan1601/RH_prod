<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Admin_model
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

class Admin_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function update_password($idUser, $password){
    $this->db->where('id', $idUser);
    $this->db->update('users',[
      "mot_de_passe" => md5($password)
    ]);
  }

  public function search($numero_page = 1,$nombre_resultat_affiche = 3, $keyword = ''){
    $this->db->where('etat >', 0);
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
    $this->db->where('is_admin', 11);
    $query = $this->db->get('users');
    return $query->result();
}

  public function all_resultat_search($keyword = ''){
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
    $this->db->where('is_admin', 11);
    $query = $this->db->get('users');
    return $query->result();
  }

  public function findAllPagination($numero_page,$nombre_resultat_affiche){
    $calcul_limite = ($numero_page-1)*$nombre_resultat_affiche;
    $this->db->where('etat >', 0);
    $this->db->where('is_admin', 11);
    $this->db->limit($nombre_resultat_affiche,$calcul_limite);
    $query = $this->db->get("users");
    return $query->result();
  }

  public function getNombrePage($nombre_resultat_affiche = 2){
    $this->db->where('etat >', 0);
    $this->db->where('is_admin', 11);
    $query = $this->db->get('users');
    $rows = count(($query->result()));
    return ceil($rows/$nombre_resultat_affiche);
  }

  public function getNombrePageSearch($nbResultat_total, $nombre_resultat_affiche = 2){
    $rows = $nbResultat_total;
    return ceil($rows/$nombre_resultat_affiche);
  }
  public function get_all_column_text(){
    $query = $this->db->query("SHOW COLUMNS FROM users WHERE Type = 'text'");
    return $query->result();
  }

  public function delete($id){
    $this->db->where('id', $id);
    $this->db->update('users',[
      "etat" => 0
    ]);
  }

  public function insert($nom ,$telephone, $email, $password){
    $this->db->insert('users',[
      "nom" => $nom,
      "telephone" => $telephone,
      "mail" => $email,
      "mot_de_passe" => md5($password),
      "is_admin" => 11,
      "etat"=> 1
    ]);
  }

  public function find_all_admin(){
    $this->db->where('etat >', 0);
    $this->db->where('is_admin', 11);
    $query = $this->db->get('users');
    return $query->result();
  }

  public function find_all_mails(){
    $query = $this->db->get('emails');
    return $query->result();
  }

  public function update_admin($id, $nom, $tel, $email, $mdp){
    $this->db->where('id', $id);
    $this->db->update('users', [
      'nom'=>$nom,
      'telephone'=>$tel,
      'mail' => $email,
      'mot_de_passe'=> md5($mdp) 
    ]);
  }

  

  public function check_login($email, $password){
      $this->db->where(["mail" => trim($email), "mot_de_passe" => md5($password)]);
      $this->db->where("is_admin !=", 1);
      $query = $this->db->get("users");
      if (count($query->result()) <= 0) return false;
      else return $query->result()[0];
  }


  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */