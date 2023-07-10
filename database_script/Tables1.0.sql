--database name : Regime
--username : root
--password : root

create table if not exists Genre(
    id_genre INTEGER PRIMARY KEY AUTO_INCREMENT,
    statut_genre BOOLEAN NOT NULL,
    designation_genre VARCHAR(30) NOT NULL
);

create table if not exists Utilisateur(
    id_utilisateur INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_genre INTEGER REFERENCES Genre(id_genre),
    nom_utilisateur VARCHAR(21) NOT NULL,
    mail_utilisateur VARCHAR(50) NOT NULL,
    mot_de_passe_utilisateur VARCHAR(50) NOT NULL,
    statut_utilisateur INT NOT NULL -- 1 : utilisateur; 11 : admin
);


create table if not exists Completion(
    id_completion INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INTEGER REFERENCES Utilisateur(id_utilisateur),
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

create table if not exists Programme(
    id_programme INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INTEGER REFERENCES Utilisateur(id_utilisateur),
    duree INT NOT NULL -- En semaine
);

create table if not exists Plat(
    id_plat INTEGER PRIMARY KEY AUTO_INCREMENT,
    designation_plat VARCHAR(50) NOT NULL
);

create table if not exists Sport(
    id_sport INTEGER PRIMARY KEY AUTO_INCREMENT,
    designation_sport VARCHAR(50) NOT NULL
);

create table if not exists Poids_statut(
    id_poids_statut INTEGER PRIMARY KEY AUTO_INCREMENT,
    statut_poids INTEGER NOT NULL,

);

create table if not exists Imc(
    id_imc INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_plat INTEGER REFERENCES Plat(id_plat),
    id_objectif INTEGER REFERENCES Objectif(id_objectif),
    id_imc INTEGER REFERENCES Imc(id_imc),
    id_poids_statut INTEGER REFERENCES 
);