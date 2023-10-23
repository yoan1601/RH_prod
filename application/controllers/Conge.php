<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conge extends CI_Controller {
    public function listeEmployes(){
        $idService=$this->input->get("service");
        $employes=$this->chgtContrat->getEmployesContratVraiByService($idService);
        $service=$this->service->getServiceById($idService);
        $data["employes"]=$employes;
        $data["service"]=$service;
        $data['services'] = $this->service->getAllServices();
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
        $data['services'] = $this->service->getAllServices();
        $this->load->view("pages/employesConge/fichePoste", $data);
    }
    public function demandeConge($idEmploye){
        $data["service"]=$this->input->get("service");
        $data["idEmploye"]=$idEmploye;
        $data["congesRestant"]=$this->conge->getCongesRestants($idEmploye);
        $data['services'] = $this->service->getAllServices();
        $this->load->view("pages/employesConge/demandeConge", $data);
    }
    public function saveDemandeConge(){
        $idemploye=$this->input->post("idemploye");
        $debut_conge=$this->input->post("debut_conge");
        $fin_conge=$this->input->post("fin_conge");
        $type_conge=1;
        $date_demande=date_create()->format("Y-m-d H:i:s");
        $idService=$this->input->post("idservice");
        $motif=$this->input->post("motif");
        $conge["idemploye"]=$idemploye;
        $conge["debut_conge"]=$debut_conge;
        $conge["fin_conge"]=$fin_conge;
        $conge["type_conge"]=$type_conge;
        $conge["date_demande"]=$date_demande;
        $conge["motif"]=$motif;
        $this->conge->saveDemandeConge($conge);
        redirect("conge/listeEmployes?service=".$idService);
    }
    public function listeDemandeConge(){
        $idService=$this->input->get("service");
        $demandes=$this->conge->getDemandesConge($idService);
        $data["demandes"]=$demandes;
        $this->load->view("pages/employesConge/ListeCongeDemande", $data);
    }
    public function detailDemandeConge($idDemandeConge){
        $demande=$this->conge->getDemandesCongeById($idDemandeConge);
        $data["demande"]=$demande;
        $this->load->view("pages/employesConge/demandeDetail", $data);
    }
    public function validerConge(){
        $idDemande=$this->input->post("id_demande");
        $idService=$this->input->post("id_service");
        $this->conge->validerConge($idDemande);
        redirect("conge/listeDemandeConge?service=".$idService);
    }
} ?>