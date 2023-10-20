<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FichePaieModel extends CI_Model {

    public function etablir_elements_calculs($data) {
        $salaire_base = $data['salaire_base'];
        $data['taux_journalier'] = $salaire_base / 30;
        $data['taux_horaire'] = $salaire_base / 173.33;
        $data['indice'] = $data['taux_horaire'] / 1.334;
        $data['plafond_cnaps'] = 20000;

        $dateActuelle = new DateTime();

        // Définit la date au 1er jour du mois en cours
        $datePremierDuMois = new DateTime($dateActuelle->format('Y-m-01'));

        // Calcule la différence en jours
        $interval = $dateActuelle->diff($datePremierDuMois);
        $nombreDeJours = $interval->days;
        $data['salaire_debutMois_now'] = $nombreDeJours * $data['taux_journalier'];

        $nombreAbsenceHeure = 0;
        $data['absence_deductible'] = $nombreAbsenceHeure * -$data['taux_horaire'];

        $data['total_prime'] = 0;
        //primes
        foreach ($data['allTypePrime'] as $key => $prime) {
			$heurePrime = $data[$prime->nom_type_prime];
            $data['montantPrime'.$prime->nom_type_prime] = $heurePrime * $data['taux_horaire'];
            $data['total_prime'] += $data['montantPrime'.$prime->nom_type_prime];
		}

        //HS
        $data['total_HS'] = 0;
        foreach ($data['allHsMajoration'] as $key => $HS) {
			$heureHS = $data[$HS->nom_type_HS];
            $data['montantHS'.$HS->nom_type_HS] = $heureHS * ($data['taux_horaire'] * (1 + $HS->majoration));
            $data['total_HS'] += $data['montantHS'.$HS->nom_type_HS];
		}

        $data['tauxDroitConge'] = ($salaire_base - $data['avance']) / 30;
        $data['montantDroitConge'] = $data['nbJourCongePaye'] * $data['tauxDroitConge'];

        $data['totalPositif'] = $salaire_base + $data['total_prime'] + $data['total_HS'] + $data['rappelPeriodeAnterieure'] + $data['montantDroitConge'] + $data['droitPreavis'] + $data['indemniteLicenciement'];
        $data['totalNegatif'] = $data['absence_deductible'];
        $data['salaire_brut'] = $data['totalPositif'] - $data['totalNegatif'];

        $data['cnaps1pourcent'] = $data['salaire_brut'] * (1/100); 
        $data['sanitaire'] = $data['salaire_brut'] * (1/100); 

        if($data['salaire_brut'] > $data['plafond_cnaps']) {
            $data['cnaps1pourcent'] = $data['plafond_cnaps'];
        }

        // IRSA
        $data['allTranche_IRSA'] = $this->fichePaie->getAllIRSA();
        $data['totalIRSA'] = 0;
        foreach ($data['allTranche_IRSA'] as $key => $tranche) {
            if($tranche->max_tranche > 0) {
                if($data['salaire_brut'] >= $tranche->max_tranche) {
                    $data['IRSA'.$tranche->pourcentage_irsa] = ($tranche->max_tranche - $tranche->min_tranche) * ($tranche->pourcentage_irsa / 100);
                }
            } else { // max tranche null
                if($data['salaire_brut'] > $tranche->min_tranche) {
                    $data['IRSA'.$tranche->pourcentage_irsa] = ($tranche->max_tranche - $tranche->min_tranche) * ($tranche->pourcentage_irsa / 100);
                }
            }
            $data['totalIRSA'] += $data['IRSA'.$tranche->pourcentage_irsa];
        }

        $data['total_retenue'] = $data['cnaps1pourcent'] +  $data['sanitaire'] + $data['totalIRSA'];
        $data['net_a_payer'] = $data['salaire_brut'] - ($data['total_retenue'] + $data['avance']);
    }

    public function getAllIRSA() {
        $query = $this->db->get('tranche_irsa');
        $result = $query->result();
        return $result;
    }

    public function getLatestContratEssai($idEmploye) {
        $this->db->where('date_contrat_essai ','MAX(date_contrat_essai)');
        $this->db->where('id_employe ',$idEmploye);
        $query = $this->db->get('v_recrutement_poste_info_employe_contrat_essai');
        return $query->result()[0];
    }

    public function getLatestContratTravail($idEmploye) {
        $this->db->where('date_debut_contrat_travail ','MAX(date_debut_contrat_travail)');
        $this->db->where('id_employe_contrat_travail ',$idEmploye);
        $query = $this->db->get('contrat_travails');
        return $query->result()[0];
    }

    public function mananaContratTravail($idEmploye) {
        $this->db->where('id_employe_contrat_travail ',$idEmploye);
        $query = $this->db->get('contrat_travails');
        $result = $query->result();
        return count($result);
    }

    public function getCategorieEmployeByIdEmploye($idEmploye) {
        $this->db->where('id_employe ',$idEmploye);
        $query = $this->db->get('v_recrutement_poste_info_employe');
        return $query->result()[0];
    }

    public function getTypeVirementById($idTypeVirement) {
        $this->db->where('id_type_virement ',$idTypeVirement);
        $query = $this->db->get('type_virements');
        return $query->result()[0];
    }

    public function getAllHsMajoration() {
        $query = $this->db->get('hs_majorations');
        return $query->result();
    }

    public function getAllTypePrime() {
        $query = $this->db->get('type_primes');
        return $query->result();
    }

    public function getAllTypeVirement() {
        $query = $this->db->get('type_virements');
        return $query->result();
    }

    public function getAllEmploye() {
        $this->db->where('etat_employe > ',0);
        $query = $this->db->get('v_recrutement_poste_info_employe_contrat_essai');
        return $query->result();
    }

    public function getEmployeById($idEmploye) {
        $this->db->where('id_employe ',$idEmploye);
        $query = $this->db->get('v_recrutement_poste_info_employe_contrat_essai');
        return $query->result()[0];
    }
}
