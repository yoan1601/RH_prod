<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChgtContrat extends CI_Controller {

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
	// public function index()
	// {
	// 	redirect('contrat/choixEmbauche');
	// }

    public function toResumeContrat() {
        $dateActuelle = date('Y-m-d H:i:s');
         // $matricule = $this->input->post('matricule');
        $matricule = 'EMP001';
        $data['matricule'] = $matricule;
        // $type_contrat = $this->input->post('type_contrat');
        $type_contrat = 'CDI';
        $data['type_contrat'] = $type_contrat;
        // $id_info = $this->input->post('id_info');
        $id_info = 4;
        $info_user_recrutement_poste = $this->chgtContrat->getInfoRecrutementPosteByIdInfoUser($id_info);
        $data['info_user_recrutement_poste'] = $info_user_recrutement_poste;

        $data['services'] = $this->service->getAllServices();
        $data['dateActuelle'] = $dateActuelle;

        // if(isset($this->input->post('dureeContrat'))) {
        //     $data['dureeContrat'] = $this->input->post('dureeContrat');
        // }

        if(true) {
            $data['dureeContrat'] = 60;
        }

        $data['cnaps'] = 'OUI';
        $data['sanitaire'] = 'NON'; 

        // $avantages['nom'] = array();
        // $avantages['prix'] = array();

        // for($i = 1; $this->input->post('avantage'.$i) !== null; $i++) {
        //     $avantages['nom'][] = $this->input->post('avantage'.$i);
        //     $avantages['prix'][] = $this->input->post('prix'.$i);
        // }

        $avantages['nom'] = array(
            0 => 'mac laren',
            1 => 'ferrari'
        );

        $avantages['prix'] = array(
            0 => 10000000,
            1 => 50000000
        );

        $data['avantages'] = $avantages;


        $this->load->view('pages/contrat/changementContratResume', $data);
    }
}
