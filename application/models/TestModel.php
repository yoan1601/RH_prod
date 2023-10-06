<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestModel extends CI_Model {

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

    public function getDetailCV($id_cv) {
        // Utilisez la fonction where() pour spécifier la condition WHERE
        $this->db->where('id_cv ', $id_cv);

        // Effectuez la requête SELECT sur la table "services"
        $query = $this->db->get('v_detail_cv');

        // Retournez les résultats de la requête
        return $query->result();
    }

    public function insertQuestionnaire($questionsReponses, $idTest) {
        // $id_test_vao_tafiditra = $this->db->insert_id();

        for($i = 1; isset($questionsReponses['question'.$i]); $i++) {
            $data = array(
                'id_test_questionnaire' => $idTest,
                'question' => $questionsReponses['question'.$i],
                'coefficient_question' => $questionsReponses['coeff'.$i],
                'etat_questionnaire' => 1
            );

            if ($this->db->insert('questionnaires', $data)) {
                $id_question_vao_tafiditra = $this->db->insert_id();
                for($k = 1; isset($questionsReponses['reponse'.$i.$k]); $k++) {
                    $dataReponse = array(
                        'id_questionnaire_questionnaire_reponse' => $id_question_vao_tafiditra,
                        'questionnaire_reponse' => $questionsReponses['reponse'.$i.$k],
                        'est_vrai' => $questionsReponses['estVrai'.$i.$k]
                    );
                    $this->db->insert('questionnaire_reponses', $dataReponse);
                }
            }
        }
    }

    public function insertTest($test, $user) {
        $data = array(
            'dateheure_test' => $test['date_test'].' '.$test['heure_test'],
            'id_user_test' => $user->id_user,
            'lieu_test' => $test['lieu_test'],
            'id_recrutement_test' => $test['idRecrutement'],
            'etat_test' => 1
        );

        $this->db->insert('tests', $data);
        return $this->db->insert_id();
    }

    public function insertCvSelection($idCvSelected, $idRecrutement, $user) {
        foreach ($idCvSelected as $key => $idCv) {
            $data = array(
                'id_user_cv_selection' => $user->id_user,
                'id_cv_selected' => $idCv,
                'id_recrutement_cv_selection' => $idRecrutement
            );
    
            $this->db->insert('cv_selections', $data);
        }
        
    }

	public function getListeCv($idService = 1) {
        if($idService > 0) {
            // Utilisez la fonction where() pour spécifier la condition WHERE
            $this->db->where('id_service ', $idService);
        }
        
        $user = $this->session->user;
        $this->db->where('id_dept ', $user->id_dept);

        // Effectuez la requête SELECT sur la table "services"
        $query = $this->db->get('v_liste_cv');

        // Retournez les résultats de la requête
        return $query->result();
    }

    public function getServiceById($idService){
        $query="select * from services where id_service=%s";
        $query=sprintf($query, $idService);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            return $query[0];
        }
        return $query;
    }
}
