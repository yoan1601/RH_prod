<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FichePaieModel extends CI_Model {

    public function getCategorieEmployeByIdEmploye($idEmploye) {
        $this->db->where('id_employe ',$idEmploye);
        $query = $this->db->get('v_recrutement_poste_info_employe');
        return $query->result()[0];
    }

    public function getTypeVirementById($idTypeVirement) {
        $this->db->where('id_type_virement ',$idTypeVirement);
        $query = $this->db->get('type_virements');
        return $query->result()[0];
    }

    public function getAllHsMajoration() {
        $query = $this->db->get('hs_majorations');
        return $query->result();
    }

    public function getAllTypePrime() {
        $query = $this->db->get('type_primes');
        return $query->result();
    }

    public function getAllTypeVirement() {
        $query = $this->db->get('type_virements');
        return $query->result();
    }

    public function getAllEmploye() {
        $this->db->where('etat_employe > ',0);
        $query = $this->db->get('v_recrutement_poste_info_employe_contrat_essai');
        return $query->result();
    }

    public function getEmployeById($idEmploye) {
        $this->db->where('id_employe ',$idEmploye);
        $query = $this->db->get('v_recrutement_poste_info_employe_contrat_essai');
        return $query->result()[0];
    }
}
