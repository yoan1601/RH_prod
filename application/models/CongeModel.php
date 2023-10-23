<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CongeModel extends CI_Model {
    public function getDebutAnnee3Ans($idEmploye){
        $dateActuelle=date_create();
        $dateActuelle_string=$dateActuelle->format("Y-m-d");
        $date_embauche=$this->employe->getAnneeEmbauche($idEmploye);
        $debutAnnee=$date_embauche;
        $date=date_create($debutAnnee);
        while(strtotime($debutAnnee)<strtotime($dateActuelle_string)){
            $date=date_add($date, date_interval_create_from_date_string("1 year"));
            $debutAnnee=$date->format("Y-m-d");
        }
        $date=date_sub($date, date_interval_create_from_date_string("3 years"));
        if($date<date_create($date_embauche)){
            $date=date_create($date_embauche);
        }
        $date_string=$date->format("Y-m-d");
        return $date_string;
    }
    public function getCongeCumules($idEmploye){
        $debutAnneeTravail=$this->getDebutAnnee3Ans($idEmploye);
        $query="select (datediff(now(), '%s')/30)*2.5 as conge_cumules";
        $query=sprintf($query, $debutAnneeTravail);
        $query=$this->db->query($query);
        return $query->row()->conge_cumules;
    }
    public function getCongesPrisPeriode($idEmploye){
        $debutAnnee3ans=$this->getDebutAnnee3Ans($idEmploye);
        $dateActuelle=date_create();
        $query="select * from v_conge_finis where id_employe_conge=%s and id_type_conge_demande_conge=1 order by fin_conge";
        $query=sprintf($query, $idEmploye, $debutAnnee3ans);
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            if(date_create($query[0]->debut_conge)<date_create($debutAnnee3ans)){
                $query[0]->debut_conge=$debutAnnee3ans;
            }
        }
        return $query;
    }
    public function getCongePrisPeriodeTotal($idEmploye){
        $conges=$this->getCongesPrisPeriode($idEmploye);
        $somme=0;
        if($conges!==null){
            foreach($conges as $c){
                $somme+=((strtotime($c->fin_conge)-strtotime($c->debut_conge))/86400);
            }
        }
        return $somme;
    }
    public function getCongesRestants($idEmploye){
        $congeCumules=$this->getCongeCumules($idEmploye);
        $congesPris=$this->getCongePrisPeriodeTotal($idEmploye);
        return $congeCumules-$congesPris;
    }
    public function saveDemandeConge($conge){
        $query="insert into demande_conges values(null, %s, '%s', '%s', '%s', 0, %s, '%s')";
        $query=sprintf($query, $conge["idemploye"], $conge["date_demande"], $conge["debut_conge"], $conge["fin_conge"], $conge["type_conge"], $conge["motif"]);
        $this->db->query($query);
    }
    public function getDemandesConge($idService){
        $query="select * from v_demande_conge_employe_services where id_service=%s and valide_demande_conge=0";
        $query=sprintf($query, $idService);
        $query=$this->db->query($query);
        return $query->result();
    }
    public function getDemandesCongeById($idDemande){
        $query="select * from v_demande_conge_employe_services where id_demande_conge=%s and valide_demande_conge=0";
        $query=sprintf($query, $idDemande);
        $query=$this->db->query($query);
        $query=$query->row();
        $query->duree=(strtotime($query->fin_demande_conge)-strtotime($query->debut_demande_conge))/86400;
        return $query;
    }
    public function validerConge($idDemande){
        $demande=$this->getDemandesCongeById($idDemande);
        $this->saveDebutConge($demande->id_demande_conge, $demande->id_employe, $demande->debut_demande_conge);
        $lastIdConge=$this->getLastIdConge();
        $this->saveFinConge($lastIdConge, $demande->fin_demande_conge);
        $query="update demande_conges set valide_demande_conge=1 where id_demande_conge=%s";
        $query=sprintf($query, $idDemande);
        $this->db->query($query);
        $this->db->close();
    }
    public function saveDebutConge($idDemande, $idEmploye, $debut){
        $query="insert into conges values(null, %s, %s, '%s')";
        $query=sprintf($query, $idEmploye, $idDemande, $debut);
        $this->db->query($query);
        $this->db->close();
    }
    public function getLastIdConge(){
        $query="select max(id_conge) as last_id from conges";
        $query=$this->db->query($query);
        return $query->row()->last_id;
    }
    public function saveFinConge($idConge, $fin){
        $query="insert into fin_conges values(null, %s, '%s')";
        $query=sprintf($query, $idConge, $fin);
        $this->db->query($query);
        $this->db->close();
    }
} ?>