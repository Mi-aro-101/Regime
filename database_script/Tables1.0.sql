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
    poids_completion DOUBLE PRECISION NOT NULL,
    taille INTEGER NOT NULL
);

create table if not exists Objectif(
    id_objectif INTEGER PRIMARY KEY AUTO_INCREMENT,
    statut_objectif INT NOT NULL, -- 1: mincir, 5: grossir
    reference_objectif VARCHAR(50) NOT NULL
);

create table if not exists Objectifs_utilisateur(
    id_objectifs_utilisateur INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_objectif INTEGER REFERENCES Objectif(id_objectif),
    id_utilisateur INTEGER REFERENCES Utilisateur(id_utilisateur),
    poids_objectif DOUBLE PRECISION
);

create table if not exists Programme(
    id_programme INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INTEGER REFERENCES Utilisateur(id_utilisateur),
    duree INT NOT NULL -- En semaine
);

create table if not exists Moment_journee(
    id_moment_journee INTEGER PRIMARY KEY AUTO_INCREMENT,
    reference_moment_journee VARCHAR(50) NOT NULL
);

create table if not exists Plat(
    id_plat INTEGER PRIMARY KEY AUTO_INCREMENT,
    designation_plat VARCHAR(50) NOT NULL,
    id_moment_journee INTEGER REFERENCES Moment_journee(id_moment_journee)
);

create table if not exists Sport(
    id_sport INTEGER PRIMARY KEY AUTO_INCREMENT,
    designation_sport VARCHAR(50) NOT NULL
);

-- palier de perte/prise de poids : +10 ou -10
create table if not exists Poids_statut(
    id_poids_statut INTEGER PRIMARY KEY AUTO_INCREMENT,
    statut_poids INTEGER NOT NULL,
    reference_poids VARCHAR(50) NOT NULL
);

create table if not exists Imc(
    id_imc INTEGER PRIMARY KEY AUTO_INCREMENT,
    intervalle_debut DOUBLE PRECISION NOT NULL,
    intervalle_fin DOUBLE PRECISION NOT NULL,
    designation_imc VARCHAR(50) NOT NULL
);

create table if not exists Regime_plat(
    id_regime_plat INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_plat INTEGER REFERENCES Plat(id_plat),
    id_objectif INTEGER REFERENCES Objectif(id_objectif),
    id_imc INTEGER REFERENCES Imc(id_imc),
    id_poids_statut INTEGER REFERENCES Poids_statut(id_poids_statut),
    quantite DOUBLE PRECISION NOT NULL
);

create table if not exists Regime_sport(
    id_regime_sport INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_sport INTEGER REFERENCES Sport(id_sport),
    id_objectif INTEGER REFERENCES Objectif(id_objectif),
    id_imc INTEGER REFERENCES Imc(id_imc),
    id_poids_statut INTEGER REFERENCES Poids_statut(id_poids_statut),
    repetition INTEGER NOT NULL,
    serie INTEGER NOT NULL
);

create table if not exists Regime_journalier(
    id_regime_journalier INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_programme INTEGER REFERENCES Programme(id_programme),
    regime_date DATE
);

create table if not exists Regime_journalier_detail_plat(
    id_regime_journalier_detail_plat INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_regime_journalier INTEGER REFERENCES Regime_journalier(id_regime_journalier),
    id_regime_plat INTEGER REFERENCES Regime_plat(id_regime_plat)
);

create table if not exists Regime_journalier_detail_sport(
    id_regime_journalier_detail_sport INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_regime_journalier INTEGER REFERENCES Regime_journalier(id_regime_journalier),
    id_regime_sport INTEGER REFERENCES Regime_sport(id_regime_sport)
);

create table if not exists Code(
    id_code INTEGER PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(14) NOT NULL,
    montant DOUBLE PRECISION NOT NULL
);

create table if not exists Code_statut(
    id_code_statut INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_code INTEGER REFERENCES Code(id_code),
    id_utilisateur INTEGER REFERENCES Utilisateur(id_utilisateur),
    date_envoi date NOT NULL,
    date_acceptation date DEFAULT NULL,
    date_refus date DEFAULT null
);

create table if not exists Porte_feuille_utilisateur(
    id_porte_feuille_utilisateur INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INTEGER REFERENCES Utilisateur(id_utilisateur)
);

create table if not exists Porte_feuille_utilisateur_historique(
    id_porte_feuille_utilisateur_historique INTEGER PRIMARY KEY AUTO_INCREMENT,
    montant DOUBLE PRECISION,
    statut_transaction_utilisateur INT NOT NULL, -- retrait : -1, depot : 1
    date_transaction_utilisateur date NOT NULL
);

create table if not exists Porte_feuille_application(
    id_porte_feuille_application INTEGER PRIMARY KEY AUTO_INCREMENT
);

create table if not exists Porte_feuille_application_historique(
    id_porte_feuille_application_historique INTEGER PRIMARY KEY AUTO_INCREMENT,
    montant DOUBLE PRECISION,
    statut_transaction_application INT NOT NULL, -- retrait : -1, depot : 1
    date_transaction_application date NOT NULL
);