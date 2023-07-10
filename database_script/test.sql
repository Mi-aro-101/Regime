create table if not exists Utilisateur(
    id_utilisateur INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom_utilisateur VARCHAR(21) NOT NULL,
    mail_utilisateur VARCHAR(50) NOT NULL,
    mot_de_passe_utilisateur VARCHAR(50) NOT NULL
);

insert into Utilisateur (nom_utilisateur, mail_utilisateur, mot_de_passe_utilisateur) values('test', 'itu@gmail.com', '123');