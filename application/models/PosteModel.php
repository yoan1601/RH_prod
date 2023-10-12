<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PosteModel extends CI_Model {

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
	public function getPostesByService($idService){
        $query="select * from postes where id_service_poste=%s";
        $query=sprintf($query, $idService);
        $query=$this->db->query($query);
        $query=$query->result();
        return false;
    }
}
