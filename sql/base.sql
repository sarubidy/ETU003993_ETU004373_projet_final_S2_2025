
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
    FOREIGN KEY (id_objet)  REFERENCES s2_objet (id_objet) ON DELETE CASCADE
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

-- test
INSERT INTO s2_membre (nom, date_de_naissance, genre, Email, ville, MotDepasse, image_profil) VALUES
('Alice', '1995-06-15', 'Femme', 'alice@mail.com', 'Tana', 'passAlice', 'alice.jpg'),
('Bob', '1990-08-20', 'Homme', 'bob@mail.com', 'Majunga', 'passBob', 'bob.jpg'),
('Clara', '1988-03-11', 'Femme', 'clara@mail.com', 'Fianarantsoa', 'passClara', 'clara.jpg'),
('David', '1992-12-01', 'Homme', 'david@mail.com', 'Toamasina', 'passDavid', 'david.jpg');

INSERT INTO s2_categorie_objet (nom_categorie) VALUES
('Esthétique'),
('Bricolage'),
('Mécanique'),
('Cuisine');

-- Alice (id_membre = 1)
INSERT INTO s2_objet (nom_objet, id_categorie, id_membre) VALUES
('Sèche-cheveux', 1, 1),
('Peigne', 1, 1),
('Marteau', 2, 1),
('Tournevis', 2, 1),
('Clé à molette', 3, 1),
('Pompe à vélo', 3, 1),
('Mixeur', 4, 1),
('Poêle', 4, 1),
('Friteuse', 4, 1),
('Vernis à ongles', 1, 1);

-- Bob (id_membre = 2)
INSERT INTO s2_objet (nom_objet, id_categorie, id_membre) VALUES
('Perceuse', 2, 2),
('Scie', 2, 2),
('Cric', 3, 2),
('Clé dynamométrique', 3, 2),
('Blender', 4, 2),
('Casserole', 4, 2),
('Brosse à cheveux', 1, 2),
('Crème visage', 1, 2),
('Spatule', 4, 2),
('Fer à lisser', 1, 2);

-- Clara (id_membre = 3)
INSERT INTO s2_objet (nom_objet, id_categorie, id_membre) VALUES
('Tournevis électrique', 2, 3),
('Meuleuse', 2, 3),
('Écrou', 3, 3),
('Bouilloire', 4, 3),
('Palette maquillage', 1, 3),
('Couteau', 4, 3),
('Rouleau peinture', 2, 3),
('Grille-pain', 4, 3),
('Compresseur', 3, 3),
('Épilateur', 1, 3);

-- David (id_membre = 4)
INSERT INTO s2_objet (nom_objet, id_categorie, id_membre) VALUES
('Boîte à outils', 2, 4),
('Ponceuse', 2, 4),
('Pneu', 3, 4),
('Extracteur jus', 4, 4),
('Lisseur barbe', 1, 4),
('Four', 4, 4),
('Tournevis étoile', 2, 4),
('Jack hydraulique', 3, 4),
('Parfum', 1, 4),
('Poêle wok', 4, 4);

INSERT INTO s2_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-10'),
(5, 3, '2025-07-02', '2025-07-12'),
(8, 4, '2025-07-03', NULL),
(12, 1, '2025-07-04', '2025-07-14'),
(15, 3, '2025-07-05', NULL),
(20, 1, '2025-07-06', '2025-07-13'),
(25, 4, '2025-07-07', NULL),
(30, 2, '2025-07-08', NULL),
(35, 1, '2025-07-09', '2025-07-11'),
(40, 2, '2025-07-10', NULL);

-- SELECT
-- Tous les membres
SELECT * FROM s2_membre;

-- Toutes les catégories
SELECT * FROM s2_categorie_objet;

-- Tous les objets
SELECT * FROM s2_objet;

-- Toutes les images d’objets (aucune image insérée pour l’instant)
SELECT * FROM s2_images_objet;

-- Tous les emprunts
SELECT * FROM s2_emprunt;

/*
insert into s2_images_objet(id_objet,nom_image) value (1,'');
insert into s2_images_objet(id_objet,nom_image) value (2,'');
insert into s2_images_objet(id_objet,nom_image) value (3,'');
insert into s2_images_objet(id_objet,nom_image) value (4,'');
*/