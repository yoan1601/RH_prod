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