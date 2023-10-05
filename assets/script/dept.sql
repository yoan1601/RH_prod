CREATE  TABLE departements ( 
	id_dept              INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	nom_dept             VARCHAR(35)  NOT NULL     
 ) engine=InnoDB;

INSERT INTO departements (nom_dept)
VALUES
('Informatique'),
('Management'),
('RH');

CREATE  TABLE user_departements ( 
	id_user_departement  INT  NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
	id_user_user_dept    INT  NOT NULL     ,
	id_dept_user_dept    INT  NOT NULL     
 ) engine=InnoDB;

ALTER TABLE user_departements ADD CONSTRAINT fk_user_departements_users FOREIGN KEY ( id_user_user_dept ) REFERENCES users( id_user ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE user_departements ADD CONSTRAINT fk_user_departements_departements FOREIGN KEY ( id_dept_user_dept ) REFERENCES departements( id_dept ) ON DELETE NO ACTION ON UPDATE NO ACTION;


INSERT INTO user_departements (id_user_user_dept, id_dept_user_dept)
VALUES
(1, 1),
(2, 1),
(3, 1);

ALTER TABLE services ADD id_dept_service INT NOT NULL DEFAULT 1; 
ALTER TABLE services ADD CONSTRAINT fk_services_departements FOREIGN KEY ( id_dept_service ) REFERENCES departements( id_dept ) ON DELETE NO ACTION ON UPDATE NO ACTION;

