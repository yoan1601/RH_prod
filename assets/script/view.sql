-- recrutement dept
CREATE OR REPLACE VIEW v_recrutement_dept AS (
SELECT *
FROM recrutements recru 
LEFT JOIN services s ON s.id_service = recru.id_service_recrutement
LEFT JOIN departements dept ON s.id_dept_service = dept.id_dept
);

-- user departement
CREATE OR REPLACE VIEW v_user_dept AS (
SELECT *
FROM users u 
LEFT JOIN user_departements u_dept ON u_dept.id_user_user_dept = u.id_user
LEFT JOIN departements dept ON u_dept.id_dept_user_dept = dept.id_dept
);

-- service departement
CREATE OR REPLACE VIEW v_service_dept AS (
SELECT *
FROM services s 
LEFT JOIN departements dept ON s.id_dept_service = dept.id_dept
);

-- detail CV
CREATE OR REPLACE VIEW v_detail_cv AS ( 
SELECT 
info.*,
cv.id_cv,
cr.descri_critere critere,
choix.choix_critere choix
FROM cv 
LEFT JOIN information_users info ON cv.id_info_user_cv = info.id_information_user
LEFT JOIN cv_reponses cv_rep ON cv_rep.id_cv_cv_reponse = cv.id_cv 
LEFT JOIN criteres cr ON cv_rep.id_critere_cv_reponse = cr.id_critere
LEFT JOIN choix_criteres choix ON cv_rep.id_choix_cv_reponse = choix.id_choix_critere
where cv.etat_cv > 0
);

-- realisations
CREATE OR REPLACE VIEW v_realisations AS (
select a.*, p.nom_FR as nom_pays_FR, p.nom_EN as nom_pays_EN, u.nom nom_user, u.telephone, u.mail,EXTRACT(YEAR FROM a.date_demarrage) as annee_demarrage
from achievements a 
JOIN pays p ON p.id = a.idPays
JOIN users u ON u.id = a.idUser
);

-- realisation get all year
CREATE OR REPLACE VIEW v_realisations_all_year AS (
    select annee_demarrage, etat from v_realisations group by annee_demarrage
);

-- blogs
CREATE OR REPLACE VIEW v_blogs AS (
    select b.*, u.nom nom_user, u.telephone, u.mail ,EXTRACT(YEAR FROM b.date_publication) as annee_publication from blogs b
    JOIN users u ON b.idUser =u.id
);

CREATE OR REPLACE VIEW v_blogs_all_year AS (
    select annee_publication, etat from v_blogs group by annee_publication
);

CREATE OR REPLACE VIEW v_devis AS (
    select d.*, u.mail from devis d
    JOIN users u ON d.idUser = u.id
);

