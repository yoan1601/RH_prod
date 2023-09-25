<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Contact_model
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

class Contact_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
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
    $query = $this->db->get('contacts');
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
    $query = $this->db->get('contacts');
    return $query->result();
  }

  public function findAllPagination($numero_page,$nombre_resultat_affiche){
    $calcul_limite = ($numero_page-1)*$nombre_resultat_affiche;
    $this->db->where('etat >', 0);
    $this->db->limit($nombre_resultat_affiche,$calcul_limite);
    $this->db->order_by("date_creation", "desc");
    $query = $this->db->get("contacts");
    return $query->result();
  }

  public function getNombrePage($nombre_resultat_affiche = 2){
    $this->db->where('etat >', 0);
    $query = $this->db->get('contacts');
    $rows = count(($query->result()));
    return ceil($rows/$nombre_resultat_affiche);
  }

  public function getNombrePageSearch($nbResultat_total, $nombre_resultat_affiche = 2){
    $rows = $nbResultat_total;
    return ceil($rows/$nombre_resultat_affiche);
  }
  public function get_all_column_text(){
    $query = $this->db->query("SHOW COLUMNS FROM contacts WHERE Type = 'text'");
    return $query->result();
  }

  public function delete($id){
    $this->db->where('id', $id);
    $this->db->update('contacts',[
      "etat" => 0
    ]);
  }


  public function insert($contact, $message, $email){
    $this->db->insert('contacts',[
      "contact" => $contact,
      "message" => $message,
      "email" => $email
    ]);
  }


  public function findAll(){
    $this->db->where('etat >', 0);
    $query = $this->db->get('contacts');
    return $query->result();
  }

  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file Contact_model.php */
/* Location: ./application/models/Contact_model.php */