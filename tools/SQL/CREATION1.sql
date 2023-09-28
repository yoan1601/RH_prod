-- create database rh_prod
-- code wifi 37637055

CREATE  TABLE entretiens ( 
	id_entretien         INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	dateheure_entretien  DATETIME  NOT NULL DEFAULT (CURRENT_TIMESTAMP)    ,
	lieu_entretien       VARCHAR(35)  NOT NULL     ,
	id_user_entretien    INT  NOT NULL     ,
	id_recrutement_entretien INT  NOT NULL     ,
	etat_entretien       INT  NOT NULL DEFAULT (1)    
 ) engine=InnoDB;

CREATE  TABLE questionnaire_reponses ( 
	id_questionnaire_reponse INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_questionnaire_questionnaire_reponse INT  NOT NULL     ,
	questionnaire_reponse TEXT  NOT NULL     ,
	est_vrai             INT  NOT NULL     
 ) engine=InnoDB;

CREATE  TABLE tests ( 
	id_test              INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	dateheure_test       DATETIME  NOT NULL DEFAULT (CURRENT_TIMESTAMP)    ,
	id_user_test         INT  NOT NULL     ,
	lieu_test            VARCHAR(35)  NOT NULL     ,
	id_recrutement_test  INT  NOT NULL     ,
	etat_test            INT  NOT NULL DEFAULT (1)    
 ) engine=InnoDB;


CREATE  TABLE criteres ( 
	id_critere           INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_recrutement_critere INT  NOT NULL     ,
	descri_critere       VARCHAR(35)  NOT NULL     ,
	etat_critere         INT  NOT NULL DEFAULT (1)    
 ) engine=InnoDB;

CREATE  TABLE cv ( 
	id_cv                INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_user_cv           INT  NOT NULL     ,
	dateheure_remplissage DATETIME  NOT NULL DEFAULT (CURRENT_TIMESTAMP)    ,
	id_recrutement_cv    INT  NOT NULL     ,
	etat_cv              INT  NOT NULL DEFAULT (1)    
 ) engine=InnoDB;

CREATE  TABLE cv_reponses ( 
	id_cv_reponse        INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_cv_cv_reponse     INT  NOT NULL     ,
	id_critere_cv_reponse INT  NOT NULL     ,
	id_choix_cv_reponse  INT  NOT NULL     
 ) engine=InnoDB;

CREATE  TABLE recrutements ( 
	id_recrutement       INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_service_recrutement INT  NOT NULL     ,
	dateheure_recrutement DATETIME  NOT NULL DEFAULT (CURRENT_TIMESTAMP)    ,
	etat_recrutement     INT  NOT NULL DEFAULT (1)    
 ) engine=InnoDB;

CREATE  TABLE users ( 
	id_user              INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_user             VARCHAR(35)  NOT NULL     ,
	email_user           VARCHAR(35)  NOT NULL     ,
	mdp_user             VARCHAR(35)  NOT NULL     ,
	est_admin            INT  NOT NULL DEFAULT (0)    ,
	etat_user            INT  NOT NULL DEFAULT (1)    
 ) engine=InnoDB;

alter table cv_reponses add foreign key(id_choix_cv_reponse) references choix_criteres(id_choix_critere);


alter table cv_selections add foreign key(id_user_cv_selection) references users(id_user);


alter table cv_selections add foreign key(id_cv_selected) references cv(id_cv);

alter table cv_selections add foreign key(id_recrutement_cv_selection) references recrutements(id_recrutement);

alter table tests add foreign key(id_user_test) references users(id_user);

alter table tests add foreign key(id_recrutement_test) references recrutements(id_recrutement);

alter table questionnaires add foreign key(id_test_questionnaire) references tests(id_test);

alter table questionnaire_reponses add foreign key(id_questionnaire_questionnaire_reponse) references questionnaires(id_questionnaire);

alter table questionnaire_reponse_choisis add foreign key(id_user_questionnaire_reponse_choisi) references users(id_user);

alter table questionnaire_reponse_choisis add foreign key(id_choix_reponse) references questionnaire_reponses(id_questionnaire_reponse);

alter table entretiens add foreign key(id_user_entretien) references users(id_user);

alter table entretiens add foreign key(id_recrutement_entretien) references recrutements(id_recrutement);