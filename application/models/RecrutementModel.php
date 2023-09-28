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
    public function saveCritere($criteresOptions) {
        $nextIdRecrutement = $this->getLastIdRecrutement() + 1;
        
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
        $query="insert into recrutements values(null, %s, '%s', null)";
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
}
