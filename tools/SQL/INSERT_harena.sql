INSERT INTO rh_prod.tranche_irsa
	( id_tranche_irsa, min_tranche, max_tranche, pourcentage_irsa) VALUES 
    ( DEFAULT, 0, 350000, 0),
    ( DEFAULT, 350001, 400000, 5),
    ( DEFAULT, 400001, 500000, 10),
    ( DEFAULT, 500001, 600000, 15),
    ( DEFAULT, 600000, null, 20);

INSERT INTO contrat_essai
	( id_contrat_essai, id_info_contrat_essai, date_contrat_essai, id_recrutement_contrat_essai, salaire_brut_essai, salaire_net_essai, duree_contrat_essai) VALUES ( DEFAULT, 8, '2023-04-01', 7, 4000000, 2000000, 286 );

INSERT INTO contrat_essai
	( id_contrat_essai, id_info_contrat_essai, date_contrat_essai, id_recrutement_contrat_essai, salaire_brut_essai, salaire_net_essai, duree_contrat_essai) VALUES ( DEFAULT, 4, '2023-01-01', 7, 2500000, 2000000, 360 ),
    ( DEFAULT, 5, '2023-02-01', 7, 1520000, 1000000, 180 ),
    ( DEFAULT, 6, '2023-03-01', 7, 3000000, 1500000, 200 );

INSERT INTO hs_majorations
	(majoration, nom_majoration) VALUES ( 30 , '30'),
     ( 40 , '40'),
     ( 50 , '50'),
     ( 100, '100' ),
     ( 30, 'heures de nuit' );

INSERT INTO type_primes
	(nom_type_prime) VALUES 
    ( 'rendement' ),
    ( 'anciennete' ),
    ( 'diverses' );

INSERT INTO type_virements
	(nom_type_virement) VALUES 
    ( 'Virement cheque' ),
    ( 'Espece' );


INSERT INTO hierarchies
	( id_hierarchie, id_employe_hierarchie, id_employe_collaborateur, position_hierarchie, id_contrat_travail) VALUES 
    ( DEFAULT, 1, 2, 1, 1);

INSERT INTO cv (id_info_user_cv, id_recrutement_cv, etat_cv)
VALUES
(6, 13, 1);

INSERT INTO cv (id_info_user_cv, id_recrutement_cv, etat_cv)
VALUES
(7, 13, 1);

INSERT INTO cv (id_info_user_cv, id_recrutement_cv, etat_cv)
VALUES
(8, 13, 1);

-- categories, postes,  type_contrats, employes, contrat_travails
INSERT INTO categories values (DEFAULT, 'N1', 1);
INSERT INTO categories values (DEFAULT, 'N5', 5);
INSERT INTO categories values (DEFAULT, 'N10', 10);
INSERT INTO categories values (DEFAULT, 'N15', 15);
INSERT INTO categories values (DEFAULT, 'N20', 20);

INSERT INTO postes values (DEFAULT, 'Dev backend junior', 1, 2);
INSERT INTO postes values (DEFAULT, 'Dev frontend senior', 2, 2);
INSERT INTO postes values (DEFAULT, 'Team Leader', 3, 2);
INSERT INTO postes values (DEFAULT, 'Product Manager', 4, 2);
INSERT INTO postes values (DEFAULT, 'Log Architect', 5, 2);

INSERT INTO type_contrats
	( id_type_contrat, code_type_contrat, nom_type_contrat) VALUES 
    ( DEFAULT, '1', 'contrat essai'),
    ( DEFAULT, '10', 'CDD'),
    ( DEFAULT, '100', 'CDI');

INSERT INTO employes
	( id_employe, matricule_employe, id_info_employe, id_type_contrat_employe, etat_employe) VALUES 
    ( DEFAULT, 'EMP100', 4, 2, 1 ),
    ( DEFAULT, 'EMP101', 5, 3, 1 ),
    ( DEFAULT, 'EMP102', 6, 2, 1 ),
    ( DEFAULT, 'EMP103', 7, 3, 1 ),
    ( DEFAULT, 'EMP104', 8, 2, 1 ); 

