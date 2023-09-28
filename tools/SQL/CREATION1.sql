-- create database rh_prod
-- code wifi 37637055

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
