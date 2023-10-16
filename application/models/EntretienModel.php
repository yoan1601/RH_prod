<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EntretienModel extends CI_Model {

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
	public function getAllTestsByServices($idService){
		$query="select * from v_test_services where id_service=%s";
		$query=sprintf($query, $idService);
        $query=$this->db->query($query);
        $query=$query->result();
        return $query;
	}
	public function getAllTestsByDepartement($idDepartement){
		$query="select * from v_test_services where id_dept_service=%s";
		$query=sprintf($query, $idDepartement);
        $query=$this->db->query($query);
        $query=$query->result();
        return $query;
	}
	public function getTestById($idTest){
		$query="select * from v_test_services where id_test=%s";
		$query=sprintf($query, $idTest);
        $query=$this->db->query($query);
        $query=$query->result();
		if(count($query)>0){
			$query[0]->questions=$this->getQuestionsFromTest($query[0]->id_test);
			return $query[0];
		}
		return $query;
	}
	public function getQuestionsFromTest($idTest){
		$query="select * from questionnaires where id_test_questionnaire=%s";
		$query=sprintf($query, $idTest);
        $query=$this->db->query($query);
        $query=$query->result();
		foreach($query as $row){
			$row->reponsesVraies=$this->getReponsesVraiesForQuestion($row->id_questionnaire);
		}
        return $query;
	}
	public function getReponsesVraiesForQuestion($idQuestionnaire){
		$query="select * from v_questionnaire_reponse_vrai_services where id_questionnaire=%s";
		$query=sprintf($query, $idQuestionnaire);
        $query=$this->db->query($query);
        $query=$query->result();
        return $query;
	}
	public function getPersonneTests($test){
		$query="select * from v_personne_tests where id_test_questionnaire=%s";
		$query=sprintf($query, $test->id_test);
        $query=$this->db->query($query);
        $query=$query->result();
		foreach($query as $row){
			$row->reponsesChoisies=$this->getReponsesChoisiesByTest($row->id_info_user, $test->id_test);
			$row->note=$this->getNoteForPersonneByTest($row, $test->questions);
		}
        return $query;
	}
	public function getPersonneFromListId($idpersonnes, $idTest){
		$test=$this->getTestById($idTest);
		$personnes=array();
        foreach($idpersonnes as $id){
            $query="select * from information_users where id_information_user=%s";
			$query=sprintf($query, $id);
			$query=$this->db->query($query);
			$query=$query->result();
			if(count($query)>0){
				$query[0]->reponsesChoisies=$this->getReponsesChoisiesByTest($query[0]->id_information_user, $test->id_test);
				$query[0]->note=$this->getNoteForPersonneByTest($query[0], $test->questions);
			}
			array_push($personnes, $query[0]);
        }
		return $personnes;
    }
	public function getReponsesChoisiesByTest($idPersonne, $idTest){
		$query="select * from v_reponse_choisi_tests where id_test_questionnaire=%s and id_info_user_questionnaire_reponse_choisi=%s";
		$query=sprintf($query, $idTest, $idPersonne);
        $query=$this->db->query($query);
        $query=$query->result();
        return $query;
	}
	public function getNoteForPersonneByTest($personne, $questions){
		$noteTotale=0;
		foreach($questions as $q){
			$correct=0;
			foreach($q->reponsesVraies as $reponse){
				$included=false;
				foreach($personne->reponsesChoisies as $choix){
					if($reponse->id_questionnaire_reponse == $choix->id_choix_reponse){
						$included=true;
						break;
					}
				}
				if($included===true){
					$correct++;
				}
			}
			if($correct==count($q->reponsesVraies)){
				$noteTotale+=$q->coefficient_question;
			}
		}
		return $noteTotale;
	}
	public function sortPersonnesByNote($personnes){
		$decoy;
		for($i=0;$i<count($personnes);$i++){
			for($j=$i;$j<count($personnes);$j++){
				if($personnes[$i]->note<$personnes[$j]->note){
					$decoy=$personnes[$j];
					$personnes[$j]=$personnes[$i];
					$personnes[$i]=$decoy;
				}
			}
		}
		return $personnes;
	}
	public function getPersonnesAdmis($personnes, $noteEliminatoire){
		$admis=array();
		foreach($personnes as $personne){
			if($personne->note>$noteEliminatoire){
				array_push($admis, $personne);
			}
		}
		return $admis;
	}
	public function getEntretiensByService($idService){
		$query="select * from v_entretien_services where id_service_recrutement=%s";
		$query=sprintf($query, $idService);
        $query=$this->db->query($query);
        $query=$query->result();
        return $query;
	}
	public function getDetailsEntretien($idEntretien){
		$query="select * from v_test_entretiens where id_entretien=%s";
		$query=sprintf($query, $idEntretien);
        $query=$this->db->query($query);
        $query=$query->result();
		if(count($query)>0){
			$query=$query[0];
			$query->personnes=$this->getPersonnesByEntretien($idEntretien);
			$query->personnes=$this->sortPersonnesByNote($query->personnes);
			$query->personnes=$this->getHoraireEntretien($query->personnes, $query->dateheure_entretien, $query->duree_entretien);
		}
        return $query;
	}
	public function getPersonnesByEntretien($idEntretien){
		$query="select * from v_personne_entretiens where id_entretien=%s";
		$query=sprintf($query, $idEntretien);
        $query=$this->db->query($query);
        $query=$query->result();
		foreach($query as $row){
			$row->reponsesChoisies=$this->getReponsesChoisiesByTest($row->id_information_user, $row->id_test);
			$test=$this->getTestById($row->id_test);
			$row->note=$this->getNoteForPersonneByTest($row, $test->questions);
		}
		return $query;
	}
	public function saveSelectionTest($idTest, $idInfoUser){
		$query="insert into test_selections values(null, %s, %s)";
		$query=sprintf($query, $idTest, $idInfoUser);
        $query=$this->db->query($query);
	}
	public function saveManySelectionTest($idTest, $idUsers){
		foreach($idUsers as $iduser){
			$this->saveSelectionTest($idTest, $iduser);
		}
	}
	public function saveEntretien($dateHeure, $lieu, $idUser, $idRecrutement, $duree){
		$query="insert into entretiens values(null, '%s', '%s', %s, %s, 1, %s)";
		$query=sprintf($query, $dateHeure, $lieu, $idUser, $idRecrutement, $duree);
        $query=$this->db->query($query);
	}
	public function getHoraireEntretien($personnes, $debut, $duree){
		$liste=$personnes;
		$debutEntretien=$debut;
		$debutEntretien=strtotime($debutEntretien);
		$liste[0]->heure=$debutEntretien;
		$liste[0]->heure=date('H:i:s', $liste[0]->heure);
		$debutEntretien=date('Y-m-d H:i:s', $debutEntretien);
		for($i=1;$i<count($liste);$i++){
			$debutEntretien=strtotime($debutEntretien." + ".$duree." minute");
			$liste[$i]->heure=$debutEntretien;
			$liste[$i]->heure=date('H:i:s', $liste[$i]->heure);
			$debutEntretien=date('Y-m-d H:i:s', $debutEntretien);
		}
		return $liste;
	}
}
