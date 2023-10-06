<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceModel extends CI_Model {

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

	public function getAllServices() {
        $user = $this->session->user;
        
        // departement 
        $this->db->where('id_dept ', $user->id_dept);

        // Utilisez la fonction where() pour spécifier la condition WHERE
        $this->db->where('etat_service >', 0);

        // Effectuez la requête SELECT sur la table "services"
        $query = $this->db->get('v_service_dept');

        // Retournez les résultats de la requête
        return $query->result();
    }

    public function getServiceById($idService){
        $user = $this->session->user;
        $query="select * from v_service_dept where id_service=%s and id_dept=%s";
        $query=sprintf($query, $idService, $user->id_dept);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            return $query[0];
        }
        return $query;
    }
    public function saveService($nomService, $idDepartement){
        $query="insert into services values(null, '%s', 1, %s)";
        $query=sprintf($query, $nomService, $idDepartement);
        $query=$this->db->query($query);
    }
}
