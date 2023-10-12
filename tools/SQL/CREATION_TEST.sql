create or replace view v_questionaire_services as
    select *
    from tests
        join recrutements as r on tests.id_recrutement_test=r.id_recrutement
        join services on r.id_service_recrutement=services.id_service
        join questionnaires on tests.id_test=questionnaires.id_test_questionnaire;

create or replace view v_questionnaire_reponse_services as
    select *
    from v_questionaire_services as vq
        join questionnaire_reponses on vq.id_questionnaire=questionnaire_reponses.id_questionnaire_questionnaire_reponse;

create or replace view v_questionnaire_reponse_vrai_services as
    select *
    from v_questionnaire_reponse_services
    where est_vrai=1;

create view v_reponse_choisi_tests as
    select *
    from questionnaire_reponse_choisis as rc
        join v_questionnaire_reponse_services as vrs on rc.id_choix_reponse=vrs.id_questionnaire_reponse;

create or replace view v_personne_tests as
    select distinct vrc.id_info_user_questionnaire_reponse_choisi as id_info_user, vrc.id_test_questionnaire, iu.*
    from v_reponse_choisi_tests as vrc
        join information_users as iu on vrc.id_info_user_questionnaire_reponse_choisi=iu.id_information_user;

create or replace view v_entretien_services as
    select *
    from entretiens
        join recrutements on entretiens.id_recrutement_entretien=recrutements.id_recrutement;

create or replace view v_test_services as
    select *
    from tests
        join recrutements on tests.id_recrutement_test=recrutements.id_recrutement
        join services on recrutements.id_service_recrutement=services.id_service;

create or replace view v_test_entretiens as
    select *
    from entretiens
        join tests on entretiens.id_recrutement_entretien=tests.id_recrutement_test;

create or replace view v_personne_entretiens as
    select *
    from v_test_entretiens
        join test_selections on v_test_entretiens.id_test=test_selections.id_test_test_selection
        join information_users on test_selections.id_info_user_test_selection=information_users.id_information_user;