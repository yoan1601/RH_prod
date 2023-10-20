<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChgtContrat extends CI_Controller {
    public function choixContrat($idContratEssai){
        $data["idContratEssai"]=$idContratEssai;
        $data["types_contrat"]=$this->chgtContrat->getTypeContrats();
        $data['services'] = $this->service->getAllServices();
        $this->load->view("pages/contrat/choixContrat", $data);
    }
    public function changementContrat(){
        $type_contrat=$this->input->post("type_contrat");
        $attrTypeContrat=explode(":", $type_contrat);
        $contratEssai=$this->contrat->getContratEssaiById($this->input->post("idContratEssai"));
        $dateActuelle=new DateTime();
        $dateActuelleAffiche=$dateActuelle->format("d/m/Y");
        $dateActuelleValeur=$dateActuelle->format("Y-m-d");
        $dureeHTML="none";
        if($attrTypeContrat[0]==10){
            $dureeHTML="block";
        }
        $this->load->helper("stringvalue");
        $data["genre"]=getGenreName($contratEssai->sexe_info);
        $data["contratEssai"]=$contratEssai;
        $data["dateActuelleAffiche"]=$dateActuelleAffiche;
        $data["dateActuelleValeur"]=$dateActuelleValeur;
        $data["dureeHTML"]=$dureeHTML;
        $data["typeContrat"]=$attrTypeContrat[1];
        $this->load->view("pages/contrat/changementContrat", $data);
    }
    public function etablirAvantages(){
        $dateContratTravail=date("Y-m-d", strtotime($this->input->post("dateActuelle")));
        $idEmploye=$this->input->post("idEmploye");
        $idRecrutement=$this->input->post("idRecrutement");
        $duree=$this->input->post("dureeContratChange");
        $cnaps=$this->input->post("cnaps");
        $ostie=$this->input->post("ostie");
        $salaireBrut=$this->input->post("salaire_brut");
        $data["dateContratTravail"]=$dateContratTravail;
        $data["idEmploye"]=$idEmploye;
        $data["idRecrutement"]=$idRecrutement;
        $data["duree"]=$duree;
        $data["cnaps"]=$cnaps;
        $data["ostie"]=$ostie;
        $data["salaireBrut"]=$salaireBrut;
        $this->load->view("pages/contrat/etablirAvantage", $data);
    }
    public function toResumeContrat(){
        $dateContratTravail=$this->input->post("dateContratTravail");
        $idEmploye=$this->input->post("idEmploye");
        $idRecrutement=$this->input->post("idRecrutement");
        $duree=$this->input->post("duree");
        $cnaps=$this->input->post("cnaps");
        $ostie=$this->input->post("ostie");
        $salaireBrut=$this->input->post("salaireBrut");
        $data["dateContratTravail"]=$dateContratTravail;
        $data["idEmploye"]=$idEmploye;
        $data["idRecrutement"]=$idRecrutement;
        $data["duree"]=$duree;
        $data["cnaps"]=$cnaps;
        $data["ostie"]=$ostie;
        $data["salaireBrut"]=$salaireBrut;
        $avantages=array();
        for($i=1;$this->input->post("nom_avantage".$i)!==null;$i++){
            $avantages[$i-1]["nom"]=$this->input->post("nom_avantage".$i);
            $avantages[$i-1]["prix"]=$this->input->post("prix_avantage".$i);
            $avantages[$i-1]["prix_string"]=number_format($avantages[$i-1]["prix"], 2, ",", " ");
        }
        $data["avantages"]=$avantages;
        $data["employe"]=$this->contrat->getEmployeById($idEmploye);
        $this->load->helper("stringvalue");
        $data["genre"]=getGenreName($data["employe"]->sexe_info);
        $data["cnaps_string"]=getBooleanValue($cnaps);
        $data["ostie_string"]=getBooleanValue($ostie);
        $data["salaireBrut_string"]=number_format($salaireBrut, 2, ",", " ");
        $data["recrutement"]=$this->recrutement->getRecrutementById($idRecrutement);
        $data["devise"]="Ar";
        $this->load->view("pages/contrat/changementContratResume", $data);
    }
    public function toFichePoste() {
        $dateContratTravail=$this->input->post("dateContratTravail");
        $idEmploye=$this->input->post("idEmploye");
        $idRecrutement=$this->input->post("idRecrutement");
        $duree=$this->input->post("duree");
        $cnaps=$this->input->post("cnaps");
        $ostie=$this->input->post("ostie");
        $salaireBrut=$this->input->post("salaireBrut");
        $avantages=array();
        for($i=1;$this->input->post("nom_avantage".$i)!==null;$i++){
            $avantages[$i-1]["nom"]=$this->input->post("nom_avantage".$i);
            $avantages[$i-1]["prix"]=$this->input->post("prix_avantage".$i);
            $avantages[$i-1]["prix_string"]=number_format($avantages[$i-1]["prix"], 2, ",", " ");
        }
        $data["dateContratTravail"]=$dateContratTravail;
        $data["idEmploye"]=$idEmploye;
        $data["idRecrutement"]=$idRecrutement;
        $data["duree"]=$duree;
        $data["cnaps"]=$cnaps;
        $data["ostie"]=$ostie;
        $data["salaireBrut"]=$salaireBrut;
        $data["avantages"]=$avantages;
        $data["employe"]=$this->contrat->getEmployeById($idEmploye);
        $this->load->helper("stringvalue");
        $data["genre"]=getGenreName($data["employe"]->sexe_info);
        $data["cnaps_string"]=getBooleanValue($cnaps);
        $data["ostie_string"]=getBooleanValue($ostie);
        $data["salaireBrut_string"]=number_format($salaireBrut, 2, ",", " ");
        $data["recrutement"]=$this->recrutement->getRecrutementById($idRecrutement);
        $data["devise"]="Ar";
        $data['superieurs'] = $this->chgtContrat->getSuperieurHierarchiques($data["recrutement"]->niveau, $data["employe"]->id_info_employe);
        $data['subalternes'] = $this->chgtContrat->getSubalternes($data["recrutement"]->niveau, $data["employe"]->id_info_employe);
        $this->load->view('pages/contrat/fichePoste', $data);
    }
    public function genererFichePoste() {
        $dateContratTravail=$this->input->post("dateContratTravail");
        $idEmploye=$this->input->post("idEmploye");
        $idRecrutement=$this->input->post("idRecrutement");
        $duree=$this->input->post("duree");
        $cnaps=$this->input->post("cnaps");
        $ostie=$this->input->post("ostie");
        $salaireBrut=$this->input->post("salaireBrut");
        $avantages=array();
        for($i=1;$this->input->post("nom_avantage".$i)!==null;$i++){
            $avantages[$i-1]["nom"]=$this->input->post("nom_avantage".$i);
            $avantages[$i-1]["prix"]=$this->input->post("prix_avantage".$i);
            $avantages[$i-1]["prix_string"]=number_format($avantages[$i-1]["prix"], 2, ",", " ");
        }
        $superieurs = $this->input->post('superieurs');
        $inferieurs = $this->input->post('inferieurs');
        $data["dateContratTravail"]=$dateContratTravail;
        $data["idEmploye"]=$idEmploye;
        $data["idRecrutement"]=$idRecrutement;
        $data["duree"]=$duree;
        $data["cnaps"]=$cnaps;
        $data["ostie"]=$ostie;
        $data["salaireBrut"]=$salaireBrut;
        $data["avantages"]=$avantages;
        $data["employe"]=$this->contrat->getEmployeById($idEmploye);
        $this->load->helper("stringvalue");
        $data["genre"]=getGenreName($data["employe"]->sexe_info);
        $data["cnaps_string"]=getBooleanValue($cnaps);
        $data["ostie_string"]=getBooleanValue($ostie);
        $data["salaireBrut_string"]=number_format($salaireBrut, 2, ",", " ");
        $data["recrutement"]=$this->recrutement->getRecrutementById($idRecrutement);
        $data["devise"]="Ar";
        $superieurs_emp=array();
        if($superieurs!==null){
            foreach($superieurs as $s){
                $superieurs_emp[]=$this->contrat->getEmployeById($s);
            }
        }
        $subalternes_emp=array();
        if($inferieurs!==null){
            foreach($subalternes as $s){
                $subalternes_emp[]=$this->contrat->getEmployeById($s);
            }
        }
        $data["superieurs"]=$superieurs_emp;
        $data["subalternes"]=$subalternes_emp;
        $this->load->view('pages/contrat/ficheGenere', $data);
    }
    public function saveChangementContrat() {
        $dateContratTravail=$this->input->post("dateContratTravail");
        $idEmploye=$this->input->post("idEmploye");
        $idRecrutement=$this->input->post("idRecrutement");
        $duree=$this->input->post("duree");
        $cnaps=$this->input->post("cnaps");
        $ostie=$this->input->post("ostie");
        $salaireBrut=$this->input->post("salaireBrut");
        $avantages=array();
        for($i=1;$this->input->post("nom_avantage".$i)!==null;$i++){
            $avantages[$i-1]["nom"]=$this->input->post("nom_avantage".$i);
            $avantages[$i-1]["prix"]=$this->input->post("prix_avantage".$i);
        }
        $superieurs=array();
        for($i=1;$this->input->post("id_superieur".$i)!==null;$i++){
            $superieurs[]=$this->input->post("id_superieur".$i);
        }
        $inferieurs=array();
        for($i=1;$this->input->post("id_subalterne".$i)!==null;$i++){
            $inferieurs[]=$this->input->post("id_subalterne".$i);
        }
        $idContratTravail=$this->chgtContrat->saveChangeContrat($dateContratTravail, $idEmploye, $idRecrutement, $duree, $cnaps, $ostie, $salaireBrut);
        $this->chgtContrat->saveManyAvantages($avantages, $idContratTravail->last_id);
        foreach ($superieurs as $key => $idEmpSuperieur) {
            $this->chgtContrat->insertHierarchie($idEmploye, $idEmpSuperieur, $idContratTravail->last_id, 1);
        }
        foreach ($inferieurs as $key => $idEmpSubalterne) {
            $this->chgtContrat->insertHierarchie($idEmploye, $idEmpSubalterne, $idContratTravail->last_id, -1);
        }
        redirect("recrutement/index");
    }

    public function genererFichePoste_sample() {
        $idContratTravail=$this->input->post("idContratTravail");
        $superieurs = $this->input->post('superieurs');
        $inferieurs = $this->input->post('inferieurs');
        $contratTravail=$this->chgtContrat->getContratTravailById($idContratTravail);
        // update id_type_contrat dans employe
        $idEmploye = $contratTravail->id_employe;
        if(empty($superieurs) == false) {
            foreach ($superieurs as $key => $idEmpSuperieur) {
                $this->chgtContrat->insertHierarchie($idEmploye, $idEmpSuperieur, $idContratTravail, 1);
            }
        }
        if(empty($inferieurs) == false) {
            foreach ($inferieurs as $key => $idEmpSubalterne) {
                $this->chgtContrat->insertHierarchie($idEmploye, $idEmpSubalterne, $idContratTravail, -1);
            }
        }
            
        // insert avantage
        foreach ($data['avantages']['nom'] as $key => $nom_avantage) {
            $prix_avantage = $data['avantages']['prix'][$key];
            $this->chgtContrat->insertAvantage($idContratTravail ,$nom_avantage, $prix_avantage);
        }

        $data['superieurs'] = $this->chgtContrat->getHierarchie($idContratTravail, 1);
        $data['inferieurs'] = $this->chgtContrat->getHierarchie($idContratTravail, -1);
        $this->load->view('pages/contrat/ficheGenere', $data);
    }
}
