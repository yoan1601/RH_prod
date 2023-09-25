create database hydro;

use hydro;


create table compagnies(
    id integer primary key auto_increment,
    nom text not null,
    logo text not null,
    etat integer not null
);

create table users(
    id integer primary key auto_increment,
    nom text not null,
    telephone text not null,
    mail text not null,
    mot_de_passe text not null,
    is_admin integer not null,
    etat integer not null
);

create table devis(
    id integer primary key auto_increment,
    idUser integer references users(id),
    type_projet text not null,
    description_projet text not null,
    montant_estime decimal not null
);

create table blogs(
    id integer primary key auto_increment,
    idUser integer references users(id),
    titre_FR text,
    titre_EN text,
    detail_FR text not null,
    detail_EN text not null,
    date_publication date not null,
    image_couverture text not null,
    auteur text not null,
    etat integer not null
);

create table blogs_images(
    id integer primary key auto_increment,
    idBlog integer references blogs(id),
    image text not null
);

create table contacts(
    id integer primary key auto_increment,
    contact text not null,
    message text not null,
    email text not null
);

create table pays(
    id integer primary key auto_increment,
    nom_FR text not null,
    nom_EN text not null
);

create table achievements(
    id integer primary key auto_increment,
    idUser integer references users(id),
    idPays integer references pays(id),
    nom_mission_FR text not null,
    nom_mission_EN text not null,
    lieu text not null,
    autorite_contractante text not null,
    reference text not null,
    adresse text not null,
    date_demarrage date not null,
    date_achevement date not null,
    duree decimal not null,
    numero_reference text,
    email_reference text,
    description_FR text not null,
    description_EN text not null,
    commentaire_FR text,
    commentaire_EN text,
    logo_autorite_contractante text,
    image_couverture text not null,
    date_publication date not null,
    auteur text not null,
    etat integer not null
);

create table achievements_images(
    id integer primary key auto_increment,
    idAchievement integer references achievements(id),
    image text not null
);

create table emails(
    id integer primary key auto_increment,
    mail text not null
);


