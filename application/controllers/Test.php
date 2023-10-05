<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

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
		redirect(site_url('test/listeCv'));
	}

    public function listeCv($idService = 1) {
        $liste_cv = $this->test->getListeCv($idService);

		$data['liste_cv'] = $liste_cv;
		$data['idService'] = $idService;
		// var_dump($data);
		$this->load->view('back_test/listeCv', $data);
    }

	public function save()
	{
        // $idService = $this->session->idService;
		$nbQuestions = $this->input->post('nbQuestions'); 
        $questionsReponses = [];
        for ($i=1; $i <= $nbQuestions; $i++) { 
            $questionsReponses['question'.$i] = $this->input->post('question'.$i);
			$questionsReponses['coeff'.$i] = $this->input->post('coeff'.$i);
            for($k = 1; $this->input->post('reponse'.$i.$k) !== null; $k++) {
                $questionsReponses['reponse'.$i.$k] = $this->input->post('reponse'.$i.$k);
				if($this->input->post('check'.$i.$k) !== null) {
					$questionsReponses['estVrai'.$i.$k] = 1;
				} else {
					$questionsReponses['estVrai'.$i.$k] = 0;
				}
            }
        }

		// var_dump('$nbQuestions '.$nbQuestions);
		// var_dump($questionsReponses);

		$test = $this->session->test;

		// var_dump($test);
		$user = $this->session->user;

        $idTestInserted = $this->test->insertTest($test, $user);

		if($idTestInserted > 0) {
			$idService = $this->input->post('idService');
			$data['service'] = $this->service->getServiceById($idService);
			$data['questionsReponses'] = $questionsReponses;

			$this->test->insertQuestionnaire($questionsReponses, $idTestInserted);

			$this->load->view('back_test/questionnaireGenere', $data);
		}

		else {
			echo 'l\'insertion du test pose un probleme';
		}
		
	}

	public function insertCvSelection() {
		$idCvSelected = $this->input->post('cv');
		$idRecrutement = $this->input->post('idRecrutement');

		if($idCvSelected === null) { echo 'Aucun cv n\'a été selectionné';  }
		else {
			$idService = $this->input->post('idService');
			$user = $this->session->user;
			// inserer les cv selections
			$this->test->insertCvSelection($idCvSelected, $idRecrutement, $user);

			$data['service'] = $this->service->getServiceById($idService);
			$data['idRecrutement'] = $idRecrutement;
			$this->load->view('back_test/planTest', $data);
		}
	}

	public function setTestInSession() {
		$date_test = $this->input->post('date_test');
		$heure_test = $this->input->post('heure_test');
		$lieu_test = $this->input->post('lieu_test');
		$idRecrutement = $this->input->post('idRecrutement');
		$idService = $this->input->post('idService');

		// var_dump([$date_test, $heure_test, $lieu_test]);
		$test = array(
			'date_test' => $date_test,
			'heure_test' => $heure_test,
			'lieu_test' => $lieu_test,
			'idRecrutement' => $idRecrutement
		);

		$this->session->set_userdata('test', $test);
		$data['idService'] = $idService;

		$this->load->view('back_test/makeQuestionnaire', $data);
	}

}
