create table Suivi_poids(
    id_suivi_poids INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INTEGER REFERENCES Utilisateur(id_utilisateur),
    poids_suivi DOUBLE PRECISION NOT NULL,
    date_suivi date not null,
    commentaire_suivi VARCHAR(100) NOT NULL
);

insert into Suivi_poids(id_utilisateur, poids_suivi, date_suivi, commentaire_suivi) values
    (3, 60, '2023-06-10', 'Mon permier poids'),
    (3, 58, '2023-06-17', 'Presque'),
    (3, 57, '2023-06-24', 'Encore encore'),
    (3, 55, '2023-07-01', 'Arrive');

-- select utilisateur join with suivi
select u.*, sp.*
    from Utilisateur u join Suivi_poids sp on u.id_utilisateur=sp.id_utilisateur

