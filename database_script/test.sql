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

insert into Utilisateur (nom_utilisateur, mail_utilisateur, mot_de_passe_utilisateur, statut_utilisateur) values
    ('Itu', 'itu@gmail.com', '123', 11),
    ('Admin', 'admin@gmail.com', '456', 11),
    ('Benja', 'benja@gmail.com', '111', 1),
    ('Eric', 'eric@gmail.com', '222', 1),
    ('To', 'to@gmail.com', '333', 1);


insert into Genre(statut_genre, designation_genre) values
    (1, 'Femme'),
    (0, 'Homme');

    -- select utilisateur join with suivi
select u.*, sp.*
    from Utilisateur u join Suivi_poids sp on u.id_utilisateur=sp.id_utilisateur

--Select plat avec moment_journee
select p.*, mj.reference_moment_journee
    from Plat p join Moment_journee mj on p.id_moment_journee = mj.id_moment_journee