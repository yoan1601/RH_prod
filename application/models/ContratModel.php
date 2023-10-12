<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContratModel extends CI_Model {

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

    public function getRecrutementById($idRecrutement) {
        $this->db->where('id_recrutement ', $idRecrutement);

        $query = $this->db->get('v_recrutement_poste');

        return $query->row(); 
    }

    public function getInfoById($idInfo) {
        $this->db->where('id_information_user ', $idInfo);

        $query = $this->db->get('information_users');

        return $query->row(); 
    }


    public function getFuturEmployes($idService) {

        $this->db->where('id_service ', $idService);
        $this->db->where('id_entretien_entretien_selection !=', null);

        $query = $this->db->get('v_choix_embauche');

        return $query->result();
    }

    public function insertEntretienSelection($idEntretien, $idInfo) {
        $data = array(
            'id_entretien_entretien_selection' => $idEntretien,
            'id_info_entretien_selection' => $idInfo
        );
        $this->db->insert('entretien_selections', $data);
    }

    public function getChoixEmbauche($idEntretien) {

        $this->db->where('id_entretien ', $idEntretien);

        $query = $this->db->get('v_choix_embauche');

        return $query->result();
    }

    public function getEntretienRecrutementServiceByIdService($idService) {
        $this->db->where('id_service ', $idService);

        $query = $this->db->get('v_entretien_recrutement_service');

        return $query->row();
    }

    public function getEntretienRecrutementServiceByIdEntretien($idEntretien) {
        $this->db->where('id_entretien ', $idEntretien);

        $query = $this->db->get('v_entretien_recrutement_service');

        return $query->row();
    }
}
