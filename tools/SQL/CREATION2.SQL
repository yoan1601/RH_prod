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

alter table besoins add foreign key(id_recrutement_besoin) references recrutements(id_recrutement);
alter table choix_criteres add foreign key(id_critere_choix) references criteres(id_critere);
alter table information_users add foreign key(id_user_information_user) references users(id_user);

create table cv_selections(
    id_cv_selection int auto_increment primary key,
    id_user_cv_selection int not null,
    id_cv_selected int not null,
    id_recrutement_cv_selection int not null
) engine=InnoDB;
create table questionnaires(
    id_questionnaire int auto_increment primary key,
    id_test_questionnaire int not null,
    question text not null,
    coefficient_question decimal not null,
    etat_questionnaire int not null
) engine=InnoDB;
create table questionnaire_reponse_choisis(
    id_questionnaire_reponse_choisi int auto_increment primary key,
    id_user_questionnaire_reponse_choisi int not null,
    id_choix_reponse int not null
) engine=InnoDB;

alter table cv_selections add foreign key(id_user_cv_selection) references users(id_user);
alter table cv_selections add foreign key(id_cv_selected) references cv(id_cv);
alter table cv_selections add foreign key(id_recrutement_cv_selection) references recrutements(id_recrutement);