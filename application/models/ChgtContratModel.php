<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChgtContratModel extends CI_Model {
    public function getInfoRecrutementPosteByIdInfoUser($id_info) {
        $query = $this->db->get('v_recrutement_poste_info');

        $query="select * from v_recrutement_poste_info where id_information_user=%s";
        $query=sprintf($query, $id_info);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            return $query[0];
        }
        return $query;
    }
}
