<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conge extends CI_Controller {
    public function listeEmployes(){
        $idService=$this->input->get("service");
        $employes=$this->chgtContrat->getEmployesContratVraiByService($idService);
        $service=$this->service->getServiceById($idService);
        $data["employes"]=$employes;
        $data["service"]=$service;
        $this->load->view("pages/employesConge/ListeEmploye", $data);
    }
    public function afficheFichePosteForEmploye($idContratTravail){
        $contratTravail=$this->chgtContrat->getContratTravailById($idContratTravail);
        $collaborateurs=$this->chgtContrat->getHierarchiesForEmploye($contratTravail->id_employe);
        $this->load->helper("stringvalue");
        $data["genre"]=getGenreName($contratTravail->sexe_info);
        $data["cnaps_string"]=getBooleanValue($contratTravail->affiliation_cnaps);
        $data["ostie_string"]=getBooleanValue($contratTravail->affiliation_organisme_sanitaire);
        $data["contratTravail"]=$contratTravail;
        $data["collaborateurs"]=$collaborateurs;
        $data["devise"]="Ar";
        $this->load->view("pages/employesConge/fichePoste", $data);
    }
    public function demandeConge($idEmploye){
        $data["idEmploye"]=$idEmploye;
        $this->load->view("pages/employesConge/demandeConge", $data);
    }
} ?>