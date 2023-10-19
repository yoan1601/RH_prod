<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChgtContrat extends CI_Controller {
    public function choixContrat($idContratEssai){
        $data["idContratEssai"]=$idContratEssai;
        $data['services'] = $this->service->getAllServices();
        $this->load->view("pages/contrat/choixContrat", $data);
    }
    public function genererFichePoste() {
        $superieurs = $this->input->post('superieurs');
        $inferieurs = $this->input->post('inferieurs');

        $data = $this->session->data_chgt_contrat;

        $idContratTravail = $this->chgtContrat->insertContratTravail($data);
        // inserer contrat travail
        if($idContratTravail > 0) {
            // update id_type_contrat dans employe
            $idEmploye = $data['info_user_recrutement_poste']->id_employe;
            $new_type_contrat = $data['type_contrat'] == 'CDI' ? 100 : 10;
            if($this->chgtContrat->updateTypeContratEmploye($idEmploye, $new_type_contrat) != false) {
                // insert hierarchie + atao ao anaty data le hierarchie
                foreach ($superieurs as $key => $idEmpSuperieur) {
                    $this->chgtContrat->insertHierarchie($idEmploye, $idEmpSuperieur, $idContratTravail, 1);
                }
                foreach ($inferieurs as $key => $idEmpSubalterne) {
                    $this->chgtContrat->insertHierarchie($idEmploye, $idEmpSubalterne, $idContratTravail, -1);
                }
                // insert avantage
                foreach ($data['avantages']['nom'] as $key => $nom_avantage) {
                    $prix_avantage = $data['avantages']['prix'][$key];
                    $this->chgtContrat->insertAvantage($idContratTravail ,$nom_avantage, $prix_avantage);
                }

                $data['superieurs'] = $this->chgtContrat->getHierarchie($idContratTravail, 1);
                $data['inferieurs'] = $this->chgtContrat->getHierarchie($idContratTravail, -1);
                $this->load->view('pages/contrat/fichePoste', $data);
            } 
        }
        else {
            redirect('recrutement/index');
        }

    }

	public function toFichePoste() {
        $data = $this->session->data_chgt_contrat;

        $niveau_poste = $data['info_user_recrutement_poste']->niveau;

        $data['superieurs'] = $this->chgtContrat->getSuperieurHierarchiques($niveau_poste);
        $data['subalternes'] = $this->chgtContrat->getSubalternes($niveau_poste);

        // var_dump($data);
        $this->load->view('pages/contrat/fichePoste', $data);
    }

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

        $this->session->set_userdata("data_chgt_contrat", $data);

        $this->load->view('pages/contrat/changementContratResume', $data);
    }
}
