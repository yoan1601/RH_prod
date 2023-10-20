CREATE  TABLE hs_majorations ( 
	id_majoration        INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	majoration           DECIMAL(10,2)  NOT NULL     ,
	nom_majoration       VARCHAR(255)       
 ) engine=InnoDB;

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
	position_hierarchie  INT  NOT NULL     ,
	id_contrat_travail   INT       
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

hierarchies ADD CONSTRAINT fk_hierarchies_contrat_travails FOREIGN KEY ( id_contrat_travail ) REFERENCES rh_prod.contrat_travails( id_contrat_travail ) ON DELETE NO ACTION ON UPDATE NO ACTION;


CREATE  TABLE postes ( 
	id_poste             INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_poste            VARCHAR(100)  NOT NULL     ,
	id_categorie_poste   INT  NOT NULL     ,
	id_service_poste     INT  NOT NULL DEFAULT (1)    
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

 ALTER TABLE postes ADD CONSTRAINT fk_postes_services FOREIGN KEY ( id_service_poste ) REFERENCES services( id_service ) ON DELETE NO ACTION ON UPDATE NO ACTION

CREATE  TABLE recrutements ( 
	id_recrutement       INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_service_recrutement INT  NOT NULL     ,
	dateheure_recrutement DATETIME  NOT NULL DEFAULT (now())    ,
	etat_recrutement     INT  NOT NULL DEFAULT (1)    ,
	mission              TEXT       ,
	id_poste_recrutement INT  NOT NULL     
 ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--  ALTER TABLE recrutements ADD CONSTRAINT fk_recrutements_postes FOREIGN KEY ( id_poste_recrutement ) REFERENCES postes( id_poste ) ON DELETE NO ACTION ON UPDATE NO ACTION;
 ALTER TABLE recrutements ADD id_poste_recrutement INT NOT NULL;
 ALTER TABLE recrutements ADD mission TEXT ;

CREATE INDEX fk_recrutements_services ON recrutements ( id_service_recrutement );

CREATE  TABLE contrat_travails ( 
	id_contrat_travail   INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	date_debut_contrat_travail DATE   DEFAULT (curdate())    ,
	id_employe_contrat_travail INT  NOT NULL     ,
	id_recrutement_contrat_travail INT  NOT NULL     ,
	duree_contrat_travail DECIMAL(10,2)       ,
	affiliation_cnaps    INT  NOT NULL     ,
	affiliation_organisme_sanitaire INT  NOT NULL     ,
	salaire_brut         DECIMAL(10,2)       
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


ALTER TABLE contrat_travails ADD CONSTRAINT fk_contrat_travails_employes FOREIGN KEY ( id_employe_contrat_travail ) REFERENCES employes( id_employe ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE contrat_travails ADD CONSTRAINT fk_contrat_travails_recrutements FOREIGN KEY ( id_recrutement_contrat_travail ) REFERENCES recrutements( id_recrutement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE hierarchies ADD CONSTRAINT fk_hierarchies_employes FOREIGN KEY ( id_employe_hierarchie ) REFERENCES employes( id_employe ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE hierarchies ADD CONSTRAINT fk_hierarchies_employes_0 FOREIGN KEY ( id_employe_collaborateur ) REFERENCES employes( id_employe ) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ===================================================================================

create table services(
    id_service int auto_increment primary key,
    nom_service varchar(35) not null,
    etat_service int not null default 1
) engine=InnoDB;
create table besoins(
    id_besoin int auto_increment primary key,
    id_recrutement_besoin int not null,
    homme_jour decimal not null,
    etat_besoin int not null default 1
) engine=InnoDB;
create table choix_criteres(
    id_choix_critere int auto_increment primary key,
    choix_critere varchar(35) not null,
    coefficient_critere decimal not null,
    id_critere_choix int not null
) engine=InnoDB;
create table information_users(
    id_information_user int auto_increment primary key,
    id_user_information_user int not null,
    nom_info varchar(35) not null,
    prenom_info varchar(35) not null,
    sexe_info char(1) not null,
    date_naissance_info date not null,
    contact_info varchar(35) not null,
    addresse_info varchar(35) not null,
    etat_info int not null
) engine=InnoDB;

alter table besoins add foreign key(id_recrutement_besoin) references recrutements(id_recrutement);
alter table choix_criteres add foreign key(id_critere_choix) references criteres(id_critere);
alter table information_users add foreign key(id_user_information_user) references users(id_user);

create table cv_selections(
    id_cv_selection int auto_increment primary key,
    id_user_cv_selection int not null,
    id_cv_selected int not null,
    id_recrutement_cv_selection int not null
) engine=InnoDB;
create table questionnaires(
    id_questionnaire int auto_increment primary key,
    id_test_questionnaire int not null,
    question text not null,
    coefficient_question decimal not null,
    etat_questionnaire int not null
) engine=InnoDB;
create table questionnaire_reponse_choisis(
    id_questionnaire_reponse_choisi int auto_increment primary key,
    id_user_questionnaire_reponse_choisi int not null,
    id_choix_reponse int not null
) engine=InnoDB;

alter table cv_selections add foreign key(id_user_cv_selection) references users(id_user);
alter table cv_selections add foreign key(id_cv_selected) references cv(id_cv);
alter table cv_selections add foreign key(id_recrutement_cv_selection) references recrutements(id_recrutement);