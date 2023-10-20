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
		// verifier si employe manana contrat_travails
		$manana_contrat_travail_ve = $this->fichePaie->mananaContratTravail($idEmploye);

		// si non -> alaina le  salaire_brut_essai
		$contrat_essai_actuel = $this->fichePaie->getLatestContratEssai($idEmploye);
		$data['salaire_base'] = $contrat_essai_actuel->salaire_brut_essai; 
		// si oui -> alaina le salaire_brut anle dernier contrat travail
		if($manana_contrat_travail_ve > 0) {
			$contrat_travail_actuel = $this->fichePaie->getLatestContratTravail($idEmploye);
			$data['salaire_base'] = $contrat_travail_actuel->salaire_brut;
		}

		$data['allTypePrime'] = $this->fichePaie->getAllTypePrime();
		$data['allHsMajoration'] = $this->fichePaie->getAllHsMajoration();

		foreach ($data['allTypePrime'] as $key => $prime) {
			$data[$prime->nom_type_prime] = $this->input->post('prime_'.$prime->nom_type_prime); 
		}
		foreach ($data['allHsMajoration'] as $key => $majoration) {
			$data[$majoration->nom_majoration] = $this->input->post('hsMajoration_'.$majoration->id_majoration); 
		}

		$data['rappelPeriodeAnterieure'] = $this->input->post('rappelPeriodeAnterieure');
		if($data['rappelPeriodeAnterieure'] == '') $data['rappelPeriodeAnterieure'] = 0;

		$data['droitPreavis'] = $this->input->post('droitPreavis');
		if($data['droitPreavis'] == '') $data['droitPreavis'] = 0;

		$data['indemniteLicenciement'] = $this->input->post('indemniteLicenciement');
		$idTypeVirement = $this->input->post('idTypeVirement');
		$data['typeVirement'] = $this->fichePaie->getTypeVirementById($idTypeVirement);
		$data['avance'] = $this->input->post('avance');

		if($data['avance'] == '') $data['avance'] = 0;

		//CONGE  -> tokony azo avy any amle conge
		$data['nbJourCongePaye'] = 1;

		//PROCESSION calcul
		$this->fichePaie->etablir_elements_calculs($data);

		$this->load->view('pages/fichePaie/fichePaie.php', $data);
	}

    public function listeEmploye() {
        $listeEmp = $this->fichePaie->getAllEmploye();
		$data['listeEmp'] = $listeEmp;
		$dateActuelle=(new DateTime())->format("d/m/Y");
		$data['dateActuelle'] = $dateActuelle;
		$data['services'] = $this->service->getAllServices();
		$this->load->view('pages/fichePaie/creationFichePaie.php', $data);
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
