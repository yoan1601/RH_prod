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
	public function index($service)
	{
        $this->session->set_userdata('idService', $service);
        echo "<form action='".site_url("recrutement/hommeJour")."' method='post'>
        <input type='number' name='hommeJour' value='100' min='0'>
        <button type='submit'>Valider</button>
        </form>";
	}
    public function hommeJour(){
        $hommeJour=$this->input->post("hommeJour");
        $this->session->set_userdata("hommeJour", $hommeJour);
    }
    public function genererAnnonce(){
        $idService=$this->session->idService;
        $currentDateTime = new DateTime();
        $this->recrutement->saveRecrutement($currentDateTime->format("Y-m-d H:i:s"), $idService);
        $service=$this->service->getServiceById($idService);
    }
}
