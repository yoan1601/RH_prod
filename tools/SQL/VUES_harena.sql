-- total primes, total HS, total droit/indemnite, retenues, avance
CREATE OR REPLACE VIEW v_total_prime_hs_indemnite_retenue_avance AS 
SELECT
fp.id_fiche_paie,
total_prime,
total_hs,
total_indemnite,
total_retenue,
total_avance
FROM fiche_paies fp
JOIN v_total_prime p ON p.id_fiche_paie = fp.id_fiche_paie
JOIN v_total_hs hs ON hs.id_fiche_paie = fp.id_fiche_paie
JOIN v_total_indemnite ds ON ds.id_fiche_paie = fp.id_fiche_paie
JOIN v_total_retenue r ON r.id_fiche_paie = fp.id_fiche_paie
JOIN v_total_avance av ON av.id_fiche_paie = fp.id_fiche_paie
GROUP BY fp.id_fiche_paie
;

CREATE OR REPLACE VIEW v_total_avance AS 
SELECT
fp.id_fiche_paie,
SUM(r.montant_avance) total_avance
FROM fiche_paies fp
JOIN avances r ON r.id_fiche_avance = fp.id_fiche_paie
GROUP BY fp.id_fiche_paie
;

CREATE OR REPLACE VIEW v_total_retenue AS 
SELECT
fp.id_fiche_paie,
SUM(r.montant_retenue) total_retenue
FROM fiche_paies fp
JOIN retenues r ON r.id_fiche_retenue = fp.id_fiche_paie
GROUP BY fp.id_fiche_paie
;

CREATE OR REPLACE VIEW v_total_indemnite AS 
SELECT
fp.id_fiche_paie,
SUM(ds.montant_droit_salaire) total_indemnite
FROM fiche_paies fp
JOIN droit_salaires ds ON ds.id_fiche_droit_salaire = fp.id_fiche_paie
GROUP BY fp.id_fiche_paie
;

CREATE OR REPLACE VIEW v_total_hs AS 
SELECT
fp.id_fiche_paie,
SUM(hs.montant_hs) total_hs
FROM fiche_paies fp
JOIN heure_supplementaires hs ON hs.id_fiche_hs = fp.id_fiche_paie
GROUP BY fp.id_fiche_paie
;

CREATE OR REPLACE VIEW v_total_prime AS 
SELECT
fp.id_fiche_paie,
SUM(p.montant_prime) total_prime
FROM fiche_paies fp
JOIN primes p ON p.id_fiche_prime = fp.id_fiche_paie
GROUP BY fp.id_fiche_paie
;

SELECT
fp.id_fiche_paie,
SUM(hs.montant_hs) total_hs
FROM fiche_paies fp
JOIN heure_supplementaires hs ON hs.id_fiche_hs = fp.id_fiche_paie
GROUP BY fp.id_fiche_paie;


-- prime, type_prime
CREATE OR REPLACE view v_prime AS
SELECT 
* 
FROM primes p 
LEFT JOIN type_primes tp ON tp.id_type_prime = p.id_type_prime_prime
;

