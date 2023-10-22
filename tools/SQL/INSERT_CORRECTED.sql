INSERT INTO departements( nom_dept ) VALUES ( 'Informatique');
INSERT INTO departements( nom_dept ) VALUES ( 'Management');
INSERT INTO departements( nom_dept ) VALUES ( 'RH');
INSERT INTO services( nom_service, etat_service, id_dept_service ) VALUES ( 'Ressources Humaines', 1, 1);
INSERT INTO services( nom_service, etat_service, id_dept_service ) VALUES ( 'Développement Web', 1, 1);
INSERT INTO services( nom_service, etat_service, id_dept_service ) VALUES ( 'Marketing', 1, 1);
INSERT INTO services( nom_service, etat_service, id_dept_service ) VALUES ( 'Finance', 1, 1);
INSERT INTO services( nom_service, etat_service, id_dept_service ) VALUES ( 'Support Technique', 1, 1);
INSERT INTO users( nom_user, email_user, mdp_user, est_admin, etat_user ) VALUES ( 'User 1', 'user1@admin.com', '1234', 1, 1);
INSERT INTO users( nom_user, email_user, mdp_user, est_admin, etat_user ) VALUES ( 'User 2', 'user2@admin.com', '1234', 1, 1);
INSERT INTO users( nom_user, email_user, mdp_user, est_admin, etat_user ) VALUES ( 'User 3', 'user3@admin.com', '1234', 1, 1);
INSERT INTO information_users( id_user_information_user, nom_info, prenom_info, sexe_info, date_naissance_info, contact_info, addresse_info, etat_info ) VALUES ( 1, 'Doe', 'John', 'M', '1985-05-20', 'john.doe@email.com', '123 Main Street', 1);
INSERT INTO information_users( id_user_information_user, nom_info, prenom_info, sexe_info, date_naissance_info, contact_info, addresse_info, etat_info ) VALUES ( 2, 'Smith', 'Alice', 'F', '1990-08-15', 'alice.smith@email.com', '456 Elm Street', 1);
INSERT INTO information_users( id_user_information_user, nom_info, prenom_info, sexe_info, date_naissance_info, contact_info, addresse_info, etat_info ) VALUES ( 3, 'Johnson', 'Bob', 'M', '1988-03-10', 'bob.johnson@email.com', '789 Oak Avenue', 1);
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

insert into information_users values(null, 4, 'Crystal', 'Lily', '0', '2003-07-02', '032 22 222 22', 'Tana', 1);

insert into information_users values(null, 5, 'RohWeltall', 'Eriq', '1', '2004-02-15', '033 33 333 33', 'Tana', 1);

-- ID, ID INFO USER, DATE REMPLISSAGE, ID RECRUTEMENT, ETAT
insert into cv values(null, 1, (select now()), 1, 1);

insert into cv values(null, 2, (select now()), 1, 1);

-- ID, ID CV, ID CRITERE, ID CHOIX
insert into cv_reponses values(null, 1, 1, 1);
insert into cv_reponses values(null, 1, 2, 4);

insert into cv_reponses values(null, 2, 1, 2);
insert into cv_reponses values(null, 2, 2, 3);

-- ID, ID INFO USER, ID REPONSE
insert into questionnaire_reponse_choisis values(null, 4, 1);
insert into questionnaire_reponse_choisis values(null, 4, 3);

insert into questionnaire_reponse_choisis values(null, 5, 2);
insert into questionnaire_reponse_choisis values(null, 5, 3);

-- ID, ID INFO USER, NOTE, ID ENTRETIEN
insert into note_entretiens values(null, 4, 12, 1);
insert into note_entretiens values(null, 5, 17, 1);

insert into type_contrats values(null, '1', 'Essai'),
                                (null, '10', 'CDD'),
                                (null, '100', 'CDI');