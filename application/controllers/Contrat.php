<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contrat extends CI_Controller {

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
		redirect('contrat/choixEmbauche');
	}

    public function resumeContratEssai() {
        $idInfo = $this->input->post('idInfo');
        $idRecrutement = $this->input->post('idRecrutement');
        $data['dateActuelle'] = $this->input->post('dateActuelle');
        $data['salaire_brut'] = $this->input->post('salaire_brut');
        $data['salaire_net'] = $this->input->post('salaire_net');
        $data['duree_contrat'] = $this->input->post('duree_contrat');
        $data['info_user'] = $this->contrat->getInfoById($idInfo);
        $data['recrutement'] = $this->contrat->getRecrutementById($idRecrutement);
        $data['services'] = $this->service->getAllServices();
        $data['dateActuelle'] = date('Y-m-d H:i:s'); // Format YYYY-MM-DD HH:MM:SS
        $matricule=$this->contrat->saveContratEssai($idInfo, $data['dateActuelle'], $idRecrutement, $data['salaire_brut'], $data['salaire_net'], $data['duree_contrat']);
        $data['matricule']=$matricule;
        if($data['info_user']->sexe_info=='1'){
            $data['genre']="Homme";
        }else{
            $data['genre']="Femme";
        }
        // var_dump($data);
		$this->load->view('pages/contrat/contratEssaieGenere',$data);
    }

    public function contracter($idInfo, $idRecrutement) {
        $data['info_user'] = $this->contrat->getInfoById($idInfo);
        $data['recrutement'] = $this->contrat->getRecrutementById($idRecrutement);
        $data['services'] = $this->service->getAllServices();
        $data['dateActuelle'] = date('Y-m-d H:i:s'); // Format YYYY-MM-DD HH:MM:SS
        if($data['info_user']->sexe_info=='1'){
            $data['genre']="Homme";
        }else{
            $data['genre']="Femme";
        }
        // var_dump($data);
		$this->load->view('pages/contrat/contratEssaie',$data);
    }
    public function listeFuturEmployes() {
        $idService=$this->input->get("service");
        $data['entretien_recrutement_service'] = $this->contrat->getEntretienRecrutementServiceByIdService($idService);
        $data['futurEmployes'] = $this->contrat->getFuturEmployes($idService);
        $data['services'] = $this->service->getAllServices();

        // var_dump($data);
        $this->load->view('pages/contrat/listeFutureEmp', $data);
    }

    public function choixEmbauche($idEntretient = 1)
	{
        $data['entretien_recrutement_service'] = $this->contrat->getEntretienRecrutementServiceByIdEntretien($idEntretient);
        $data['choix'] = $this->contrat->getChoixEmbauche($idEntretient);
        $data['services'] = $this->service->getAllServices();

        $this->load->view('pages/contrat/choixEmbauche', $data);
	}

    public function saveChoixEmbauche() {
        $idEntretient = $this->input->post('idEntretien');
        $idInfoSelected = $this->input->post('idInfoSelected');
        // var_dump($idInfoSelected);
        if (!empty($idInfoSelected)) {
            foreach ($idInfoSelected as $key => $idInfo) {
                $this->contrat->insertEntretienSelection($idEntretient, $idInfo);
            }
        }
        redirect('contrat');
    }
}
