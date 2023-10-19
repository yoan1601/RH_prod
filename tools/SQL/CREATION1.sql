create table categories(
	id_categorie int primary key auto_increment,
	nom_categorie varchar(35) not null,
	niveau int not null
)engine=InnoDB;
create table note_entretiens(
	id_note_entretien int primary key auto_increment,
	id_info_note_entretien int,
	note_entretien decimal not null,
	id_entretien_note_entretien int,
	foreign key(id_info_note_entretien)
		references information_users(id_information_user),
	foreign key(id_entretien_note_entretien)
		references entretiens(id_entretien)
)engine=InnoDB;
create table contrat_essai(
	id_contrat_essai int primary key auto_increment,
	id_info_contrat_essai int,
	date_contrat_essai date not null,
	id_recrutement_contrat_essai int,
	salaire_brut_essai decimal not null,
	salaire_net_essai decimal not null,
	duree_contrat_essai decimal not null,
	foreign key(id_info_contrat_essai)
		references information_users(id_information_user),
	foreign key(id_recrutement_contrat_essai)
		references recrutements(id_recrutement)
)engine=InnoDB;
create table type_contrats(
	id_type_contrat int primary key auto_increment,
	code_type_contrat varchar(35) not null,
	nom_type_contrat varchar(35) not null
)engine=InnoDB;
create table avantages(
	id_avantage int primary key auto_increment,
	id_contrat_travail_avantage int,
	nom_avantage varchar(255) not null,
	prix_avantage decimal,
	foreign key(id_contrat_travail_avantage)
		references contrat_travails(id_contrat_travail)
)engine=InnoDB;
alter table postes add foreign key(id_categorie_poste) references categories(id_categorie);