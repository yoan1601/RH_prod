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
        // echo "<form action='".site_url("recrutement/hommeJour")."' method='post'>
        // <input type='number' name='hommeJour' value='100' min='0'>
        // <button type='submit'>Valider</button>
        // </form>";
        $data = [];
        $data['services'] = $this->service->getAllServices();
        $this->load->view('pages/home', $data);
	}
    public function hommeJour($service){
        $this->session->set_userdata('idService', $service);
        $this->load->view('pages/definitionBesoin');
		// redirect(site_url('critere'));
    }
    public function enregistreRecrutement(){
        $idService=$this->session->idService;
        $currentDateTime = new DateTime();
        $this->recrutement->saveRecrutement($currentDateTime->format("Y-m-d H:i:s"), $idService);
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
        // var_dump($criteresOptions);
		$criteres=array();
        for($i=1;isset($criteresOptions["critere".$i]);$i++){
            array_push($criteres, $criteresOptions["critere".$i]);
            $criteres[$criteresOptions["critere".$i]]=array();
            for($j=1;isset($criteresOptions["option".$i.$j]);$j++){
                array_push($criteres[$criteresOptions["critere".$i]], $criteresOptions["option".$i.$j]);
            }
        }
		// var_dump($criteres);
        $listeCriteres="<ol>";
        for($i=1;isset($criteresOptions["critere".$i]);$i++){
			$critere = $criteresOptions["critere".$i];
            $listeCriteres.="<li>".$critere."<ul>";
            foreach($criteres[$critere] as $option){
                $listeCriteres.="<li>".$option."</li>";
            }
            $listeCriteres.="</ul></li>";
        }
        $listeCriteres.="<ol>";
        echo "<h1>Avis de recrutement</h1>
        <h2>".$nomSociete."</h2>
        <h2>".$dateAnnonce->format("Y-m-d H:i:s")."</h2>
        <h2>".$service->nom_service."</h2>
        ".$listeCriteres;
    }
    public function listeAnnonce($idService){
        $this->session->set_userdata("idService", $idService);
        $recrutements=$this->recrutement->getRecrutements($idService);
        $html="<ul>";
        foreach($recrutements as $r){
            $html.="<a href='".site_url('recrutement/genererAnnonceFromListe?idRecrutement='.$r->id_recrutement)."'><li>".$r->dateheure_recrutement.", ".$r->besoins[0]->homme_jour."</li></a>";
        }
        $html.="</ul>";
        echo $html;
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
            $criteresOptions["critere".$i]=$recrutement->criteres[$i-1];
            for($j=1;$j<=count($recrutement->criteres[$i-1]->choix);$j++){
                $criteresOptions["option".$i.$j]=$recrutement->criteres[$i-1]->choix[$j-1];
            }
        }
        //$this->session->set_userdata("criteresOptions", $criteresOptions);
        //redirect(site_url("recrutement/enregistreRecrutement"));
    }
}
