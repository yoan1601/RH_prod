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
        redirect(site_url("critere"));
    }
    public function enregistreRecrutement(){
        $idService=$this->session->idService;
        $currentDateTime = new DateTime();
        $this->recrutement->saveRecrutement($currentDateTime->format("Y-m-d H:i:s"), $idService);
        $this->session->set_userdata("dateAnnonce", $currentDateTime);
        redirect(site_url("recrutement/genererAnnonce"));
    }
    public function genererAnnonce($date=new DateTime()){
        $nomSociete="DIMPEX";
        $service=$this->service->getServiceById($this->session->idService);
        $dateAnnonce=$this->session->dateAnnonce;
        $criteresOptions=$this->session->criteresOptions;
        $criteres=array();
        for($i=1;isset($criteresOptions["critere".$i]);$i++){
            array_push($criteres, $criteresOptions["critere".$i]);
            $criteres[$i-1]["options"]=array();
            for($j=1;isset($criteresOptions["option".$i.$j]);$j++){
                array_push($criteres[$i-1]["options"], $criteresOptions["option".$i.$j]);
            }
        }
        $listeCriteres="<ol>";
        foreach($criteres as $critere){
            $listeCriteres.="<li>".$critere."<ul>";
            foreach($critere["options"] as $option){
                $listeCriteres.="<li>".$option."</li>";
            }
            $listeCriteres.="</ul></li>";
        }
        $listeCriteres.="<ol>";
        echo "<h1>Avis de recrutement</h1>
        <h2>".$nomSociete."</h2>
        <h2>".$dateAnnonce."</h2>
        <h2>".$service->nom_service."</h2>
        ".$listeCriteres;
    }
}
