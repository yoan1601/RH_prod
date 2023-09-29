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
        // Utilisez la fonction where() pour spécifier la condition WHERE
        $this->db->where('etat_service >', 0);

        // Effectuez la requête SELECT sur la table "services"
        $query = $this->db->get('services');

        // Retournez les résultats de la requête
        return $query->result();
    }

    public function getServiceById($idService){
        $query="select * from services where id_service=%s";
        $query=sprintf($query, $idService);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            return $query[0];
        }
        return $query;
    }
}
