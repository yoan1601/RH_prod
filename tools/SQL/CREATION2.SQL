create table services(
    id_service int auto_increment primary key,
    nom_service varchar(35) not null,
    etat_service int not null default 1
) engine=InnoDB;
create table besoins(
    id_besoin int auto_increment primary key,
    id_recrutement_besoin int not null,
    homme_jour decimal not null,
    etat_besoin int not null default 1
) engine=InnoDB;
create table choix_criteres(
    id_choix_critere int auto_increment primary key,
    choix_critere varchar(35) not null,
    coefficient_critere decimal not null,
    id_critere_choix int not null
) engine=InnoDB;
create table information_users(
    id_information_user int auto_increment primary key,
    id_user_information_user int not null,
    nom_info varchar(35) not null,
    prenom_info varchar(35) not null,
    sexe_info char(1) not null,
    date_naissance_info date not null,
    contact_info varchar(35) not null,
    addresse_info varchar(35) not null,
    etat_info int not null
) engine=InnoDB;