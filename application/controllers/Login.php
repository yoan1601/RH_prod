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
	public function index()
	{
        echo "<form action='".site_url("login/seConnecter")."' method='post'>
        <input type='email' name='emailUser' value='jean'>
        <input type='password' name='mdpUser' value='jean'>
        <button type='submit'>Valider</button>
        </form>";
	}
    public function seConnecter(){
        $emailUser=$this->input->post("emailUser");
        $mdpUser=$this->input->post("mdpUser");
        $checkLogin=$this->login->checkLogin($emailUser, $mdpUser);
        if($checkLogin===false){
            redirect(site_url("login"));
        }
        var_dump($checkLogin);
    }
}