-- Fiche paie, type_virement
CREATE OR REPLACE view v_fiche_paie AS
SELECT 
fp.*,
tv.*,
emp.*,
info_user.*,
ct.salaire_brut,
ce.date_contrat_essai,
ce.salaire_brut_essai,
p_travail.nom_poste nom_poste_travail,
p_essai.nom_poste nom_poste_essai,
categ_travail.nom_categorie nom_categorie_travail,
categ_travail.nom_categorie nom_categorie_essai,
categ_travail.niveau niveau,
categ_essai.niveau niveau_essai 
FROM fiche_paies fp 
LEFT JOIN type_virements tv ON tv.id_type_virement = fp.id_type_virement_fiche
LEFT JOIN employes emp ON emp.id_employe = fp.id_employe_fiche
LEFT JOIN information_users info_user ON info_user.id_information_user = emp.id_info_employe
LEFT JOIN contrat_travails ct ON ct.id_employe_contrat_travail = emp.id_employe
LEFT JOIN contrat_essai ce ON ce.id_info_contrat_essai = emp.id_info_employe
LEFT JOIN recrutements recru_travail ON recru_travail.id_recrutement = ct.id_recrutement_contrat_travail
LEFT JOIN recrutements recru_essai ON recru_essai.id_recrutement = ce.id_recrutement_contrat_essai
LEFT JOIN postes p_travail ON p_travail.id_poste = recru_travail.id_poste_recrutement
LEFT JOIN postes p_essai ON p_essai.id_poste = recru_essai.id_poste_recrutement
LEFT JOIN categories categ_travail ON p_travail.id_categorie_poste = categ_travail.id_categorie
LEFT JOIN categories categ_essai ON p_essai.id_categorie_poste = categ_essai.id_categorie
GROUP BY fp.id_fiche_paie
;

-- heures supplementaires
CREATE OR REPLACE view v_heure_supplementaires AS
SELECT 
* 
FROM heure_supplementaires hs 
LEFT JOIN hs_majorations hs_maj ON hs_maj.id_majoration = hs.id_majoration_hs
;


-- recrutements, poste, info_user, employe, contrat_essaie
CREATE OR REPLACE VIEW v_recrutement_poste_info_employe_contrat_essai AS (
SELECT
*,
DATEDIFF(CURRENT_DATE, essai.date_contrat_essai) AS anciennete
FROM v_recrutement_poste_info_employe vrpinfoemp 
LEFT JOIN contrat_essai essai ON essai.id_info_contrat_essai = vrpinfoemp.id_info_employe
WHERE essai.id_contrat_essai IS NOT NULL
GROUP BY vrpinfoemp.id_employe
);

-- hierarchie, info_user, employe, contrat_travail, recrutement, service, poste
CREATE OR REPLACE VIEW v_hierarchie_info_user_poste AS (
SELECT 
vhinfo.*,
s.*,
p.*
FROM v_hierarchie_info_user vhinfo 
LEFT JOIN contrat_travails ct ON ct.id_employe_contrat_travail = vhinfo.id_employe_collaborateur
LEFT JOIN recrutements recru ON recru.id_recrutement = ct.id_recrutement_contrat_travail
LEFT JOIN services s ON s.id_service = recru.id_service_recrutement
LEFT JOIN postes p ON p.id_service_poste = s.id_service
GROUP BY vhinfo.id_employe
);

-- hierarchiem, info_user
-- CREATE OR REPLACE VIEW v_hierarchie_info_user AS (
-- SELECT 
-- vhiu0.*,
-- info_user.nom_info nom_collaborateur,
-- info_user.prenom_info prenom_collaborateur
-- FROM v_hierarchie_info_user0 vhiu0
-- LEFT JOIN employes emp ON emp.id_employe = vhiu0.id_employe_collaborateur
-- LEFT JOIN information_users info_user ON info_user.id_information_user = emp.id_info_employe
-- );

CREATE OR REPLACE VIEW v_hierarchie_info_user AS (
SELECT 
*
FROM hierarchies h 
LEFT JOIN employes emp ON emp.id_employe = h.id_employe_collaborateur
LEFT JOIN information_users info_user ON info_user.id_information_user = emp.id_info_employe
);


-- recrutements, poste, info_user, employe
CREATE OR REPLACE VIEW v_recrutement_poste_info_employe AS (
SELECT 
*
FROM v_recrutement_poste_info vrpinfo 
LEFT JOIN employes emp ON emp.id_info_employe = vrpinfo.id_information_user
);


