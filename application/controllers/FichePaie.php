<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FichePaie extends CI_Controller {

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
		redirect('fichePaie/listeEmploye');
	}

	public function genererFichePaie() {
		$idEmploye = $this->input->post('idEmploye');
		$data['employe'] = $this->fichePaie->getEmployeById($idEmploye);
		$data['categorie'] = $this->fichePaie->getCategorieEmployeByIdEmploye($idEmploye);
		$annees = floor($data['employe']->anciennete / 365);
		$mois = floor(($data['employe']->anciennete % 365) / 30);
		$jours = $data['employe']->anciennete % 30;
		$data['anciennete'] = $annees.' annee(s) '.$mois.' mois '.$jours.' jour(s) ';

		// salaire de base

		$data['allTypePrime'] = $this->fichePaie->getAllTypePrime();
		$data['allHsMajoration'] = $this->fichePaie->getAllHsMajoration();

		foreach ($data['allTypePrime'] as $key => $prime) {
			$data[$prime->nom_type_prime] = $this->input->post('prime_'.$prime->nom_type_prime); 
		}
		foreach ($data['allHsMajoration'] as $key => $majoration) {
			$data[$majoration->nom_majoration] = $this->input->post('hsMajoration_'.$majoration->id_majoration); 
		}

		$data['rappelPeriodeAnterieure'] = $this->input->post('rappelPeriodeAnterieure');
		$data['droitPreavis'] = $this->input->post('droitPreavis');
		$data['indemniteLicenciement'] = $this->input->post('indemniteLicenciement');
		$idTypeVirement = $this->input->post('idTypeVirement');
		$data['typeVirement'] = $this->fichePaie->getTypeVirementById($idTypeVirement);
	}

    public function listeEmploye() {
        $listeEmp = $this->fichePaie->getAllEmploye();
		$data['listeEmp'] = $listeEmp;
		$dateActuelle=(new DateTime())->format("d/m/Y");
		$data['dateActuelle'] = $dateActuelle;
		$data['services'] = $this->service->getAllServices();
		$this->load->view('back_test/listeEmployeFiche', $data);
    }

	public function creationMajFichePaie($idEmploye = 1) {
		$data['services'] = $this->service->getAllServices();
		$data['employe'] = $this->fichePaie->getEmployeById($idEmploye);
		$data['moisActuel'] = date('F');
		$data['anneeActuelle'] = date('Y');
		$data['allTypeVirement'] = $this->fichePaie->getAllTypeVirement();
		$data['allTypePrime'] = $this->fichePaie->getAllTypePrime();
		$data['allHsMajoration'] = $this->fichePaie->getAllHsMajoration();
		$this->load->view('back_test/preFichePaie', $data);
	}

}
