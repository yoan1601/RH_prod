UPDATE users set mot_de_passe = md5(nom);

alter table devis ADD etat integer NOT NULL DEFAULT 1;
alter table contacts ADD etat integer NOT NULL DEFAULT 1;
alter table emails ADD etat integer NOT NULL DEFAULT 1;

alter table devis ADD date_creation datetime NOT NULL DEFAULT NOW();
alter table contacts ADD date_creation datetime NOT NULL DEFAULT NOW();
alter table emails ADD date_creation datetime NOT NULL DEFAULT NOW();