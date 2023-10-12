<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entretien extends CI_Controller {

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
	public function listTests($idDepartement)
	{
		$tests=$this->entretien->getAllTestsByDepartement($idDepartement);
		$departement=$this->departement->getDepartementById($idDepartement);
		$data["tests"]=$tests;
		$data["departement"]=$departement;
		$data['services'] = $this->service->getAllServices();
		$this->load->view("pages/listeTest", $data);
	}
	public function listPersonnesTest($idTest){
		$test=$this->entretien->getTestById($idTest);
		$service=$this->service->getServiceById($test->id_service);
		$personnes=$this->entretien->getPersonneTests($test);
		$personnes=$this->entretien->sortPersonnesByNote($personnes);
		$data["personnes"]=$personnes;
		$data["service"]=$service;
		$data["test"]=$test;
		$data['services'] = $this->service->getAllServices();
		$this->load->view("pages/ListeAdmis", $data);
	}
	public function planEntretien(){
		$admis=$this->input->post("CVselected[]");
		$idService=$this->input->post("idservice");
		$this->session->set_userdata("admis", $admis);
		$nbAdmis=count($admis);
		$service=$this->service->getServiceById($idService);
		$data["nbAdmis"]=$nbAdmis;
		$data["service"]=$service;
		$data["idrecrutement"]=$this->input->post("idrecrutement");
		$data["idTest"]=$this->input->post("idtest");
		$data['services'] = $this->service->getAllServices();
		$this->load->view("pages/planificationEntretien", $data);
	}
	public function saveEntretien(){
		$idTest=$this->input->post("idtest");
		$dateHeure=$this->input->post("dateheure");
		$lieu=$this->input->post("lieu");
		$duree=$this->input->post("duree");
		$idUser=$this->session->user->id_user;
		$idRecrutement=$this->input->post("idrecrutement");
		$this->entretien->saveEntretien($dateHeure, $lieu, $idUser, $idRecrutement, $duree);
		$admis=$this->session->admis;
		$this->entretien->saveManySelectionTest($idTest, $admis);
		$nbCandidats=count($admis);
		$candidats=$this->entretien->getPersonneFromListId($admis, $idTest);
		$candidats=$this->entretien->sortPersonnesByNote($candidats);
		$candidats=$this->entretien->getHoraireEntretien($candidats, $dateHeure, $duree);
		$data["dateHeure"]=$dateHeure;
		$data["lieu"]=$lieu;
		$data["duree"]=$duree;
		$data["nbCandidats"]=$nbCandidats;
		$data["candidats"]=$candidats;
		$data['services'] = $this->service->getAllServices();
		$this->load->view("pages/resumeEntretien", $data);
	}
	public function listeEntretien($idService){
		$entretiens=$this->entretien->getEntretiensByService($idService);
		$data['entretiens']=$entretiens;
		$data['nbCandidats']=count($entretiens->personnes);
		$data['candidats']=$entretiens->personnes;
		$data['services'] = $this->service->getAllServices();
		$this->load->view('pages/contrat/ListeEntretien', $data);
	}
	public function detailEntretien($idEntretien){
		$entretien=$this->entretien->getDetailsEntretien($idEntretien);
		$data['entretien']=$entretien;
		$data['services'] = $this->service->getAllServices();
		$this->load->view("pages/contrat/detailEntretien", $data);
	}
}
