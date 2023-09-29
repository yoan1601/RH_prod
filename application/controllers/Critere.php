<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Critere extends CI_Controller {

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
		$hommeJour=$this->input->post("hommeJour");
        $this->session->set_userdata("hommeJour", $hommeJour);
		$this->load->view('pages/creation_critere');
	}

    public function setInSession()
	{
        $idService = $this->session->idService;
		$nbCriteres = $this->input->post('nbCriteres'); 
        $criteresOptions = [];
        for ($i=1; $i <= $nbCriteres; $i++) { 
            $criteresOptions['critere'.$i] = $this->input->post('critere'.$i);
            for($k = 1; $this->input->post('option'.$i.$k) !== null; $k++) {
                $criteresOptions['option'.$i.$k] = $this->input->post('option'.$i.$k);
                $criteresOptions['coeff'.$i.$k] = $this->input->post('coeff'.$i.$k);
            }
        }

		// var_dump('$nbCriteres '.$nbCriteres);
		// var_dump($criteresOptions);

        $this->session->set_userdata('criteresOptions', $criteresOptions);

        redirect('recrutement/enregistreRecrutement');
	}
}
