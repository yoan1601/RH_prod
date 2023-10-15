insert into categories values(null, 'N-5', 5);
insert into postes values(null, 'Finance', 1, 1);

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
insert into questionnaire_reponse_choisis values(null, 1, 1);
insert into questionnaire_reponse_choisis values(null, 1, 3);

insert into questionnaire_reponse_choisis values(null, 2, 2);
insert into questionnaire_reponse_choisis values(null, 2, 3);