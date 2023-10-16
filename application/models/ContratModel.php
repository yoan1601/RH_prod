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

    public function saveContratEssai($idInfoUser, $dateContrat, $idRecrutement, $salaireBrut, $salaireNet, $dureeContrat){
        $query="insert into contrat_essai values(null, %s, '%s', %s, %s, %s, %s)";
        $query=sprintf($query, $idInfoUser, $dateContrat, $idRecrutement, $salaireBrut, $salaireNet, $dureeContrat);
        $this->db->query($query);
        return $this->saveEmploye($idInfoUser);
    }

    public function saveEmploye($idInfoUser){
        $query="insert into employes values(null, null, %s, 1, 1)";
        $query=sprintf($query, $idInfoUser);
        $this->db->query($query);
        return $this->saveMatricule($this->getLastIdEmploye($idInfoUser));
    }

    public function getLastIdEmploye($infoUser){
        $query="select max(id_employe) as last_id from employes where id_info_employe=%s";
        $query=sprintf($query, $idInfoUser);
        $query=$this->db->query($query);
        if(count($query)>0){
            return $query[0]->last_id;
        }
        return $query;
    }

    public function saveMatricule($lastIdEmploye){
        $matricule="EMP".$lastIdEmploye;
        $query="update employes set matricule='%s' where id_employe=%s";
        $query=sprintf($query, $matricule);
        $this->db->query($query);
        return $matricule;
    }
}
