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
    public function getSubalternes($niveau, $idInfo) {
        /*$this->db->where('niveau < ', $niveau);
        $this->db->where('etat_info > ', 0);
        $query = $this->db->get('v_recrutement_poste_info_employe');*/
        $query="select * from v_recrutement_poste_info_employe where niveau < %s and etat_info > 0 and id_information_user<>%s";
        $query=sprintf($query, $niveau, $idInfo);
        $query=$this->db->query($query);
        return $query->result();
    }

    public function getSuperieurHierarchiques($niveau, $idInfo) {
        /*$this->db->where('niveau > ', $niveau);
        $this->db->where('etat_info > ', 0);*/
        //$query = $this->db->get('v_recrutement_poste_info_employe');
        $query="select * from v_recrutement_poste_info_employe where niveau > %s and etat_info > 0 and id_information_user<>%s";
        $query=sprintf($query, $niveau, $idInfo);
        $query=$this->db->query($query);
        return $query->result();
    }
    public function getEmployesContratVraiByService($idService) {
        $query = $this->db->get('v_recrutement_poste_info');
        $query="select * from v_contrat_travail_employe_recrutement_service_poste_categorie where id_service=%s";
        $query=sprintf($query, $idService);
        $query=$this->db->query($query);
        $query=$query->result();
        return $query;
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
    public function saveManyAvantages($avantages, $idContratTravail){
        foreach($avantages as $a){
            $this->saveAvantage($a, $idContratTravail);
        }
    }
    public function saveAvantage($avantage, $idContratTravail){
        $query="insert into avantages values(null, %s, '%s', %s)";
        $query=sprintf($query, $idContratTravail, $avantage["nom"], $avantage["prix"]);
        $this->db->query($query);
    }
    public function getContratTravailById($idContratTravail){
        $query="select * from v_contrat_travail_info_employe where id_contrat_travail=%s";
        $query=sprintf($query, $idContratTravail);
        $query=$this->db->query($query);
        $query=$query->row();
        if(isset($query)){
            $query->salaire_brut_string=number_format($query->salaire_brut, 2, ",", " ");
            $query->avantages=$this->getAvantagesForContratTravail($idContratTravail);
        }
        return $query;
    }
    public function getAvantagesForContratTravail($idContratTravail){
        $query="select * from avantages where id_contrat_travail_avantage=%s";
        $query=sprintf($query, $idContratTravail);
        $query=$this->db->query($query);
        $query=$query->result();
        foreach($query as $row){
            $row->prix_string=number_format($row->prix_avantage, 2, ",", " ");
        }
        return $query;
    }
    public function getHierarchiesForEmploye($idEmploye){
        $query="select * from v_hierarchie_info_user where id_employe_hierarchie=%s";
        $query=sprintf($query, $idEmploye);
        $query=$this->db->query($query);
        $query=$query->result();
        $superieurs=array();
        $subalternes=array();
        foreach($query as $row){
            if($row->position_hierarchie==1){
                $superieurs[]=$row;
            }else if($row->position_hierarchie==-1){
                $subalternes[]=$row;
            }
        }
        $collaborateurs=array("superieurs"=>$superieurs, "subalternes"=>$subalternes);
        return $collaborateurs;
    }
}
