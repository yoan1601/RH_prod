<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Email_model
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

class Email_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }


  public function envoyer_email_devis2(){
    $email = 'mirijarazafimbelo30@gmail.com'; //email de hydrocamp
      $this->mail->from('contact@hydrocamp-group.com', 'HydroGroup');
      $this->mail->to($email);
      $this->mail->subject('Notification d\'une nouvelle devis');
      $titre= '<h2>Nouvelle devis de  </h2>';
      $type= '<h4>Type du projet: </h4><p></p>';
      $description='<h4>Descripiton du projet: </h4><p></p>';
      $montant ='<h4>Montant du projet: </h4><p>Ar</p>';
      $contact ='<h4>Contact du client: </h4><p></p>';
      $message = $titre . $contact . $type . $description . $montant;
      $this->mail->message($message);
      if ($this->mail->send()) {
          echo 'L\'e-mail a été envoyé avec succès.';
      } else {
          echo $this->mail->print_debugger();
          echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail.';
      }
      $this->mail->clear();
  }

  public function envoyer_email_devis($user,$type_projet, $description_projet, $montant) {
      $email = 'contact@hydrocamp-group.com'; //email de hydrocamp
      $this->mail->from('contact@hydrocamp-group.com', 'HydroCamp-Group');
      $this->mail->to($email);
      $this->mail->subject('Notification d\'une nouvelle devis');
      $titre= '<h2>Nouvelle devis de '.$user->nom . ' </h2>';
      $type= '<h4>Type du projet: </h4><p>'. $type_projet .'</p>';
      $description='<h4>Descripiton du projet: </h4><p>'. $description_projet .'</p>';
      $montant ='<h4>Montant du projet: </h4><p>'. $montant .' Ar</p>';
      $contact ='<h4>Contact du client: </h4><p>'. $user->telephone .'</p> <p>'. $user->mail.'</p>';
      $message = $titre . $contact . $type . $description . $montant;
      $this->mail->message($message);
      if ($this->mail->send()) {
          return 'success';
      } else {
          echo $this->mail->print_debugger();
          echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail.';
      }
      $this->mail->clear();
    }

  public function envoyer_email($titrefr, $titreen) {
    $emails = $this->findAll();
    foreach ($emails as $email) {
      $this->mail->from('contact@hydrocamp-group.com', 'HydroCamp-Group');
      $this->mail->to($email->mail);
      $this->mail->subject($titrefr . '/'. $titreen);
      $message= '<h2>Nouveau blog de HydroCamp </h2>';
      $message.= '<p> HydroCamp a publié un nouveau blog. </p>';
      $message.= "<a href='#'>Notre site Web</a>"; // hydrocamp lien
      $this->mail->message($message);

      // var_dump($this->mail->send());
      if ($this->mail->send()) {
          echo 'L\'e-mail a été envoyé avec succès.';
      } else {
          echo $this->mail->print_debugger();
          echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail.';
      }
      $this->mail->clear();
    }
    
    
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
    $query = $this->db->get('emails');
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
    $query = $this->db->get('emails');
    return $query->result();
  }

  public function findAllPagination($numero_page,$nombre_resultat_affiche){
    $calcul_limite = ($numero_page-1)*$nombre_resultat_affiche;
    $this->db->where('etat >', 0);
    $this->db->limit($nombre_resultat_affiche,$calcul_limite);
    $this->db->order_by("date_creation", "desc");
    $query = $this->db->get("emails");
    return $query->result();
  }

  public function getNombrePage($nombre_resultat_affiche = 2){
    $this->db->where('etat >', 0);
    $query = $this->db->get('emails');
    $rows = count(($query->result()));
    return ceil($rows/$nombre_resultat_affiche);
  }

  public function getNombrePageSearch($nbResultat_total, $nombre_resultat_affiche = 2){
    $rows = $nbResultat_total;
    return ceil($rows/$nombre_resultat_affiche);
  }
  public function get_all_column_text(){
    $query = $this->db->query("SHOW COLUMNS FROM emails WHERE Type = 'text'");
    return $query->result();
  }

  public function delete($id){
    $this->db->where('id', $id);
    $this->db->update('emails',[
      "etat" => 0
    ]);
  }


  public function findAll(){
    $this->db->where('etat >', 0);
    $query = $this->db->get('emails');
    return $query->result();
  }

  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file Email_model.php */
/* Location: ./application/models/Email_model.php */