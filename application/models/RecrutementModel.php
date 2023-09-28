<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecrutementModel extends CI_Model {
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
    public function saveBesoins($hommeJour){
        $nextIdRecrutement = $this->getLastIdRecrutement();
        $query="insert into besoins values(null, %s, %s, 1)";
        $query=sprintf($query, $nextIdRecrutement, $hommeJour);
        $this->db->query($query);
    }
    public function saveCritere($criteresOptions) {
        $nextIdRecrutement = $this->getLastIdRecrutement();
        
        for($i = 1; isset($criteresOptions['critere'.$i]); $i++) {
            $data = array(
                'id_recrutement_critere' => $nextIdRecrutement,
                'descri_critere' => $criteresOptions['critere'.$i],
                'etat_critere' => 1
            );

            if ($this->db->insert('criteres', $data)) {
                $id_critere_vao_tafiditra = $this->db->insert_id();
                for($k = 1; isset($criteresOptions['option'.$i.$k]); $k++) {
                    $dataOption = array(
                        'choix_critere' => $criteresOptions['option'.$i.$k],
                        'coefficient_critere' => $criteresOptions['coeff'.$i.$k],
                        'id_critere_choix' => $id_critere_vao_tafiditra
                    );
                    $this->db->insert('choix_criteres', $dataOption);
                }
            }
        }
   
    }
    
     public function saveRecrutement($date, $idService){
        $query="insert into recrutements values(null, %s, '%s', 1)";
        $query=sprintf($query, $idService, $date);
        $this->db->query($query);
    }
    public function getLastIdRecrutement(){
        $query="select max(id_recrutement) as last_id from recrutements";
        $query=$this->db->query($query);
        $query=$query->result();
        $lastId=0;
        if(count($query)>0){
            $lastId=$query[0]->last_id;
        }
        return $lastId;
    }
    public function getChoixByCritere($critere){
        $query="select * from choix_criteres where id_critere_choix=%s";
        $query=sprintf($query, $critere);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            return $query;
        }
        return false;
    }
    public function getCriteresByRecrutement($recrutement){
        $query="select * from criteres where id_recrutement_critere=%s";
        $query=sprintf($query, $recrutement);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            return $query;
        }
        return false;
    }
    public function getBesoinsByRecrutement($recrutement){
        $query="select * from besoins where id_recrutement_besoin=%s";
        $query=sprintf($query, $recrutement);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            return $query;
        }
        return false;
    }
    public function getRecrutements($idService){
        $query="select * from recrutements where id_service_recrutement=%s";
        $query=sprintf($query, $idService);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            foreach($query as $row){
                $row->besoins=$this->getBesoinsByRecrutement($row->id_recrutement);
                $row->criteres=$this->getCriteresByRecrutement($row->id_recrutement);
                foreach($row->criteres as $critere){
                    $critere->choix=$this->getChoixByCritere($critere->id_critere);
                }
            }
            return $query;
        }
        return false;
    }
    public function getRecrutementById($idRecrutement){
        $query="select * from recrutements where id_recrutement=%s";
        $query=sprintf($query, $idRecrutement);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            $query[0]->besoins=$this->getBesoinsByRecrutement($query[0]->id_recrutement);
            $query[0]->criteres=$this->getCriteresByRecrutement($query[0]->id_recrutement);
            foreach($query[0]->criteres as $critere){
                $critere->choix=$this->getChoixByCritere($critere->id_critere);
            }
            return $query[0];
        }
        return false;
    }
}
