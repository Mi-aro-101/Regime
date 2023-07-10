--database name : Regime
--username : root
--password : root

create table if not exists Utilisateur(
    id_utilisateur INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom_utilisateur VARCHAR(21) NOT NULL,
    mail_utilisateur VARCHAR(50) NOT NULL,
    mot_de_passe_utilisateur VARCHAR(50) NOT NULL,
    statut_utilisateur INT NOT NULL -- 1 : utilisateur; 11 : admin
);

create table if not exists Genre(
    id_genre INTEGER PRIMARY KEY AUTO_INCREMENT,
    statut_genre INT NOT NULL,
    designation VARCHAR(30) NOT NULL
);

create table if not exists Completion(
    id_completion INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INTEGER REFERENCES Utilisateur(id_utilisateur),
    id_genre INTEGER REFERENCES Genre(id_genre),
    poids DOUBLE PRECISION NOT NULL,
    taille INTEGER NOT NULL
);

create table if not exists Objectif(
    id_objectif INTEGER PRIMARY KEY AUTO_INCREMENT,
    statut_objectif INT NOT NULL,
    reference_objectif VARCHAR(50) NOT NULL
);

create table if not exists Objectifs_utilisateur(
    id_objectifs_utilisateur INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_objectif INTEGER REFERENCES Objectif(id_objectif),
    id_utilisateur INTEGER REFERENCES Utilisateur(id_utilisateur),
    poids DOUBLE PRECISION
);