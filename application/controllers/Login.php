<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index($errorLog="")
	{
        // echo "<form action='".site_url("login/seConnecter")."' method='post'>
        // <input type='email' name='emailUser' value='jean'>
        // <input type='password' name='mdpUser' value='jean'>
        // <button type='submit'>Valider</button>
        // </form>";
		$errorLog=str_replace("_", " ", $errorLog);
		$data["errorLog"]=$errorLog;
		$this->load->view('pages/login', $data);
	}
    public function seConnecter(){
        $emailUser=$this->input->post("emailUser");
        $mdpUser=$this->input->post("mdpUser");
		// var_dump([$emailUser, $mdpUser]);
        $user=$this->login->checkLogin($emailUser, $mdpUser);
        if($user===false){
			$error="Email_ou_mot_de_passe_errone";
            redirect(site_url("login/index/".$error));
        }
        $this->session->set_userdata('user', $user);

		// var_dump($user);
		if($user->est_admin == '1') {
			redirect(site_url('recrutement/index'));
		} else {
			// tokony front office
			redirect("front/home");
		}
    }
	public function creerCompte(){
		$nom=$this->input->post("username");
		$email=$this->input->post("email");
		$mdp=$this->input->post("mdp");
		$this->login->creerCompte($nom, $email, $mdp);
		redirect("login");
	}
}
