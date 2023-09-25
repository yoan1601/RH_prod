<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

	public function index()
	{
		$data = [];

		$this->load->view('pages/home', ['data' => $data]);
	}

}
