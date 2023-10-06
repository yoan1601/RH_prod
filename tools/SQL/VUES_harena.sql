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
