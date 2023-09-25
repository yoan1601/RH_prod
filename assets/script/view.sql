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

