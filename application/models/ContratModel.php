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
        $this->db->where('id_entretien_entretien_selection is not null');
        $this->db->where('id_service != ', null);

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
        $query="insert into employes values(null, 'null', %s, 1, 1)";
        $query=sprintf($query, $idInfoUser);
        $this->db->query($query);
        return $this->saveMatricule($this->getLastIdEmploye($idInfoUser));
    }

    public function getLastIdEmploye($infoUser){
        $query="select max(id_employe) as last_id from employes where id_info_employe=%s";
        $query=sprintf($query, $infoUser);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            return $query[0]->last_id;
        }
        return $query;
    }

    public function saveMatricule($lastIdEmploye){
        $matricule="EMP".$lastIdEmploye;
        $query="update employes set matricule_employe='%s' where id_employe=%s";
        $query=sprintf($query, $matricule, $lastIdEmploye);
        $this->db->query($query);
        return $matricule;
    }
    public function listeContratEssai($idService){
        $query="select * from v_contrat_essai_info_employes where id_service_recrutement=%s";
        $query=sprintf($query, $idService);
        $query=$this->db->query($query);
        $query=$query->result();
        $currentDate=new DateTime();
        foreach($query as $row){
            $row->fin_contrat_essai=date("Y-M-d", strtotime($currentDate->format("Y-m-d")." + ".$row->duree_contrat_essai." day"));
            $row->jours_restant=date_diff($currentDate, date_create($row->fin_contrat_essai))->days;
        }
        return $query;
    }
    public function getContratEssaiById($idContratEssai){
        $query="select * from v_essai_info_employe_poste where id_contrat_essai=%s";
        $query=sprintf($query, $idContratEssai);
        $query=$this->db->query($query);
        $query=$query->row();
        $currentDate=new DateTime();
        $query->fin_contrat_essai=date("Y-M-d", strtotime($currentDate->format("Y-m-d")." + ".$query->duree_contrat_essai." day"));
        $query->jours_restant=date_diff($currentDate, date_create($query->fin_contrat_essai))->days;
        return $query;
    }
}
