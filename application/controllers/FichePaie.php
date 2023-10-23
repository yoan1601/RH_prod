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

	public function listeFichePaie() {
		$services = $this->service->getAllServices();
		$allFichePaie = $this->fichePaie->getAllFichePaieData()[0];
		$dataFichePaie = $this->fichePaie->getAllFichePaieData()[1];

		$nbChiffreVirgule = 2;
		$somme=array("salaire_base"=>0,"HSUP"=>0,"Primes"=>0,"Retenues"=>0,"net"=>0,"avance"=>0,"net_a_payer"=>0,"autres_indemnites"=>0,"net_mois"=>0);
		foreach($allFichePaie as $fichePaie){
			if($fichePaie->id_contrat_travail!==null){
				$somme["salaire_base"]+=$fichePaie->salaire_brut;
			}else{
				$somme["salaire_base"]+=$fichePaie->salaire_brut_essai;
			}
			$somme["HSUP"]+=$dataFichePaie['somme'.$fichePaie->id_fiche_paie]->total_hs;
			$somme["Primes"]+=$dataFichePaie['somme'.$fichePaie->id_fiche_paie]->total_prime;
			$somme["Retenues"]+=$dataFichePaie['somme'.$fichePaie->id_fiche_paie]->total_retenue;
			$somme["net"]+=$dataFichePaie['salaire_net'.$fichePaie->id_fiche_paie];
			$somme["avance"]+=$dataFichePaie['somme'.$fichePaie->id_fiche_paie]->total_avance;
			$somme["net_a_payer"]+=$dataFichePaie['net_a_payer'.$fichePaie->id_fiche_paie];
			$somme["autres_indemnites"]+=$dataFichePaie['somme'.$fichePaie->id_fiche_paie]->total_indemnite;
			$somme["net_mois"]+=$dataFichePaie['net_mois'.$fichePaie->id_fiche_paie];
		}
		$this->load->view('pages/fichePaie/etatPaie', ['allFichePaie' => $allFichePaie, 'dataFichePaie' => $dataFichePaie, 'services' => $services, 'nbChiffreVirgule' => $nbChiffreVirgule,'somme'=>$somme]);
	}

	public function saveFiche() {
		$data = $this->session->fiche_data;
		// creer fiche de paie + recuperer id fiche de paie
		$idFichePaie = $this->fichePaie->insertFichePaie($data);
		//primes
		foreach ($data['allTypePrime'] as $key => $prime) {
			$montant_prime = $data[$prime->nom_type_prime];
			$this->fichePaie->insertPrime($idFichePaie, $prime->id_type_prime, $montant_prime);
		}
		//HS
		foreach ($data['allHsMajoration'] as $key => $majoration) {
			$montant_HS = $data['montantHS'.$majoration->nom_majoration];
			$this->fichePaie->insertHS($idFichePaie, $majoration->id_majoration, $montant_HS);
		}
		//droit
		$montant_indemnite_licencement = $data['indemniteLicenciement'];
		$montant_droit_preavis = $data['droitPreavis'];
		$montant_rappel_droit_anterieur = $data['rappelPeriodeAnterieure'];

		$droits = array(
			0 => array( 'libele' => 'Indamnite de licencement', 'montant' => $montant_indemnite_licencement ),	
			1 => array( 'libele' => 'Droit de preavis', 'montant' => $montant_droit_preavis ),	
			2 => array( 'libele' => 'Rappel de droit anterieur', 'montant' => $montant_rappel_droit_anterieur )		
		);

		$this->fichePaie->insertDroitsSalaire($idFichePaie,$droits);

		foreach ($data['allTranche_IRSA'] as $key => $IRSA) {
			$montant_IRSA = $data['IRSA'.$IRSA->pourcentage_irsa];
			$idTypeRetenue = $IRSA->id_tranche_irsa;
			$this->fichePaie->insertRetenue($idFichePaie, $idTypeRetenue, $montant_IRSA);
		}

		$this->fichePaie->insertAvance($idFichePaie, $data['avance']);

		redirect('fichePaie');
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
		$data['contrat_actuel'] = $contrat_essai_actuel;
		$data['is_contrat_essai'] = 1;
		// si oui -> alaina le salaire_brut anle dernier contrat travail
		if($manana_contrat_travail_ve > 0) {
			$contrat_travail_actuel = $this->fichePaie->getLatestContratTravail($idEmploye);
			$data['salaire_base'] = $contrat_travail_actuel->salaire_brut;
			$data['contrat_actuel'] = $contrat_travail_actuel;
			$data['is_contrat_essai'] = 0;
		}

		$data['allTypePrime'] = $this->fichePaie->getAllTypePrime();
		$data['allHsMajoration'] = $this->fichePaie->getAllHsMajoration();

		foreach ($data['allTypePrime'] as $key => $prime) {
			$montantPrime = $this->input->post('prime_'.$prime->nom_type_prime) == '' ? 0 : $this->input->post('prime_'.$prime->nom_type_prime); 
			$data[$prime->nom_type_prime] = $montantPrime; 
		}
		foreach ($data['allHsMajoration'] as $key => $majoration) {
			$nbHeurHS = $this->input->post('hsMajoration_'.$majoration->id_majoration) == '' ? 0 : $this->input->post('hsMajoration_'.$majoration->id_majoration);
			$data[$majoration->nom_majoration] = $nbHeurHS; 
		}

		$data['rappelPeriodeAnterieure'] = $this->input->post('rappelPeriodeAnterieure');
		if($data['rappelPeriodeAnterieure'] == '') $data['rappelPeriodeAnterieure'] = 0;

		$data['droitPreavis'] = $this->input->post('droitPreavis');
		if($data['droitPreavis'] == '') $data['droitPreavis'] = 0;

		$data['indemniteLicenciement'] = $this->input->post('indemniteLicenciement');
		if($data['indemniteLicenciement'] == '') $data['indemniteLicenciement'] = 0;
		
		$idTypeVirement = $this->input->post('idTypeVirement');
		$data['typeVirement'] = $this->fichePaie->getTypeVirementById($idTypeVirement);
		$data['avance'] = $this->input->post('avance');

		if($data['avance'] == '') $data['avance'] = 0;

		//CONGE  -> tokony azo avy any amle conge
		$data['nbJourCongePaye'] = $this->conge->getCongePrisPeriodeTotal($idEmploye);

		$data['nbChiffreApresVirugle'] = 2;

		$services = $this->service->getAllServices();
		//PROCESSION calcul
		$data = $this->fichePaie->etablir_elements_calculs($data);

		$this->session->set_userdata('fiche_data', $data);

		// var_dump($data);
		$this->load->view('pages/fichePaie/fichePaie', ['data' => $data, 'services' => $services]);
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
		$this->load->view('pages/fichePaie/avantFiche', $data);
	}

}
