<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

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
		$this->load->view('pages/login');
	}

    public function connect()
	{
		$this->load->view('pages/accueil');
	}

	public function inscription(){
		$this->load->view('pages/inscription');	
	}

	public function home(){
        $data = [];
        $data['services'] = $this->service->getAllServices();
        $this->load->view('pages/home', $data);	
	}

	public function creation(){
		$data = [];
        $data['services'] = $this->service->getAllServices();
		$this->load->view('pages/creation_service',$data);
	}

	public function besoin(){
		$data = [];
        $data['services'] = $this->service->getAllServices();
		$this->load->view('pages/definitionBesoin',$data);
	}

	public function listAnnonce(){
		$data = [];
        $data['services'] = $this->service->getAllServices();
		$this->load->view('pages/listAnnonce',$data);
	}

	public function linker(){
		$data = [];
        $data['services'] = $this->service->getAllServices();
		$this->load->view('pages/front-office/detailNotification',$data);
	}
}
