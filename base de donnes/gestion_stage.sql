drop database if exists gestion_stag;
create database if not exists gestion_stag;
use gestion_stag;

create table stagiaire(
    idStagiaire int(4) auto_increment primary key,
    nom varchar(50),
    prenom varchar(50),
    civilite varchar(1),
    nomEncadrant varchar(50),
    sujet varchar(50),
    Services varchar(50),
    photo varchar(100),
    idFiliere int(4)
);

create table filiere(
    idFiliere int(4) auto_increment primary key,
    nomFiliere varchar(50),
    niveau varchar(50)
);

create table utilisateur(
    iduser int(4) auto_increment primary key,
    login varchar(50),
    email varchar(255),
    role varchar(50),   -- admin ou visiteur
    etat int(1),        -- 1:activé 0:desactivé
    pwd varchar(255)
);

Alter table stagiaire add constraint 
    foreign key(idFiliere) references filiere(idFiliere);

INSERT INTO filiere(nomFiliere,niveau) VALUES
	('GIIA','M'),
	('eco','T'),
	('dev','T'),
	('res','TS'),
	('GI','TS');	
	
	
INSERT INTO utilisateur(login,email,role,etat,pwd) VALUES 
    ('admin','admin@gmail.com','ADMIN',1,md5('123')),
    ('user1','user1@gmail.com','VISITEUR',0,md5('123')),
    ('user2','user2@gmail.com','VISITEUR',1,md5('123'));	

 INSERT INTO stagiaire(nom,prenom,civilite,nomEncadrant,sujet,Services,photo,idFiliere) VALUES
    ('Meryem','Houssam','F','Mme Meryem Lardi','Application web gestion stagiaires','informatique','Koala.jpg',1),
    ('Assma','BYad','M','M ismail ILEA','Application web gestion de demande d abonnement ','informatique','Desert.jpg',1)
     ('Rim','Abidi','F','Mme Ibtissam ','gérer l abscence','Ressources humaines','Tulipes.jpg',2);


  

select * from filiere;
select * from stagiaire;
select * from utilisateur;