-- contrat_travails, employes, recrutements, services, postes, categories
CREATE OR REPLACE VIEW v_contrat_travail_employe_recrutement_service_poste_categorie AS
SELECT 
*
FROM contrat_travails ct 
LEFT JOIN employes emp ON emp.id_employe = ct.id_employe_contrat_travail
LEFT JOIN recrutements recru ON recru.id_recrutement = ct.id_recrutement_contrat_travail
LEFT JOIN services s ON s.id_service = recru.id_service_recrutement
LEFT JOIN postes p ON p.id_service_poste = s.id_service
LEFT JOIN categories categ ON categ.id_categorie = p.id_categorie_poste
LEFT JOIN information_users info ON info.id_information_user = emp.id_info_employe 
GROUP BY emp.id_employe
;

-- recrutements, poste, info_user
CREATE OR REPLACE VIEW v_recrutement_poste_info AS (
SELECT 
*
FROM v_recrutement_poste vrp 
LEFT JOIN cv ON cv.id_poste_cv = vrp.id_poste
LEFT JOIN information_users info ON info.id_information_user = cv.id_info_user_cv
LEFT JOIN categories categ ON categ.id_categorie = vrp.id_categorie_poste
LEFT JOIN employes emp ON emp.id_info_employe = info.id_information_user
WHERE cv.id_cv IS NOT NULL AND emp.id_employe IS NOT NULL
);

-- recrutements , postes
CREATE OR REPLACE VIEW v_recrutement_poste AS (
SELECT
*
FROM recrutements recru  
LEFT JOIN postes ON postes.id_poste = recru.id_poste_recrutement
join categories on postes.id_categorie_poste=categories.id_categorie
);

--  entretien , recrutement , service
CREATE OR REPLACE VIEW v_entretien_recrutement_service AS (
SELECT
*
FROM recrutements recru  
LEFT JOIN entretiens entre ON entre.id_recrutement_entretien = recru.id_recrutement
LEFT JOIN `services` s ON s.id_service = recru.id_service_recrutement
WHERE entre.id_entretien IS NOT NULL
);

-- choix embauche note entretien
CREATE OR REPLACE VIEW v_choix_embauche AS (
SELECT 
s.*,
info.*,
note_ent.id_entretien_note_entretien id_entretien,
note_ent.note_entretien,
ent_select.id_info_entretien_selection,
ent_select.id_entretien_entretien_selection
FROM information_users info 
LEFT JOIN note_entretiens note_ent ON note_ent.id_info_note_entretien = info.id_information_user
LEFT JOIN entretien_selections ent_select ON ent_select.id_info_entretien_selection = info.id_information_user AND ent_select.id_entretien_entretien_selection = note_ent.id_entretien_note_entretien
LEFT JOIN entretiens entre ON entre.id_entretien = note_ent.id_entretien_note_entretien
LEFT JOIN recrutements recru ON recru.id_recrutement = entre.id_recrutement_entretien
LEFT JOIN services s ON s.id_service = recru.id_service_recrutement
WHERE s.id_service is not null and ent_select.id_entretien_entretien_selection is not null
);

CREATE OR REPLACE VIEW v_liste_cv AS (
SELECT 
s.id_service,
dept.*,
cv.id_cv,
info.id_information_user,
info.nom_info nom,
info.prenom_info prenom,
cv.dateheure_remplissage reception,
DATEDIFF( NOW(), cv.dateheure_remplissage ) duree, 
SUM( choix.coefficient_critere ) note ,
r.id_recrutement 
FROM cv 
LEFT JOIN information_users info ON info.id_information_user = cv.id_info_user_cv
LEFT JOIN cv_reponses cvr ON cvr.id_cv_cv_reponse = cv.id_cv
LEFT JOIN choix_criteres choix ON choix.id_choix_critere = cvr.id_choix_cv_reponse
LEFT JOIN recrutements r ON r.id_recrutement = cv.id_recrutement_cv
LEFT JOIN services s ON s.id_service = r.id_service_recrutement 
LEFT JOIN departements dept ON s.id_dept_service = dept.id_dept
GROUP BY info.id_information_user, cv.id_cv
ORDER BY note DESC
);
