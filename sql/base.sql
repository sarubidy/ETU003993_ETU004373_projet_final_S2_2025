CREATE DATABASE db_s2_ETU003993;
USE db_s2_ETU003993;

CREATE TABLE s2_membre
(
    id_membre int primary key AUTO_INCREMENT,
    nom char(25),
    date_de_naissance date,
    genre char(10),
    Email varchar(70),
    ville char(25),
    MotDepasse varchar(20),
    image_profil varchar(200)    
);

CREATE TABLE s2_categorie_objet
(
    id_categorie int primary key AUTO_INCREMENT,
    nom_categorie varchar(20)
);

CREATE TABLE s2_objet
(
    id_objet int primary key AUTO_INCREMENT,
    nom_objet varchar(20),
    id_categorie int,
    id_membre int, 
    FOREIGN KEY (id_categorie)  REFERENCES s2_categorie_objet (id_categorie) ON DELETE CASCADE,
    FOREIGN KEY (id_membre) REFERENCES s2_membre (id_membre) ON DELETE CASCADE
);

CREATE TABLE s2_images_objet
(
    id_image int primary key AUTO_INCREMENT,
    id_objet int,
    nom_image varchar(200),
    FOREIGN KEY (id_objet)  REFERENCES s2_objet (id_objet) ON DELETE CASCADE,
);

CREATE TABLE s2_emprunt
(
    id_emprunt  int primary key AUTO_INCREMENT,
    id_objet int,
    id_membre int,
    date_emprunt date,
    date_retour date,
    FOREIGN KEY (id_objet)  REFERENCES s2_objet (id_objet) ON DELETE CASCADE,
    FOREIGN KEY (id_membre) REFERENCES s2_membre (id_membre) ON DELETE CASCADE
);
