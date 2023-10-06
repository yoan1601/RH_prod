<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
    public function creerService($message=""){
        $message=str_replace("_", " ", $message);
        $data["message"]=$message;
        $this->load->view("pages/creation_service", $data);
    }
    public function saveService(){
        $nomService=$this->input->post("nomservice");
        $idDepartement=$this->input->post("iddepartement");
        $this->service->saveService($nomService, $idDepartement);
        redirect("service/creerService/Service_insere_avec_succes");
    }
}
