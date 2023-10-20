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

create or replace view v_contrat_essai_info_employes as
    select *
    from contrat_essai
        join information_users on contrat_essai.id_info_contrat_essai=information_users.id_information_user
        join employes on contrat_essai.id_info_contrat_essai=employes.id_info_employe
        join type_contrats on employes.id_type_contrat_employe=type_contrats.id_type_contrat
        join recrutements on contrat_essai.id_recrutement_contrat_essai=recrutements.id_recrutement
    where type_contrats.code_type_contrat='1';

create or replace view v_essai_info_employe_poste as
    select *
    from v_contrat_essai_info_employes as v
        join postes on v.id_poste_recrutement=postes.id_poste
        join categories on postes.id_categorie_poste=categories.id_categorie;

create or replace view v_contrat_travail_info_employe as
    select *
    from contrat_travails
        join employes on contrat_travails.id_employe_contrat_travail=employes.id_employe
        join information_users on employes.id_info_employe=information_users.id_information_user
        join recrutements on contrat_travails.id_recrutement_contrat_travail=recrutements.id_recrutement
        join postes on recrutements.id_poste_recrutement=postes.id_poste
        join categories on postes.id_categorie_poste=categories.id_categorie
        join type_contrats on employes.id_type_contrat_employe=type_contrats.id_type_contrat;

create or replace view v_info_employes as
    select *
    from employes
        join information_users on employes.id_info_employe=information_users.id_information_user
        join type_contrats on employes.id_type_contrat_employe=type_contrats.id_type_contrat;

create or replace view v_demande_conge_type as
    select *
    from demande_conges
        join type_conges on demande_conges.id_type_conge_demande_conge=type_conges.id_type_conge;

create or replace view v_conges_total as
    select employes.id_employe, (datediff((select now()), contrat_essai.date_contrat_essai)/30)*2.5 as total_conges
    from employes
        join contrat_essai on employes.id_info_employe=contrat_essai.id_info_contrat_essai
    group by employes.id_employe;

create or replace view v_conges_restant as
    select v_conges_total.id_employe, v_conges_total.total_conges-v_conges_demandes.heures_demandes as conges_restant
    from v_conges_total
        join v_conges_demandes on v_conges_total.id_employe=v_conges_demandes.id_employe_demande_conge;

create or replace view v_conges_demandes as
    select id_employe_demande_conge, sum(timestampdiff(HOUR, fin_demande_conge, debut_demande_conge)) as heures_demandes
    from v_demande_conge_type
    where est_deductible=1;

create or replace view v_conges_non_deductibles_demandes as
    select id_employe_demande_conge, sum(timestampdiff(HOUR, fin_demande_conge, debut_demande_conge)) as heures_demandes
    from v_demande_conge_type
    where est_deductible=0;