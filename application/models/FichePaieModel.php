<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FichePaieModel extends CI_Model {

    public function etablir_elements_calculs($data) {
        $salaire_brut = $data['salaire_brut'];
        $data['taux_journalier'] = $salaire_brut / 30;
        $data['taux_horaire'] = $salaire_brut / 173.33;
        $data['indice'] = $data['taux_horaire'] / 1.334;
    }

    public function getLatestContratEssai($idEmploye) {
        $this->db->where('date_contrat_essai ','MAX(date_contrat_essai)');
        $this->db->where('id_employe ',$idEmploye);
        $query = $this->db->get('v_recrutement_poste_info_employe_contrat_essai');
        return $query->result()[0];
    }

    public function getLatestContratTravail($idEmploye) {
        $this->db->where('date_debut_contrat_travail ','MAX(date_debut_contrat_travail)');
        $this->db->where('id_employe_contrat_travail ',$idEmploye);
        $query = $this->db->get('contrat_travails');
        return $query->result()[0];
    }

    public function mananaContratTravail($idEmploye) {
        $this->db->where('id_employe_contrat_travail ',$idEmploye);
        $query = $this->db->get('contrat_travails');
        $result = $query->result();
        return count($result);
    }

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
