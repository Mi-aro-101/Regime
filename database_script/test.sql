create table if not exists Utilisateur(
    id_utilisateur INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom_utilisateur VARCHAR(21) NOT NULL
);

insert into Utilisateur (nom_utilisateur) values('test');