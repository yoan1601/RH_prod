insert into tests values(null, (select now()), 1, 'Tana', 1, 1);

insert into information_users values(null, 1, 'John', 'Doe', '1', '2004-02-15', '0322222222', 'Tana', 1);

insert into cv values(null, 1, (select now()), 1, 1);

insert into cv_reponses values(null, 1, 24, 1);

insert into cv_selections values(null, 1, 1, 1);

insert into questionnaires values(null, 1, 'Quelle est le prix de la lune?', 50, 1);

insert into questionnaire_reponses values(null, 1, '2millions', 0),
                                            (null, 1, 'Non', 1);

insert into questionnaire_reponse_choisis values(null, 1, 2);

update questionnaire_reponse_choisis set id_choix_reponse=1 where id_info_user_questionnaire_reponse_choisi=2;

update questionnaire_reponse_choisis set id_choix_reponse=2 where id_info_user_questionnaire_reponse_choisi=1;

insert into information_users values(null, 2, 'Luke', 'Nicolas', '1', '2003-07-02', '0342222222', 'Tana', 1);

insert into questionnaire_reponse_choisis values(null, 2, 1);

insert into test_selections values(null, 1, 1);

insert into entretiens values(null, (select now()), 'Tana', 2, 1, 1, 600);
--=================================================================================
insert into cv values(null, 2, (select now()), 1, 1);

insert into cv_reponses values(null, 2, 24, 2);

insert into cv_reponses values(null, 2, 25, 3);
--=================================================================================
update departements set nom_dept='Administratif' where id_dept=1;

INSERT INTO employes
	( id_employe, matricule_employe, id_info_employe, id_type_contrat_employe, etat_employe) VALUES 
    ( DEFAULT, 'EMP100', 1, 2, 1 ),
    ( DEFAULT, 'EMP101', 2, 3, 1 );

INSERT INTO contrat_travails
	( id_contrat_travail, date_debut_contrat_travail, id_employe_contrat_travail, id_recrutement_contrat_travail, duree_contrat_travail, affiliation_cnaps, affiliation_organisme_sanitaire
) VALUES 
( DEFAULT, DEFAULT, 7, 1, 365, 1, 1 ),
( DEFAULT, DEFAULT, 8, 1, NULL, 1, 0 );