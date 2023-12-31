<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recrutement extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
        $data['services'] = $this->service->getAllServices();
        $data["idDept"]=$this->session->user->id_dept;
        $this->load->view('pages/home', $data);
	}

    public function listeAnnonceAll(){

        $recrutements=$this->recrutement->getAllRecrutementsInDept();
        if($recrutements !== false) {
            foreach($recrutements as $r){
                $r->service=$this->service->getServiceById($r->id_service);
            }
            $data["recrutements"]=$recrutements;
        } else {
            $data["recrutements"]=false;
        }
        $data['services'] = $this->service->getAllServices();
        $this->load->view("pages/listAnnonce", $data);
    }

    public function hommeJour($idService){
        $this->session->set_userdata('idService', $idService);
        $data['services'] = $this->service->getAllServices();
        $data['postes']=$this->poste->getPostesByService($idService);
        $this->load->view('pages/definitionBesoin', $data);
		// redirect(site_url('critere'));
    }
    public function enregistreRecrutement(){
        $idService=$this->session->idService;
        $poste=$this->session->poste;
        $mission=$this->session->mission;
        $currentDateTime = new DateTime();
        $this->recrutement->saveRecrutement($currentDateTime->format("Y-m-d H:i:s"), $idService, $poste, $mission);
        $this->recrutement->saveBesoins($this->session->hommeJour);
		$criteresOptions = $this->session->criteresOptions;
		$this->recrutement->saveCritere($criteresOptions);
        $this->session->set_userdata("dateAnnonce", $currentDateTime);
        redirect("recrutement/genererAnnonce");
    }
    public function genererAnnonce(){
        $nomSociete="DIMPEX";
        $service=$this->service->getServiceById($this->session->idService);
        $dateAnnonce=$this->session->dateAnnonce;
        $criteresOptions=$this->session->criteresOptions;
		$criteres=array();
        for($i=1;isset($criteresOptions["critere".$i]);$i++){
            array_push($criteres, $criteresOptions["critere".$i]);
            $criteres[$criteresOptions["critere".$i]]=array();
            for($j=1;isset($criteresOptions["option".$i.$j]);$j++){
                array_push($criteres[$criteresOptions["critere".$i]], $criteresOptions["option".$i.$j]);
            }
        }
        $data["nomSociete"]=$nomSociete;
        $data["service"]=$service;
        $data["dateAnnonce"]=$dateAnnonce->format("Y-m-d H:i:s");
        $data["criteresOptions"]=$criteresOptions;
        $data['services'] = $this->service->getAllServices();
        $this->load->view("pages/annoncesGenere", $data);
    }
    public function listeAnnonce($idService){
        $this->session->set_userdata("idService", $idService);
        $recrutements=$this->recrutement->getRecrutements($idService);
        if($recrutements !== false) {
            foreach($recrutements as $r){
                $r->service=$this->service->getServiceById($idService);
            }
            $data["recrutements"]=$recrutements;
        } else {
            $data["recrutements"]=false;
        }
        $data['services'] = $this->service->getAllServices();
        $this->load->view("pages/listAnnonce", $data);
    }
    public function genererAnnonceFromListe(){
        $idRecrutement=$this->input->get("idRecrutement");
        $recrutement=$this->recrutement->getRecrutementById($idRecrutement);
        if($recrutement===false){
            redirect(site_url("recrutement/listeAnnonce"));
        }
        $this->session->set_userdata("hommeJour", $recrutement->besoins[0]->homme_jour);
        $this->session->set_userdata("idService", $recrutement->id_service_recrutement);
        for($i=1;$i<=count($recrutement->criteres);$i++){
            $criteresOptions["critere".$i]=$recrutement->criteres[$i-1]->descri_critere;
            for($j=1;$j<=count($recrutement->criteres[$i-1]->choix);$j++){
                $criteresOptions["option".$i.$j]=$recrutement->criteres[$i-1]->choix[$j-1]->choix_critere;
                $criteresOptions["coeff".$i.$j]=$recrutement->criteres[$i-1]->choix[$j-1]->coefficient_critere;
            }
        }
        $this->session->set_userdata("criteresOptions", $criteresOptions);
        redirect(site_url("recrutement/enregistreRecrutement"));
    }
}
