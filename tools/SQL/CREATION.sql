CREATE  TABLE test_selections ( 
	id_test_selection    INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_test_test_selection INT  NOT NULL     ,
	id_info_user_test_selection INT  NOT NULL     
 ) engine=InnoDB;

ALTER TABLE test_selections ADD CONSTRAINT fk_test_selections_tests FOREIGN KEY ( id_test_test_selection ) REFERENCES tests( id_test ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE test_selections ADD CONSTRAINT fk_test_selections_information_users FOREIGN KEY ( id_info_user_test_selection ) REFERENCES information_users( id_information_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE  TABLE services ( 
	id_service           INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_service          VARCHAR(35)  NOT NULL     ,
	etat_service         INT  NOT NULL DEFAULT ('1')    
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE users ( 
	id_user              INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_user             VARCHAR(35)  NOT NULL     ,
	email_user           VARCHAR(35)  NOT NULL     ,
	mdp_user             VARCHAR(35)  NOT NULL     ,
	est_admin            INT  NOT NULL DEFAULT (0)    ,
	etat_user            INT  NOT NULL DEFAULT (1)    
 ) engine=InnoDB;

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
	etat_recrutement     INT  NOT NULL DEFAULT (1)    
 ) engine=InnoDB;

CREATE INDEX fk_recrutements_services ON recrutements ( id_service_recrutement );

CREATE  TABLE tests ( 
	id_test              INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	dateheure_test       DATETIME  NOT NULL DEFAULT (now())    ,
	id_user_test         INT  NOT NULL     ,
	lieu_test            VARCHAR(35)  NOT NULL     ,
	id_recrutement_test  INT  NOT NULL     ,
	etat_test            INT  NOT NULL DEFAULT (1)    
 ) engine=InnoDB;

CREATE INDEX id_user_test ON tests ( id_user_test );

CREATE INDEX id_recrutement_test ON tests ( id_recrutement_test );

CREATE  TABLE besoins ( 
	id_besoin            INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_recrutement_besoin INT  NOT NULL     ,
	homme_jour           DECIMAL(10,0)  NOT NULL     ,
	etat_besoin          INT  NOT NULL DEFAULT ('1')    
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_besoins_recrutements ON besoins ( id_recrutement_besoin );

CREATE  TABLE criteres ( 
	id_critere           INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_recrutement_critere INT  NOT NULL     ,
	descri_critere       VARCHAR(35)  NOT NULL     ,
	etat_critere         INT  NOT NULL DEFAULT (1)    ,
	fichier_critere      TEXT       
 ) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE INDEX fk_criteres_recrutements ON criteres ( id_recrutement_critere );

CREATE  TABLE cv ( 
	id_cv                INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_info_user_cv      INT  NOT NULL     ,
	dateheure_remplissage DATETIME  NOT NULL DEFAULT (now())    ,
	id_recrutement_cv    INT  NOT NULL     ,
	etat_cv              INT  NOT NULL DEFAULT (1)    
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_cv_users ON cv ( id_info_user_cv );

CREATE INDEX fk_cv_recrutements ON cv ( id_recrutement_cv );

ALTER TABLE cv ADD CONSTRAINT fk_cv_recrutements FOREIGN KEY ( id_recrutement_cv ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv ADD CONSTRAINT fk_cv_information_users FOREIGN KEY ( id_info_user_cv ) REFERENCES information_users( id_information_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE INDEX fk_cv_recrutements ON cv ( id_recrutement_cv );

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

CREATE  TABLE questionnaires ( 
	id_questionnaire     INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_test_questionnaire INT  NOT NULL     ,
	question             TEXT  NOT NULL     ,
	coefficient_question DECIMAL(10,0)  NOT NULL     ,
	etat_questionnaire   INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX id_test_questionnaire ON questionnaires ( id_test_questionnaire );

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
 ) engine=InnoDB;

CREATE INDEX fk_cv_reponses_cv ON cv_reponses ( id_cv_cv_reponse );

CREATE INDEX fk_cv_reponses_criteres ON cv_reponses ( id_critere_cv_reponse );

CREATE INDEX id_choix_cv_reponse ON cv_reponses ( id_choix_cv_reponse );

CREATE  TABLE questionnaire_reponses ( 
	id_questionnaire_reponse INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_questionnaire_questionnaire_reponse INT  NOT NULL     ,
	questionnaire_reponse TEXT  NOT NULL     ,
	est_vrai             INT  NOT NULL     
 ) engine=InnoDB;

CREATE INDEX id_questionnaire_questionnaire_reponse ON questionnaire_reponses ( id_questionnaire_questionnaire_reponse );

CREATE  TABLE questionnaire_reponse_choisis ( 
	id_questionnaire_reponse_choisi INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_info_user_questionnaire_reponse_choisi INT  NOT NULL     ,
	id_choix_reponse     INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX id_user_questionnaire_reponse_choisi ON questionnaire_reponse_choisis ( id_info_user_questionnaire_reponse_choisi );

CREATE INDEX id_choix_reponse ON questionnaire_reponse_choisis ( id_choix_reponse );

ALTER TABLE questionnaire_reponse_choisis ADD CONSTRAINT questionnaire_reponse_choisis_ibfk_2 FOREIGN KEY ( id_choix_reponse ) REFERENCES questionnaire_reponses( id_questionnaire_reponse ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE questionnaire_reponse_choisis ADD CONSTRAINT fk_questionnaire_reponse_choisis_information_users FOREIGN KEY ( id_info_user_questionnaire_reponse_choisi ) REFERENCES information_users( id_information_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;


CREATE INDEX id_choix_reponse ON questionnaire_reponse_choisis ( id_choix_reponse );

ALTER TABLE besoins ADD CONSTRAINT fk_besoins_recrutements FOREIGN KEY ( id_recrutement_besoin ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE choix_criteres ADD CONSTRAINT fk_choix_criteres_criteres FOREIGN KEY ( id_critere_choix ) REFERENCES criteres( id_critere ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE criteres ADD CONSTRAINT fk_criteres_recrutements FOREIGN KEY ( id_recrutement_critere ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv ADD CONSTRAINT fk_cv_users FOREIGN KEY ( id_user_cv ) REFERENCES users( id_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv ADD CONSTRAINT fk_cv_recrutements FOREIGN KEY ( id_recrutement_cv ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv_reponses ADD CONSTRAINT fk_cv_reponses_cv FOREIGN KEY ( id_cv_cv_reponse ) REFERENCES cv( id_cv ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv_reponses ADD CONSTRAINT fk_cv_reponses_criteres FOREIGN KEY ( id_critere_cv_reponse ) REFERENCES criteres( id_critere ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv_reponses ADD CONSTRAINT cv_reponses_ibfk_1 FOREIGN KEY ( id_choix_cv_reponse ) REFERENCES choix_criteres( id_choix_critere ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv_selections ADD CONSTRAINT cv_selections_ibfk_1 FOREIGN KEY ( id_user_cv_selection ) REFERENCES users( id_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv_selections ADD CONSTRAINT cv_selections_ibfk_2 FOREIGN KEY ( id_cv_selected ) REFERENCES cv( id_cv ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE cv_selections ADD CONSTRAINT cv_selections_ibfk_3 FOREIGN KEY ( id_recrutement_cv_selection ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE entretiens ADD CONSTRAINT entretiens_ibfk_1 FOREIGN KEY ( id_user_entretien ) REFERENCES users( id_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE entretiens ADD CONSTRAINT entretiens_ibfk_2 FOREIGN KEY ( id_recrutement_entretien ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE information_users ADD CONSTRAINT fk_information_users_users FOREIGN KEY ( id_user_information_user ) REFERENCES users( id_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE questionnaire_reponse_choisis ADD CONSTRAINT questionnaire_reponse_choisis_ibfk_1 FOREIGN KEY ( id_user_questionnaire_reponse_choisi ) REFERENCES users( id_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE questionnaire_reponse_choisis ADD CONSTRAINT questionnaire_reponse_choisis_ibfk_2 FOREIGN KEY ( id_choix_reponse ) REFERENCES questionnaire_reponses( id_questionnaire_reponse ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE questionnaire_reponses ADD CONSTRAINT questionnaire_reponses_ibfk_1 FOREIGN KEY ( id_questionnaire_questionnaire_reponse ) REFERENCES questionnaires( id_questionnaire ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE questionnaires ADD CONSTRAINT questionnaires_ibfk_1 FOREIGN KEY ( id_test_questionnaire ) REFERENCES tests( id_test ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE recrutements ADD CONSTRAINT fk_recrutements_services FOREIGN KEY ( id_service_recrutement ) REFERENCES services( id_service ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE tests ADD CONSTRAINT tests_ibfk_1 FOREIGN KEY ( id_user_test ) REFERENCES users( id_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE tests ADD CONSTRAINT tests_ibfk_2 FOREIGN KEY ( id_recrutement_test ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;
