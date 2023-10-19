<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChgtContratModel extends CI_Model {

    public function getHierarchie($idContratTravail, $position = 1) {
        $this->db->where('id_contrat_travail ', $idContratTravail);
        $this->db->where('position_hierarchie ', $position);

        $query = $this->db->get('v_hierarchie_info_user_poste');
        return $query->result();
    }

    public function insertAvantage($idContratTravail ,$nom_avantage, $prix_avantage) {
        $donnee = array(
            'id_contrat_travail_avantage' => $idContratTravail,
            'nom_avantage' => $nom_avantage,
            'prix_avantage' => $prix_avantage
        );
        $this->db->insert('avantages', $donnee);
        return $this->db->insert_id();
    }

    public function insertHierarchie($idEmploye, $idSuperieur, $idContratTravail, $position = 1) {
        $donnee = array(
            'id_employe_hierarchie' => $idEmploye,
            'id_employe_collaborateur' => $idSuperieur,
            'id_contrat_travail' => $idContratTravail,
            'position_hierarchie' => $position
        );

        $this->db->insert('hierarchies', $donnee);
        return $this->db->insert_id();
    }

    public function updateTypeContratEmploye($idEmploye, $new_type) {
        $data = array(
            'id_type_contrat_employe' => $new_type
        );
        $this->db->where('id_employe ', $idEmploye);
        return $this->db->update('employes', $data);
    }

    public function insertContratTravail($data) {
        if(isset($data['dureeContrat']) == false) { $data['dureeContrat'] = null; }
        $cnaps = $data['cnaps'] == 'OUI' ? 1 : 0; 
        $sanitaire = $data['sanitaire'] == 'OUI' ? 1 : 0; 
        $donnee = array(
            'date_debut_contrat_travail' => $data['dateActuelle'],
            'id_employe_contrat_travail' => $data['info_user_recrutement_poste']->id_employe,
            'id_recrutement_contrat_travail' => $data['info_user_recrutement_poste']->id_recrutement,
            'duree_contrat_travail' => $data['dureeContrat'],
            'affiliation_cnaps' => $cnaps,
            'affiliation_organisme_sanitaire' => $sanitaire
        );

        $this->db->insert('contrat_travails', $donnee);
        return $this->db->insert_id();
    }

    public function getSubalternes($niveau) {
        $this->db->where('niveau < ', $niveau);
        $this->db->where('etat_info > ', 0);

        $query = $this->db->get('v_recrutement_poste_info_employe');

        return $query->result();
    }

    public function getSuperieurHierarchiques($niveau) {
        $this->db->where('niveau > ', $niveau);
        $this->db->where('etat_info > ', 0);

        $query = $this->db->get('v_recrutement_poste_info_employe');

        return $query->result();
    }
    
    public function getInfoRecrutementPosteByIdInfoUser($id_info) {
        $query = $this->db->get('v_recrutement_poste_info');

        $query="select * from v_contrat_travail_employe_recrutement_service_poste_categorie where id_information_user=%s";
        $query=sprintf($query, $id_info);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            return $query[0];
        }
        return $query;
    }
    public function getTypeContrats(){
        $query="select * from type_contrats where code_type_contrat<>1";
        $query=$this->db->query($query);
        $query=$query->result();
        return $query;
    }
    public function saveChangeContrat($dateContratTravail, $idEmploye, $idRecrutement, $duree, $cnaps, $ostie, $salaireBrut){
        $query="insert into contrat_travails values (null, '%s', %s, %s, %s, %s, %s, %s)";
        $query=sprintf($query, $dateContratTravail, $idEmploye, $idRecrutement, $duree, $cnaps, $ostie, $salaireBrut);
        $this->db->query($query);
        return $this->getLastIdContratTravail();
    }
    public function getLastIdContratTravail(){
        $query="select max(id_contrat_travail) as last_id from contrat_travails";
        $query=$this->db->query($query);
        $query=$query->row();
        return $query;
    }
}
