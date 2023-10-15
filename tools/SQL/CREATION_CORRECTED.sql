CREATE SCHEMA rh_prod;

CREATE  TABLE categories ( 
	id_categorie         INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_categorie        VARCHAR(35)  NOT NULL     ,
	niveau               INT  NOT NULL     
 ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE departements ( 
	id_dept              INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_dept             VARCHAR(35)  NOT NULL     
 ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE employes ( 
	id_employe           INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	matricule_employe    VARCHAR(50)  NOT NULL     ,
	id_info_employe      INT  NOT NULL     ,
	id_type_contrat_employe INT  NOT NULL     ,
	etat_employe         INT   DEFAULT (1)    
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE entretien_selections ( 
	id_entretien_selection INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_entretien_entretien_selection INT  NOT NULL     ,
	id_info_entretien_selection INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE hierarchies ( 
	id_hierarchie        INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_employe_hierarchie INT  NOT NULL     ,
	id_employe_collaborateur INT  NOT NULL     ,
	position_hierarchie  INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_hierarchies_employes ON hierarchies ( id_employe_hierarchie );

CREATE INDEX fk_hierarchies_employes_0 ON hierarchies ( id_employe_collaborateur );

CREATE  TABLE postes ( 
	id_poste             INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_poste            VARCHAR(100)  NOT NULL     ,
	id_categorie_poste   INT  NOT NULL     ,
	id_service_poste     INT  NOT NULL DEFAULT (1)    
 ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE services ( 
	id_service           INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_service          VARCHAR(35)  NOT NULL     ,
	etat_service         INT  NOT NULL DEFAULT (_cp850'1')    ,
	id_dept_service      INT  NOT NULL DEFAULT (_cp850'1')    
 ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_services_departements ON services ( id_dept_service );

CREATE  TABLE type_contrats ( 
	id_type_contrat      INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	code_type_contrat    VARCHAR(35)  NOT NULL     ,
	nom_type_contrat     VARCHAR(35)  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE users ( 
	id_user              INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_user             VARCHAR(35)  NOT NULL     ,
	email_user           VARCHAR(35)  NOT NULL     ,
	mdp_user             VARCHAR(35)  NOT NULL     ,
	est_admin            INT  NOT NULL DEFAULT (0)    ,
	etat_user            INT  NOT NULL DEFAULT (1)    
 ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE information_users ( 
	id_information_user  INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_user_information_user INT  NOT NULL     ,
	nom_info             VARCHAR(35)  NOT NULL     ,
	prenom_info          VARCHAR(35)  NOT NULL     ,
	sexe_info            CHAR(1)  NOT NULL     ,
	date_naissance_info  DATE  NOT NULL     ,
	contact_info         VARCHAR(35)  NOT NULL     ,
	addresse_info        VARCHAR(35)  NOT NULL     ,
	etat_info            INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_information_users_users ON information_users ( id_user_information_user );

CREATE  TABLE recrutements ( 
	id_recrutement       INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_service_recrutement INT  NOT NULL     ,
	dateheure_recrutement DATETIME  NOT NULL DEFAULT (now())    ,
	etat_recrutement     INT  NOT NULL DEFAULT (1)    ,
	id_poste_recrutement INT  NOT NULL     ,
	mission              TEXT       
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_recrutements_services ON recrutements ( id_service_recrutement );

CREATE  TABLE tests ( 
	id_test              INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	dateheure_test       DATETIME  NOT NULL DEFAULT (now())    ,
	id_user_test         INT  NOT NULL     ,
	lieu_test            VARCHAR(35)  NOT NULL     ,
	id_recrutement_test  INT  NOT NULL     ,
	etat_test            INT  NOT NULL DEFAULT (1)    
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX id_user_test ON tests ( id_user_test );

CREATE INDEX id_recrutement_test ON tests ( id_recrutement_test );

CREATE  TABLE user_departements ( 
	id_user_departement  INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_user_user_dept    INT  NOT NULL     ,
	id_dept_user_dept    INT  NOT NULL     
 ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_user_departements_users ON user_departements ( id_user_user_dept );

CREATE INDEX fk_user_departements_departements ON user_departements ( id_dept_user_dept );

CREATE  TABLE besoins ( 
	id_besoin            INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_recrutement_besoin INT  NOT NULL     ,
	homme_jour           DECIMAL(10,0)  NOT NULL     ,
	etat_besoin          INT  NOT NULL DEFAULT (_cp850'1')    
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_besoins_recrutements ON besoins ( id_recrutement_besoin );

CREATE  TABLE contrat_essai ( 
	id_contrat_essai     INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_info_contrat_essai INT       ,
	date_contrat_essai   DATE  NOT NULL     ,
	id_recrutement_contrat_essai INT       ,
	salaire_brut_essai   DECIMAL(10,0)  NOT NULL     ,
	salaire_net_essai    DECIMAL(10,0)  NOT NULL     ,
	duree_contrat_essai  DECIMAL(10,0)  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX id_info_contrat_essai ON contrat_essai ( id_info_contrat_essai );

CREATE INDEX id_recrutement_contrat_essai ON contrat_essai ( id_recrutement_contrat_essai );

CREATE  TABLE contrat_travails ( 
	id_contrat_travail   INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	date_debut_contrat_travail DATE   DEFAULT (curdate())    ,
	id_employe_contrat_travail INT  NOT NULL     ,
	id_recrutement_contrat_travail INT  NOT NULL     ,
	duree_contrat_travail DECIMAL(10,2)       ,
	affiliation_cnaps    INT  NOT NULL     ,
	affiliation_organisme_sanitaire INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_contrat_travails_recrutements ON contrat_travails ( id_recrutement_contrat_travail );

CREATE INDEX fk_contrat_travails_employes ON contrat_travails ( id_employe_contrat_travail );

CREATE  TABLE criteres ( 
	id_critere           INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_recrutement_critere INT  NOT NULL     ,
	descri_critere       VARCHAR(35)  NOT NULL     ,
	etat_critere         INT  NOT NULL DEFAULT (1)    ,
	fichier_critere      TEXT       
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_criteres_recrutements ON criteres ( id_recrutement_critere );

CREATE  TABLE cv ( 
	id_cv                INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_info_user_cv      INT  NOT NULL     ,
	dateheure_remplissage DATETIME  NOT NULL DEFAULT (now())    ,
	id_recrutement_cv    INT  NOT NULL     ,
	etat_cv              INT  NOT NULL DEFAULT (1)    
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_cv_recrutements ON cv ( id_recrutement_cv );

CREATE INDEX fk_cv_information_users ON cv ( id_info_user_cv );

CREATE  TABLE cv_selections ( 
	id_cv_selection      INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_user_cv_selection INT  NOT NULL     ,
	id_cv_selected       INT  NOT NULL     ,
	id_recrutement_cv_selection INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX id_user_cv_selection ON cv_selections ( id_user_cv_selection );

CREATE INDEX id_cv_selected ON cv_selections ( id_cv_selected );

CREATE INDEX id_recrutement_cv_selection ON cv_selections ( id_recrutement_cv_selection );

CREATE  TABLE entretiens ( 
	id_entretien         INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	dateheure_entretien  DATETIME  NOT NULL DEFAULT (now())    ,
	lieu_entretien       VARCHAR(35)  NOT NULL     ,
	id_user_entretien    INT  NOT NULL     ,
	id_recrutement_entretien INT  NOT NULL     ,
	etat_entretien       INT  NOT NULL DEFAULT (1)    ,
	duree_entretien      DECIMAL(10,2)  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX id_user_entretien ON entretiens ( id_user_entretien );

CREATE INDEX id_recrutement_entretien ON entretiens ( id_recrutement_entretien );

CREATE  TABLE note_entretiens ( 
	id_note_entretien    INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_info_note_entretien INT       ,
	note_entretien       DECIMAL(10,0)  NOT NULL     ,
	id_entretien_note_entretien INT       
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX id_info_note_entretien ON note_entretiens ( id_info_note_entretien );

CREATE INDEX id_entretien_note_entretien ON note_entretiens ( id_entretien_note_entretien );

CREATE  TABLE questionnaires ( 
	id_questionnaire     INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_test_questionnaire INT  NOT NULL     ,
	question             TEXT  NOT NULL     ,
	coefficient_question DECIMAL(10,0)  NOT NULL     ,
	etat_questionnaire   INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX id_test_questionnaire ON questionnaires ( id_test_questionnaire );

CREATE  TABLE test_selections ( 
	id_test_selection    INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_test_test_selection INT  NOT NULL     ,
	id_info_user_test_selection INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_test_selections_tests ON test_selections ( id_test_test_selection );

CREATE INDEX fk_test_selections_information_users ON test_selections ( id_info_user_test_selection );

CREATE  TABLE avantages ( 
	id_avantage          INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_contrat_travail_avantage INT       ,
	nom_avantage         VARCHAR(255)  NOT NULL     ,
	prix_avantage        DECIMAL(10,0)       
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX id_contrat_travail_avantage ON avantages ( id_contrat_travail_avantage );

CREATE  TABLE choix_criteres ( 
	id_choix_critere     INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	choix_critere        VARCHAR(35)  NOT NULL     ,
	coefficient_critere  DECIMAL(10,0)  NOT NULL     ,
	id_critere_choix     INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_choix_criteres_criteres ON choix_criteres ( id_critere_choix );

CREATE  TABLE cv_reponses ( 
	id_cv_reponse        INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_cv_cv_reponse     INT  NOT NULL     ,
	id_critere_cv_reponse INT  NOT NULL     ,
	id_choix_cv_reponse  INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_cv_reponses_cv ON cv_reponses ( id_cv_cv_reponse );

CREATE INDEX fk_cv_reponses_criteres ON cv_reponses ( id_critere_cv_reponse );

CREATE INDEX id_choix_cv_reponse ON cv_reponses ( id_choix_cv_reponse );

CREATE  TABLE questionnaire_reponses ( 
	id_questionnaire_reponse INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_questionnaire_questionnaire_reponse INT  NOT NULL     ,
	questionnaire_reponse TEXT  NOT NULL     ,
	est_vrai             INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX id_questionnaire_questionnaire_reponse ON questionnaire_reponses ( id_questionnaire_questionnaire_reponse );

CREATE  TABLE questionnaire_reponse_choisis ( 
	id_questionnaire_reponse_choisi INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_info_user_questionnaire_reponse_choisi INT  NOT NULL     ,
	id_choix_reponse     INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX id_choix_reponse ON questionnaire_reponse_choisis ( id_choix_reponse );

CREATE INDEX fk_questionnaire_reponse_choisis_information_users ON questionnaire_reponse_choisis ( id_info_user_questionnaire_reponse_choisi );

ALTER TABLE avantages ADD CONSTRAINT avantages_ibfk_1 FOREIGN KEY ( id_contrat_travail_avantage ) REFERENCES contrat_travails( id_contrat_travail ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE besoins ADD CONSTRAINT fk_besoins_recrutements FOREIGN KEY ( id_recrutement_besoin ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE choix_criteres ADD CONSTRAINT fk_choix_criteres_criteres FOREIGN KEY ( id_critere_choix ) REFERENCES criteres( id_critere ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE contrat_essai ADD CONSTRAINT contrat_essai_ibfk_1 FOREIGN KEY ( id_info_contrat_essai ) REFERENCES information_users( id_information_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE contrat_essai ADD CONSTRAINT contrat_essai_ibfk_2 FOREIGN KEY ( id_recrutement_contrat_essai ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE contrat_travails ADD CONSTRAINT fk_contrat_travails_employes FOREIGN KEY ( id_employe_contrat_travail ) REFERENCES employes( id_employe ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE contrat_travails ADD CONSTRAINT fk_contrat_travails_recrutements FOREIGN KEY ( id_recrutement_contrat_travail ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE criteres ADD CONSTRAINT fk_criteres_recrutements FOREIGN KEY ( id_recrutement_critere ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv ADD CONSTRAINT fk_cv_information_users FOREIGN KEY ( id_info_user_cv ) REFERENCES information_users( id_information_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv ADD CONSTRAINT fk_cv_recrutements FOREIGN KEY ( id_recrutement_cv ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv_reponses ADD CONSTRAINT cv_reponses_ibfk_1 FOREIGN KEY ( id_choix_cv_reponse ) REFERENCES choix_criteres( id_choix_critere ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv_reponses ADD CONSTRAINT fk_cv_reponses_criteres FOREIGN KEY ( id_critere_cv_reponse ) REFERENCES criteres( id_critere ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv_reponses ADD CONSTRAINT fk_cv_reponses_cv FOREIGN KEY ( id_cv_cv_reponse ) REFERENCES cv( id_cv ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv_selections ADD CONSTRAINT cv_selections_ibfk_1 FOREIGN KEY ( id_user_cv_selection ) REFERENCES users( id_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv_selections ADD CONSTRAINT cv_selections_ibfk_2 FOREIGN KEY ( id_cv_selected ) REFERENCES cv( id_cv ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv_selections ADD CONSTRAINT cv_selections_ibfk_3 FOREIGN KEY ( id_recrutement_cv_selection ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE entretiens ADD CONSTRAINT entretiens_ibfk_1 FOREIGN KEY ( id_user_entretien ) REFERENCES users( id_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE entretiens ADD CONSTRAINT entretiens_ibfk_2 FOREIGN KEY ( id_recrutement_entretien ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE hierarchies ADD CONSTRAINT fk_hierarchies_employes FOREIGN KEY ( id_employe_hierarchie ) REFERENCES employes( id_employe ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE hierarchies ADD CONSTRAINT fk_hierarchies_employes_0 FOREIGN KEY ( id_employe_collaborateur ) REFERENCES employes( id_employe ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE information_users ADD CONSTRAINT fk_information_users_users FOREIGN KEY ( id_user_information_user ) REFERENCES users( id_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE note_entretiens ADD CONSTRAINT note_entretiens_ibfk_1 FOREIGN KEY ( id_info_note_entretien ) REFERENCES information_users( id_information_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE note_entretiens ADD CONSTRAINT note_entretiens_ibfk_2 FOREIGN KEY ( id_entretien_note_entretien ) REFERENCES entretiens( id_entretien ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE questionnaire_reponse_choisis ADD CONSTRAINT fk_questionnaire_reponse_choisis_information_users FOREIGN KEY ( id_info_user_questionnaire_reponse_choisi ) REFERENCES information_users( id_information_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE questionnaire_reponse_choisis ADD CONSTRAINT questionnaire_reponse_choisis_ibfk_2 FOREIGN KEY ( id_choix_reponse ) REFERENCES questionnaire_reponses( id_questionnaire_reponse ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE questionnaire_reponses ADD CONSTRAINT questionnaire_reponses_ibfk_1 FOREIGN KEY ( id_questionnaire_questionnaire_reponse ) REFERENCES questionnaires( id_questionnaire ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE questionnaires ADD CONSTRAINT questionnaires_ibfk_1 FOREIGN KEY ( id_test_questionnaire ) REFERENCES tests( id_test ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE recrutements ADD CONSTRAINT fk_recrutements_services FOREIGN KEY ( id_service_recrutement ) REFERENCES services( id_service ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE services ADD CONSTRAINT fk_services_departements FOREIGN KEY ( id_dept_service ) REFERENCES departements( id_dept ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE test_selections ADD CONSTRAINT fk_test_selections_information_users FOREIGN KEY ( id_info_user_test_selection ) REFERENCES information_users( id_information_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE test_selections ADD CONSTRAINT fk_test_selections_tests FOREIGN KEY ( id_test_test_selection ) REFERENCES tests( id_test ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE tests ADD CONSTRAINT tests_ibfk_1 FOREIGN KEY ( id_user_test ) REFERENCES users( id_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE tests ADD CONSTRAINT tests_ibfk_2 FOREIGN KEY ( id_recrutement_test ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE user_departements ADD CONSTRAINT fk_user_departements_departements FOREIGN KEY ( id_dept_user_dept ) REFERENCES departements( id_dept ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE user_departements ADD CONSTRAINT fk_user_departements_users FOREIGN KEY ( id_user_user_dept ) REFERENCES users( id_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE VIEW v_detail_cv AS select `info`.`id_information_user` AS `id_information_user`,`info`.`id_user_information_user` AS `id_user_information_user`,`info`.`nom_info` AS `nom_info`,`info`.`prenom_info` AS `prenom_info`,`info`.`sexe_info` AS `sexe_info`,`info`.`date_naissance_info` AS `date_naissance_info`,`info`.`contact_info` AS `contact_info`,`info`.`addresse_info` AS `addresse_info`,`info`.`etat_info` AS `etat_info`,`rh_prod`.`cv`.`id_cv` AS `id_cv`,`cr`.`descri_critere` AS `critere`,`choix`.`choix_critere` AS `choix` from ((((`rh_prod`.`cv` left join `rh_prod`.`information_users` `info` on((`rh_prod`.`cv`.`id_info_user_cv` = `info`.`id_information_user`))) left join `rh_prod`.`cv_reponses` `cv_rep` on((`cv_rep`.`id_cv_cv_reponse` = `rh_prod`.`cv`.`id_cv`))) left join `rh_prod`.`criteres` `cr` on((`cv_rep`.`id_critere_cv_reponse` = `cr`.`id_critere`))) left join `rh_prod`.`choix_criteres` `choix` on((`cv_rep`.`id_choix_cv_reponse` = `choix`.`id_choix_critere`))) where (`rh_prod`.`cv`.`etat_cv` > 0);

CREATE VIEW v_entretien_services AS select `rh_prod`.`entretiens`.`id_entretien` AS `id_entretien`,`rh_prod`.`entretiens`.`dateheure_entretien` AS `dateheure_entretien`,`rh_prod`.`entretiens`.`lieu_entretien` AS `lieu_entretien`,`rh_prod`.`entretiens`.`id_user_entretien` AS `id_user_entretien`,`rh_prod`.`entretiens`.`id_recrutement_entretien` AS `id_recrutement_entretien`,`rh_prod`.`entretiens`.`etat_entretien` AS `etat_entretien`,`rh_prod`.`entretiens`.`duree_entretien` AS `duree_entretien`,`rh_prod`.`recrutements`.`id_recrutement` AS `id_recrutement`,`rh_prod`.`recrutements`.`id_service_recrutement` AS `id_service_recrutement`,`rh_prod`.`recrutements`.`dateheure_recrutement` AS `dateheure_recrutement`,`rh_prod`.`recrutements`.`etat_recrutement` AS `etat_recrutement`,`rh_prod`.`recrutements`.`id_poste_recrutement` AS `id_poste_recrutement`,`rh_prod`.`recrutements`.`mission` AS `mission` from (`rh_prod`.`entretiens` join `rh_prod`.`recrutements` on((`rh_prod`.`entretiens`.`id_recrutement_entretien` = `rh_prod`.`recrutements`.`id_recrutement`)));

CREATE VIEW v_liste_cv AS select `s`.`id_service` AS `id_service`,`dept`.`id_dept` AS `id_dept`,`dept`.`nom_dept` AS `nom_dept`,`rh_prod`.`cv`.`id_cv` AS `id_cv`,`info`.`id_information_user` AS `id_information_user`,`info`.`nom_info` AS `nom`,`info`.`prenom_info` AS `prenom`,`rh_prod`.`cv`.`dateheure_remplissage` AS `reception`,(to_days(now()) - to_days(`rh_prod`.`cv`.`dateheure_remplissage`)) AS `duree`,sum(`choix`.`coefficient_critere`) AS `note`,`r`.`id_recrutement` AS `id_recrutement` from ((((((`rh_prod`.`cv` left join `rh_prod`.`information_users` `info` on((`info`.`id_information_user` = `rh_prod`.`cv`.`id_info_user_cv`))) left join `rh_prod`.`cv_reponses` `cvr` on((`cvr`.`id_cv_cv_reponse` = `rh_prod`.`cv`.`id_cv`))) left join `rh_prod`.`choix_criteres` `choix` on((`choix`.`id_choix_critere` = `cvr`.`id_choix_cv_reponse`))) left join `rh_prod`.`recrutements` `r` on((`r`.`id_recrutement` = `rh_prod`.`cv`.`id_recrutement_cv`))) left join `rh_prod`.`services` `s` on((`s`.`id_service` = `r`.`id_service_recrutement`))) left join `rh_prod`.`departements` `dept` on((`s`.`id_dept_service` = `dept`.`id_dept`))) group by `info`.`id_information_user` order by `note` desc;

CREATE VIEW v_personne_entretiens AS select `rh_prod`.`v_test_entretiens`.`id_entretien` AS `id_entretien`,`rh_prod`.`v_test_entretiens`.`dateheure_entretien` AS `dateheure_entretien`,`rh_prod`.`v_test_entretiens`.`lieu_entretien` AS `lieu_entretien`,`rh_prod`.`v_test_entretiens`.`id_user_entretien` AS `id_user_entretien`,`rh_prod`.`v_test_entretiens`.`id_recrutement_entretien` AS `id_recrutement_entretien`,`rh_prod`.`v_test_entretiens`.`etat_entretien` AS `etat_entretien`,`rh_prod`.`v_test_entretiens`.`duree_entretien` AS `duree_entretien`,`rh_prod`.`v_test_entretiens`.`id_test` AS `id_test`,`rh_prod`.`v_test_entretiens`.`dateheure_test` AS `dateheure_test`,`rh_prod`.`v_test_entretiens`.`id_user_test` AS `id_user_test`,`rh_prod`.`v_test_entretiens`.`lieu_test` AS `lieu_test`,`rh_prod`.`v_test_entretiens`.`id_recrutement_test` AS `id_recrutement_test`,`rh_prod`.`v_test_entretiens`.`etat_test` AS `etat_test`,`rh_prod`.`test_selections`.`id_test_selection` AS `id_test_selection`,`rh_prod`.`test_selections`.`id_test_test_selection` AS `id_test_test_selection`,`rh_prod`.`test_selections`.`id_info_user_test_selection` AS `id_info_user_test_selection`,`rh_prod`.`information_users`.`id_information_user` AS `id_information_user`,`rh_prod`.`information_users`.`id_user_information_user` AS `id_user_information_user`,`rh_prod`.`information_users`.`nom_info` AS `nom_info`,`rh_prod`.`information_users`.`prenom_info` AS `prenom_info`,`rh_prod`.`information_users`.`sexe_info` AS `sexe_info`,`rh_prod`.`information_users`.`date_naissance_info` AS `date_naissance_info`,`rh_prod`.`information_users`.`contact_info` AS `contact_info`,`rh_prod`.`information_users`.`addresse_info` AS `addresse_info`,`rh_prod`.`information_users`.`etat_info` AS `etat_info` from ((`rh_prod`.`v_test_entretiens` join `rh_prod`.`test_selections` on((`rh_prod`.`v_test_entretiens`.`id_test` = `rh_prod`.`test_selections`.`id_test_test_selection`))) join `rh_prod`.`information_users` on((`rh_prod`.`test_selections`.`id_info_user_test_selection` = `rh_prod`.`information_users`.`id_information_user`)));

CREATE VIEW v_personne_tests AS select distinct `rh_prod`.`vrc`.`id_info_user_questionnaire_reponse_choisi` AS `id_info_user`,`rh_prod`.`vrc`.`id_test_questionnaire` AS `id_test_questionnaire`,`iu`.`id_information_user` AS `id_information_user`,`iu`.`id_user_information_user` AS `id_user_information_user`,`iu`.`nom_info` AS `nom_info`,`iu`.`prenom_info` AS `prenom_info`,`iu`.`sexe_info` AS `sexe_info`,`iu`.`date_naissance_info` AS `date_naissance_info`,`iu`.`contact_info` AS `contact_info`,`iu`.`addresse_info` AS `addresse_info`,`iu`.`etat_info` AS `etat_info` from (`rh_prod`.`v_reponse_choisi_tests` `vrc` join `rh_prod`.`information_users` `iu` on((`rh_prod`.`vrc`.`id_info_user_questionnaire_reponse_choisi` = `iu`.`id_information_user`)));

CREATE VIEW v_questionaire_services AS select `rh_prod`.`tests`.`id_test` AS `id_test`,`rh_prod`.`tests`.`dateheure_test` AS `dateheure_test`,`rh_prod`.`tests`.`id_user_test` AS `id_user_test`,`rh_prod`.`tests`.`lieu_test` AS `lieu_test`,`rh_prod`.`tests`.`id_recrutement_test` AS `id_recrutement_test`,`rh_prod`.`tests`.`etat_test` AS `etat_test`,`r`.`id_recrutement` AS `id_recrutement`,`r`.`id_service_recrutement` AS `id_service_recrutement`,`r`.`dateheure_recrutement` AS `dateheure_recrutement`,`r`.`etat_recrutement` AS `etat_recrutement`,`r`.`id_poste_recrutement` AS `id_poste_recrutement`,`r`.`mission` AS `mission`,`rh_prod`.`services`.`id_service` AS `id_service`,`rh_prod`.`services`.`nom_service` AS `nom_service`,`rh_prod`.`services`.`etat_service` AS `etat_service`,`rh_prod`.`services`.`id_dept_service` AS `id_dept_service`,`rh_prod`.`questionnaires`.`id_questionnaire` AS `id_questionnaire`,`rh_prod`.`questionnaires`.`id_test_questionnaire` AS `id_test_questionnaire`,`rh_prod`.`questionnaires`.`question` AS `question`,`rh_prod`.`questionnaires`.`coefficient_question` AS `coefficient_question`,`rh_prod`.`questionnaires`.`etat_questionnaire` AS `etat_questionnaire` from (((`rh_prod`.`tests` join `rh_prod`.`recrutements` `r` on((`rh_prod`.`tests`.`id_recrutement_test` = `r`.`id_recrutement`))) join `rh_prod`.`services` on((`r`.`id_service_recrutement` = `rh_prod`.`services`.`id_service`))) join `rh_prod`.`questionnaires` on((`rh_prod`.`tests`.`id_test` = `rh_prod`.`questionnaires`.`id_test_questionnaire`)));

CREATE VIEW v_questionnaire_reponse_services AS select `rh_prod`.`vq`.`id_test` AS `id_test`,`rh_prod`.`vq`.`dateheure_test` AS `dateheure_test`,`rh_prod`.`vq`.`id_user_test` AS `id_user_test`,`rh_prod`.`vq`.`lieu_test` AS `lieu_test`,`rh_prod`.`vq`.`id_recrutement_test` AS `id_recrutement_test`,`rh_prod`.`vq`.`etat_test` AS `etat_test`,`rh_prod`.`vq`.`id_recrutement` AS `id_recrutement`,`rh_prod`.`vq`.`id_service_recrutement` AS `id_service_recrutement`,`rh_prod`.`vq`.`dateheure_recrutement` AS `dateheure_recrutement`,`rh_prod`.`vq`.`etat_recrutement` AS `etat_recrutement`,`rh_prod`.`vq`.`id_poste_recrutement` AS `id_poste_recrutement`,`rh_prod`.`vq`.`mission` AS `mission`,`rh_prod`.`vq`.`id_service` AS `id_service`,`rh_prod`.`vq`.`nom_service` AS `nom_service`,`rh_prod`.`vq`.`etat_service` AS `etat_service`,`rh_prod`.`vq`.`id_dept_service` AS `id_dept_service`,`rh_prod`.`vq`.`id_questionnaire` AS `id_questionnaire`,`rh_prod`.`vq`.`id_test_questionnaire` AS `id_test_questionnaire`,`rh_prod`.`vq`.`question` AS `question`,`rh_prod`.`vq`.`coefficient_question` AS `coefficient_question`,`rh_prod`.`vq`.`etat_questionnaire` AS `etat_questionnaire`,`rh_prod`.`questionnaire_reponses`.`id_questionnaire_reponse` AS `id_questionnaire_reponse`,`rh_prod`.`questionnaire_reponses`.`id_questionnaire_questionnaire_reponse` AS `id_questionnaire_questionnaire_reponse`,`rh_prod`.`questionnaire_reponses`.`questionnaire_reponse` AS `questionnaire_reponse`,`rh_prod`.`questionnaire_reponses`.`est_vrai` AS `est_vrai` from (`rh_prod`.`v_questionaire_services` `vq` join `rh_prod`.`questionnaire_reponses` on((`rh_prod`.`vq`.`id_questionnaire` = `rh_prod`.`questionnaire_reponses`.`id_questionnaire_questionnaire_reponse`)));

CREATE VIEW v_questionnaire_reponse_vrai_services AS select `rh_prod`.`v_questionnaire_reponse_services`.`id_test` AS `id_test`,`rh_prod`.`v_questionnaire_reponse_services`.`dateheure_test` AS `dateheure_test`,`rh_prod`.`v_questionnaire_reponse_services`.`id_user_test` AS `id_user_test`,`rh_prod`.`v_questionnaire_reponse_services`.`lieu_test` AS `lieu_test`,`rh_prod`.`v_questionnaire_reponse_services`.`id_recrutement_test` AS `id_recrutement_test`,`rh_prod`.`v_questionnaire_reponse_services`.`etat_test` AS `etat_test`,`rh_prod`.`v_questionnaire_reponse_services`.`id_recrutement` AS `id_recrutement`,`rh_prod`.`v_questionnaire_reponse_services`.`id_service_recrutement` AS `id_service_recrutement`,`rh_prod`.`v_questionnaire_reponse_services`.`dateheure_recrutement` AS `dateheure_recrutement`,`rh_prod`.`v_questionnaire_reponse_services`.`etat_recrutement` AS `etat_recrutement`,`rh_prod`.`v_questionnaire_reponse_services`.`id_poste_recrutement` AS `id_poste_recrutement`,`rh_prod`.`v_questionnaire_reponse_services`.`mission` AS `mission`,`rh_prod`.`v_questionnaire_reponse_services`.`id_service` AS `id_service`,`rh_prod`.`v_questionnaire_reponse_services`.`nom_service` AS `nom_service`,`rh_prod`.`v_questionnaire_reponse_services`.`etat_service` AS `etat_service`,`rh_prod`.`v_questionnaire_reponse_services`.`id_dept_service` AS `id_dept_service`,`rh_prod`.`v_questionnaire_reponse_services`.`id_questionnaire` AS `id_questionnaire`,`rh_prod`.`v_questionnaire_reponse_services`.`id_test_questionnaire` AS `id_test_questionnaire`,`rh_prod`.`v_questionnaire_reponse_services`.`question` AS `question`,`rh_prod`.`v_questionnaire_reponse_services`.`coefficient_question` AS `coefficient_question`,`rh_prod`.`v_questionnaire_reponse_services`.`etat_questionnaire` AS `etat_questionnaire`,`rh_prod`.`v_questionnaire_reponse_services`.`id_questionnaire_reponse` AS `id_questionnaire_reponse`,`rh_prod`.`v_questionnaire_reponse_services`.`id_questionnaire_questionnaire_reponse` AS `id_questionnaire_questionnaire_reponse`,`rh_prod`.`v_questionnaire_reponse_services`.`questionnaire_reponse` AS `questionnaire_reponse`,`rh_prod`.`v_questionnaire_reponse_services`.`est_vrai` AS `est_vrai` from `rh_prod`.`v_questionnaire_reponse_services` where (`rh_prod`.`v_questionnaire_reponse_services`.`est_vrai` = 1);

CREATE VIEW v_recrutement_dept AS select `recru`.`id_recrutement` AS `id_recrutement`,`recru`.`id_service_recrutement` AS `id_service_recrutement`,`recru`.`dateheure_recrutement` AS `dateheure_recrutement`,`recru`.`etat_recrutement` AS `etat_recrutement`,`s`.`id_service` AS `id_service`,`s`.`nom_service` AS `nom_service`,`s`.`etat_service` AS `etat_service`,`s`.`id_dept_service` AS `id_dept_service`,`dept`.`id_dept` AS `id_dept`,`dept`.`nom_dept` AS `nom_dept` from ((`rh_prod`.`recrutements` `recru` left join `rh_prod`.`services` `s` on((`s`.`id_service` = `recru`.`id_service_recrutement`))) left join `rh_prod`.`departements` `dept` on((`s`.`id_dept_service` = `dept`.`id_dept`)));

CREATE VIEW v_reponse_choisi_tests AS select `rc`.`id_questionnaire_reponse_choisi` AS `id_questionnaire_reponse_choisi`,`rc`.`id_info_user_questionnaire_reponse_choisi` AS `id_info_user_questionnaire_reponse_choisi`,`rc`.`id_choix_reponse` AS `id_choix_reponse`,`rh_prod`.`vrs`.`id_test` AS `id_test`,`rh_prod`.`vrs`.`dateheure_test` AS `dateheure_test`,`rh_prod`.`vrs`.`id_user_test` AS `id_user_test`,`rh_prod`.`vrs`.`lieu_test` AS `lieu_test`,`rh_prod`.`vrs`.`id_recrutement_test` AS `id_recrutement_test`,`rh_prod`.`vrs`.`etat_test` AS `etat_test`,`rh_prod`.`vrs`.`id_recrutement` AS `id_recrutement`,`rh_prod`.`vrs`.`id_service_recrutement` AS `id_service_recrutement`,`rh_prod`.`vrs`.`dateheure_recrutement` AS `dateheure_recrutement`,`rh_prod`.`vrs`.`etat_recrutement` AS `etat_recrutement`,`rh_prod`.`vrs`.`id_poste_recrutement` AS `id_poste_recrutement`,`rh_prod`.`vrs`.`mission` AS `mission`,`rh_prod`.`vrs`.`id_service` AS `id_service`,`rh_prod`.`vrs`.`nom_service` AS `nom_service`,`rh_prod`.`vrs`.`etat_service` AS `etat_service`,`rh_prod`.`vrs`.`id_dept_service` AS `id_dept_service`,`rh_prod`.`vrs`.`id_questionnaire` AS `id_questionnaire`,`rh_prod`.`vrs`.`id_test_questionnaire` AS `id_test_questionnaire`,`rh_prod`.`vrs`.`question` AS `question`,`rh_prod`.`vrs`.`coefficient_question` AS `coefficient_question`,`rh_prod`.`vrs`.`etat_questionnaire` AS `etat_questionnaire`,`rh_prod`.`vrs`.`id_questionnaire_reponse` AS `id_questionnaire_reponse`,`rh_prod`.`vrs`.`id_questionnaire_questionnaire_reponse` AS `id_questionnaire_questionnaire_reponse`,`rh_prod`.`vrs`.`questionnaire_reponse` AS `questionnaire_reponse`,`rh_prod`.`vrs`.`est_vrai` AS `est_vrai` from (`rh_prod`.`questionnaire_reponse_choisis` `rc` join `rh_prod`.`v_questionnaire_reponse_services` `vrs` on((`rc`.`id_choix_reponse` = `rh_prod`.`vrs`.`id_questionnaire_reponse`)));

CREATE VIEW v_service_dept AS select `s`.`id_service` AS `id_service`,`s`.`nom_service` AS `nom_service`,`s`.`etat_service` AS `etat_service`,`s`.`id_dept_service` AS `id_dept_service`,`dept`.`id_dept` AS `id_dept`,`dept`.`nom_dept` AS `nom_dept` from (`rh_prod`.`services` `s` left join `rh_prod`.`departements` `dept` on((`s`.`id_dept_service` = `dept`.`id_dept`)));

CREATE VIEW v_test_entretiens AS select `rh_prod`.`entretiens`.`id_entretien` AS `id_entretien`,`rh_prod`.`entretiens`.`dateheure_entretien` AS `dateheure_entretien`,`rh_prod`.`entretiens`.`lieu_entretien` AS `lieu_entretien`,`rh_prod`.`entretiens`.`id_user_entretien` AS `id_user_entretien`,`rh_prod`.`entretiens`.`id_recrutement_entretien` AS `id_recrutement_entretien`,`rh_prod`.`entretiens`.`etat_entretien` AS `etat_entretien`,`rh_prod`.`entretiens`.`duree_entretien` AS `duree_entretien`,`rh_prod`.`tests`.`id_test` AS `id_test`,`rh_prod`.`tests`.`dateheure_test` AS `dateheure_test`,`rh_prod`.`tests`.`id_user_test` AS `id_user_test`,`rh_prod`.`tests`.`lieu_test` AS `lieu_test`,`rh_prod`.`tests`.`id_recrutement_test` AS `id_recrutement_test`,`rh_prod`.`tests`.`etat_test` AS `etat_test` from (`rh_prod`.`entretiens` join `rh_prod`.`tests` on((`rh_prod`.`entretiens`.`id_recrutement_entretien` = `rh_prod`.`tests`.`id_recrutement_test`)));

CREATE VIEW v_test_services AS select `rh_prod`.`tests`.`id_test` AS `id_test`,`rh_prod`.`tests`.`dateheure_test` AS `dateheure_test`,`rh_prod`.`tests`.`id_user_test` AS `id_user_test`,`rh_prod`.`tests`.`lieu_test` AS `lieu_test`,`rh_prod`.`tests`.`id_recrutement_test` AS `id_recrutement_test`,`rh_prod`.`tests`.`etat_test` AS `etat_test`,`rh_prod`.`recrutements`.`id_recrutement` AS `id_recrutement`,`rh_prod`.`recrutements`.`id_service_recrutement` AS `id_service_recrutement`,`rh_prod`.`recrutements`.`dateheure_recrutement` AS `dateheure_recrutement`,`rh_prod`.`recrutements`.`etat_recrutement` AS `etat_recrutement`,`rh_prod`.`recrutements`.`id_poste_recrutement` AS `id_poste_recrutement`,`rh_prod`.`recrutements`.`mission` AS `mission`,`rh_prod`.`services`.`id_service` AS `id_service`,`rh_prod`.`services`.`nom_service` AS `nom_service`,`rh_prod`.`services`.`etat_service` AS `etat_service`,`rh_prod`.`services`.`id_dept_service` AS `id_dept_service` from ((`rh_prod`.`tests` join `rh_prod`.`recrutements` on((`rh_prod`.`tests`.`id_recrutement_test` = `rh_prod`.`recrutements`.`id_recrutement`))) join `rh_prod`.`services` on((`rh_prod`.`recrutements`.`id_service_recrutement` = `rh_prod`.`services`.`id_service`)));

CREATE VIEW v_user_dept AS select `u`.`id_user` AS `id_user`,`u`.`nom_user` AS `nom_user`,`u`.`email_user` AS `email_user`,`u`.`mdp_user` AS `mdp_user`,`u`.`est_admin` AS `est_admin`,`u`.`etat_user` AS `etat_user`,`u_dept`.`id_user_departement` AS `id_user_departement`,`u_dept`.`id_user_user_dept` AS `id_user_user_dept`,`u_dept`.`id_dept_user_dept` AS `id_dept_user_dept`,`dept`.`id_dept` AS `id_dept`,`dept`.`nom_dept` AS `nom_dept` from ((`rh_prod`.`users` `u` left join `rh_prod`.`user_departements` `u_dept` on((`u_dept`.`id_user_user_dept` = `u`.`id_user`))) left join `rh_prod`.`departements` `dept` on((`u_dept`.`id_dept_user_dept` = `dept`.`id_dept`)));
