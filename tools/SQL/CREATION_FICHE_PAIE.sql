CREATE  TABLE retenues ( 
	id_retenue           INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_fiche_retenue     INT  NOT NULL     ,
	id_type_retenue_retenue INT  NOT NULL     ,
	montant_retenue      DECIMAL(10,2)  NOT NULL DEFAULT (0)    
 ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_retenues_tranche_irsa ON retenues ( id_type_retenue_retenue );

ALTER TABLE retenues ADD CONSTRAINT fk_retenues_tranche_irsa FOREIGN KEY ( id_type_retenue_retenue ) REFERENCES tranche_irsa( id_tranche_irsa ) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE  TABLE fiche_paies ( 
	id_fiche_paie        INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_employe_fiche     INT  NOT NULL     ,
	date_fiche_paie      DATETIME  NOT NULL DEFAULT (now())    ,
	id_contrat_travail   INT       ,
	id_contrat_essai     INT       ,
	id_type_virement_fiche INT  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE hs_majorations ( 
	id_majoration        INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	majoration           DECIMAL(10,2)  NOT NULL     ,
	nom_majoration       VARCHAR(255)       
 ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE tranche_irsa ( 
	id_tranche_irsa      INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	min_tranche          DECIMAL(10,2)  NOT NULL     ,
	max_tranche          DECIMAL(10,2)  NOT NULL     ,
	pourcentage_irsa     DECIMAL(10,2)       
 ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE type_primes ( 
	id_type_prime        INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_type_prime       VARCHAR(255)  NOT NULL     
 ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE type_retenues ( 
	id_type_retenue      INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_type_retenue     VARCHAR(255)  NOT NULL     ,
	pourcentage_retenue  DECIMAL(10,2)  NOT NULL     ,
	plafond              DECIMAL(10,2)  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE  TABLE type_virements ( 
	id_type_virement     INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_type_virement    VARCHAR(255)  NOT NULL     
 ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_fiche_paies_type_virements ON fiche_paies ( id_type_virement_fiche );

CREATE  TABLE droit_salaires ( 
	id_droit_salaire     INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_fiche_droit_salaire INT  NOT NULL     ,
	droit_salaire        VARCHAR(255)  NOT NULL     ,
	montant_droit_salaire DECIMAL(10,2)  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_droit_salaires_fiche_paies ON droit_salaires ( id_fiche_droit_salaire );

CREATE INDEX fk_droit_salaires_type_droit_salaires ON droit_salaires ( droit_salaire );

ALTER TABLE droit_salaires ADD CONSTRAINT fk_droit_salaires_fiche_paies FOREIGN KEY ( id_fiche_droit_salaire ) REFERENCES fiche_paies( id_fiche_paie ) ON DELETE NO ACTION ON UPDATE NO ACTION;


CREATE  TABLE heure_supplementaires ( 
	id_hs                INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_fiche_hs          INT  NOT NULL     ,
	id_majoration_hs     INT  NOT NULL     ,
	montant_hs           DECIMAL(10,2)  NOT NULL DEFAULT (0)    
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_heure_supplementaires_fiche_paies ON heure_supplementaires ( id_fiche_hs );

CREATE INDEX fk_heure_supplementaires_hs_majorations ON heure_supplementaires ( id_majoration_hs );

CREATE  TABLE primes ( 
	id_prime             INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_fiche_prime       INT  NOT NULL     ,
	id_type_prime_prime  INT  NOT NULL     ,
	montant_prime        DECIMAL(10,2)  NOT NULL     
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE INDEX fk_primes_type_primes ON primes ( id_type_prime_prime );

ALTER TABLE fiche_paies ADD CONSTRAINT fk_fiche_paies_type_virements FOREIGN KEY ( id_type_virement_fiche ) REFERENCES type_virements( id_type_virement ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE heure_supplementaires ADD CONSTRAINT fk_heure_supplementaires_fiche_paies FOREIGN KEY ( id_fiche_hs ) REFERENCES fiche_paies( id_fiche_paie ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE heure_supplementaires ADD CONSTRAINT fk_heure_supplementaires_hs_majorations FOREIGN KEY ( id_majoration_hs ) REFERENCES hs_majorations( id_majoration ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE primes ADD CONSTRAINT fk_primes_type_primes FOREIGN KEY ( id_type_prime_prime ) REFERENCES type_primes( id_type_prime ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE hs_majorations COMMENT 'MAJORATION : 30%, 40%, ... , heures de nuit';

INSERT INTO hs_majorations( id_majoration, majoration, nom_majoration ) VALUES ( DEFAULT, 30, '30');
INSERT INTO hs_majorations( id_majoration, majoration, nom_majoration ) VALUES ( DEFAULT, 40, '40');
INSERT INTO hs_majorations( id_majoration, majoration, nom_majoration ) VALUES ( DEFAULT, 50, '50');
INSERT INTO hs_majorations( id_majoration, majoration, nom_majoration ) VALUES ( DEFAULT, 100, '100');
INSERT INTO hs_majorations( id_majoration, majoration, nom_majoration ) VALUES ( DEFAULT, 30, 'heures de nuit');
INSERT INTO tranche_irsa( id_tranche_irsa, min_tranche, max_tranche, pourcentage_irsa ) VALUES ( DEFAULT, 0, 350000, 0);
INSERT INTO tranche_irsa( id_tranche_irsa, min_tranche, max_tranche, pourcentage_irsa ) VALUES ( DEFAULT, 350001, 400000, 5);
INSERT INTO tranche_irsa( id_tranche_irsa, min_tranche, max_tranche, pourcentage_irsa ) VALUES ( DEFAULT, 400001, 500000, 10);
INSERT INTO tranche_irsa( id_tranche_irsa, min_tranche, max_tranche, pourcentage_irsa ) VALUES ( DEFAULT, 500001, 600000, 15);
INSERT INTO tranche_irsa( id_tranche_irsa, min_tranche, max_tranche, pourcentage_irsa ) VALUES ( DEFAULT, 600000, 0, 20);
INSERT INTO type_primes( id_type_prime, nom_type_prime ) VALUES ( DEFAULT, 'rendement');
INSERT INTO type_primes( id_type_prime, nom_type_prime ) VALUES ( DEFAULT, 'anciennete');
INSERT INTO type_primes( id_type_prime, nom_type_prime ) VALUES ( DEFAULT, 'diverses');
INSERT INTO type_virements( id_type_virement, nom_type_virement ) VALUES ( DEFAULT, 'Virement cheque');
INSERT INTO type_virements( id_type_virement, nom_type_virement ) VALUES ( DEFAULT, 'Espece');