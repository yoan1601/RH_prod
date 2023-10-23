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
create table type_conges(
	id_type_conge int primary key auto_increment,
	nom_type_conge varchar(255) not null
);
create table demande_conges(
	id_demande_conge int primary key auto_increment,
	id_employe_demande_conge int,
	date_demande_conge datetime not null,
	debut_demande_conge datetime not null,
	fin_demande_conge datetime not null,
	valide_demande_conge int not null,
	id_type_conge_demande_conge int,
	motif_demande_conge text,
	foreign key(id_employe_demande_conge)
		references employes(id_employe),
	foreign key(id_type_conge_demande_conge)
		references type_conges(id_type_conge)
);
create table conges(
	id_conge int primary key auto_increment,
	id_employe_conge int,
	id_demande_conge_conge int,
	debut_conge datetime not null,
	foreign key(id_employe_conge)
		references employes(id_employe),
	foreign key(id_demande_conge_conge)
		references demande_conges(id_demande_conge)
);
create table fin_conges(
	id_fin_conge int primary key auto_increment,
	id_conge_fin_conge int,
	fin_conge datetime not null,
	foreign key(id_conge_fin_conge)
		references conges(id_conge)
);
create table nombre_max_jours_cumules(
	id_nombre_max int primary key auto_increment,
	id_type_nombre_max int,
	nombre_heures decimal not null,
	foreign key(id_type_nombre_max)
		references type_conges(id_type_conge) 
);