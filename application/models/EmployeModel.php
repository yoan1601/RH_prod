<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmployeModel extends CI_Model {
    public function getAnneeEmbauche($idEmploye){
        $query="select date_contrat_essai as date_embauche from v_contrat_essai_info_employes where id_employe=%s";
        $query=sprintf($query, $idEmploye);
        $query=$this->db->query($query);
        $query=$query->row();
        return $query->date_embauche;
    }
} ?>