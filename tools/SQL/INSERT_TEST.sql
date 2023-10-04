insert into tests values(null, (select now()), 1, 'Tana', 1, 1);

insert into information_users values(null, 1, 'John', 'Doe', '1', '2004-02-15', '0322222222', 'Tana', 1);

insert into cv values(null, 1, (select now()), 1, 1);

insert into cv_reponses values(null, 1, 24, 1);

insert into cv_selections values(null, 1, 1, 1);

insert into questionnaires values(null, 1, 'Quelle est le prix de la lune?', 50, 1);

insert into questionnaire_reponses values(null, 1, '2millions', 0),
                                            (null, 1, 'Non', 1);

insert into questionnaire_reponse_choisis values(null, 1, 2);