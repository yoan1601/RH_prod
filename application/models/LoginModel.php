<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

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
	public function checkLogin($email, $mdp){
        $query="select * from users where email_user='%s' and mdp_user='%s'";
        $query=sprintf($query, $email, $mdp);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            return $query[0];
        }
        return false;
    }
	public function creerCompte($nom, $email, $mdp){
		$query="insert into users values(null, '%s', '%s', '%s', 0, 1)";
        $query=sprintf($query, $nom, $email, $mdp);
        $query=$this->db->query($query);
	}
}
