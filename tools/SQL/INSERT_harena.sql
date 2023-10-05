INSERT INTO information_users 
(id_user_information_user, nom_info, prenom_info, sexe_info, date_naissance_info, contact_info, addresse_info, etat_info)
VALUES
(1, 'Doe', 'John', 'M', '1985-05-20', 'john.doe@email.com', '123 Main Street', 1),
(2, 'Smith', 'Alice', 'F', '1990-08-15', 'alice.smith@email.com', '456 Elm Street', 1),
(3, 'Johnson', 'Bob', 'M', '1988-03-10', 'bob.johnson@email.com', '789 Oak Avenue', 1);

-- depart 4 ny ID info ako
INSERT INTO cv (id_info_user_cv, id_recrutement_cv, etat_cv)
VALUES
(4, 13, 1);

INSERT INTO cv (id_info_user_cv, id_recrutement_cv, etat_cv)
VALUES
(5, 13, 1);

-- depart 10 ny ID cv ako
INSERT INTO cv_reponses (id_cv_cv_reponse, id_critere_cv_reponse, id_choix_cv_reponse)
VALUES
(10, 12, 18),
(10, 13, 19),
(10, 14, 20),
(10, 15, 21),
(10, 16, 22);

INSERT INTO cv_reponses (id_cv_cv_reponse, id_critere_cv_reponse, id_choix_cv_reponse)
VALUES
(11, 12, 41),
(11, 13, 35),
(11, 14, 26);

