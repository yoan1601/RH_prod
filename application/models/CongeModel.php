<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChgtContratModel extends CI_Model {
    public function getCongeRestant($idEmploye){
        $query="select * from v_conges_restant where id_employe_demande_conge"
    }
} ?>