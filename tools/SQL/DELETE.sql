DELETE from besoins where id_recrutement_besoin = 12;
DELETE from choix_criteres where id_recrutement_choix_critere = 12;
DELETE from criteres where id_recrutement_critere = 12;
DELETE from recrutements where id_recrutement = 12;

delete from fin_conges;
delete from conges;
delete from demande_conges;
delete from avantages;
delete from contrat_travails;
delete from employes;
delete from contrat_essai;

update contrat_essai set date_contrat_essai='2021-10-23';