INSERT INTO contrat_travails
	( id_contrat_travail, date_debut_contrat_travail, id_employe_contrat_travail, id_recrutement_contrat_travail, duree_contrat_travail, affiliation_cnaps, affiliation_organisme_sanitaire
) VALUES 
( DEFAULT, DEFAULT, 1, 10, 365, 1, 1 ),
( DEFAULT, DEFAULT, 2, 10, NULL, 1, 0 ),
( DEFAULT, DEFAULT, 3, 11, 366, 0, 0 ),
( DEFAULT, DEFAULT, 4, 11, NULL, 0, 1 ),
( DEFAULT, DEFAULT, 5, 11, 625, 1, 1 );

--  depart 7 ny id_recrutement_entretien
INSERT INTO entretiens
	(dateheure_entretien, lieu_entretien, id_user_entretien, id_recrutement_entretien, etat_entretien, duree_entretien) VALUES ( '2023-10-20 08:00:00', 'Antsahavola', 1, 7, 1, 15 );

--  depart 4 ny info_user
INSERT INTO note_entretiens
	(id_info_note_entretien, note_entretien, id_entretien_note_entretien) VALUES 
    ( 4, 15, 1 ),
    ( 5, 11, 1 ),
    ( 6, 12, 1 );

INSERT INTO entretien_selections
	( id_entretien_entretien_selection, id_info_entretien_selection) VALUES ( 1, 5 );
--------------------------------------------------

INSERT INTO information_users 
(id_user_information_user, nom_info, prenom_info, sexe_info, date_naissance_info, contact_info, addresse_info, etat_info)
VALUES
(1, 'Doe', 'John', 'M', '1985-05-20', 'john.doe@email.com', '123 Main Street', 1),
(2, 'Smith', 'Alice', 'F', '1990-08-15', 'alice.smith@email.com', '456 Elm Street', 1),
(3, 'Johnson', 'Bob', 'M', '1988-03-10', 'bob.johnson@email.com', '789 Oak Avenue', 1);

INSERT INTO information_users 
(id_user_information_user, nom_info, prenom_info, sexe_info, date_naissance_info, contact_info, addresse_info, etat_info)
VALUES
(1, 'Martin', 'Sophie', 'F', '1992-07-18', 'sophie.martin@email.com', '456 Oak Lane', 1),
(2, 'Brown', 'James', 'M', '1987-04-30', 'james.brown@email.com', '789 Pine Street', 1);

INSERT INTO information_users 
(id_user_information_user, nom_info, prenom_info, sexe_info, date_naissance_info, contact_info, addresse_info, etat_info)
VALUES
(1, 'Doe', 'John', 'M', '1985-05-20', 'john.doe@email.com', '123 Main Street', 1),
(2, 'Smith', 'Alice', 'F', '1990-08-15', 'alice.smith@email.com', '456 Elm Street', 1),
(3, 'Johnson', 'Bob', 'M', '1988-03-10', 'bob.johnson@email.com', '789 Oak Avenue', 1);

-- depart 4 ny ID info ako
INSERT INTO cv (id_info_user_cv, id_recrutement_cv, etat_cv)
VALUES
(4, 13, 1);

INSERT INTO cv (id_info_user_cv, id_recrutement_cv, etat_cv)
VALUES
(5, 13, 1);

-- depart 10 ny ID cv ako
INSERT INTO cv_reponses (id_cv_cv_reponse, id_critere_cv_reponse, id_choix_cv_reponse)
VALUES
(10, 12, 18),
(10, 13, 19),
(10, 14, 20),
(10, 15, 21),
(10, 16, 22);

INSERT INTO cv_reponses (id_cv_cv_reponse, id_critere_cv_reponse, id_choix_cv_reponse)
VALUES
(11, 12, 41),
(11, 13, 35),
(11, 14, 26);

