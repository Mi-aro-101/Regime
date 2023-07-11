
insert into Genre (statut_genre,designation_genre) values
    (false,'Homme'),
    (true,'Femme');

insert into Utilisateur (nom_utilisateur, mail_utilisateur, mot_de_passe_utilisateur, statut_utilisateur,id_genre) values
    ('Itu', 'itu@gmail.com', '123', 11,1),
    ('Admin', 'admin@gmail.com', '456', 11,1),
    ('Benja', 'benja@gmail.com', '111', 1,1),
    ('Erica', 'erica@gmail.com', '222', 1,2),
    ('To', 'to@gmail.com', '333', 1,1);

insert into Completion (id_utilisateur,poids_completion,taille) values 
    (1,70,155),
    (2,90,170),
    (3,60,165),
    (4,40,160),
    (5,80,180);

insert into Objectif (statut_objectif,reference_objectif) values 
    (1,'Perdre du poids'),
    (5,'Prendre du poids');

insert into Objectifs_utilisateur (id_objectif,id_utilisateur,poids_objectif) values 
    (1,1,9),
    (1,2,15),
    (1,3,5),
    (2,4,15),
    (2,5,3);

insert into Programme (id_utilisateur,duree) values
    (2,15),
    (4,8);
    

insert into Moment_journee (reference_moment_journee) values
    ('Petit dejeuner'),
    ('Dejeuner'),
    ('Diner');

insert into Plat (designation_plat,id_moment_journee) values
    ('Assiettes de fruits',1),
    ('Tarte fromage blancs',1),
    ('Cakes fruits secs',1),
    ('Tarte proteine',1),
    ('Oeufs brouillees et fromage',1),
    ('Houmous et brics',2),
    ('Salade printanière',2),
    ('Poissons et legumes sautees',2),
    ('Poulet grilees et betteraves',2),
    ('Steak et pommes de terre sautees',2),
    ('Houmous et brics',3),
    ('Poissons et legumes sautees',3),
    ('Tortillas Poulet',3),
    ('Club sandwich',3),
    ('Naan cheese',3);

insert into Sport (designation_sport) values
    ('Squat'),
    ('Pompe'),
    ('Crunchies'),
    ('Hip Trust'),
    ('Abdos');

insert into Poids_statut (statut_poids,reference_poids) values
    (1,' moins de 10 kilos'),
    (5,'plus de 10 kilos');

insert into Imc (intervalle_debut,intervalle_fin,designation_imc) values
    (1,18.9,'Sous-poids'),
    (19,24.9,'Normal'),
    (25,29.9,'Surpoids'),
    (30,34.9,'Obesite'),
    (35,60,'Obesite severe');

insert into Regime_plat (id_plat,id_objectif,id_imc,id_poids_statut,quantite) values
    (1,1,2,1,240),
    (2,1,2,1,240),
    (3,1,2,1,240),
    (4,1,2,1,240),
    (5,1,2,1,240),
    (6,1,2,1,240),
    (7,1,2,1,240),
    (8,1,2,1,240),
    (9,1,2,1,240),
    (10,1,2,1,240),
    (11,1,2,1,240),
    (12,1,2,1,240),
    (13,1,2,1,240),
    (13,1,2,1,240),
    (15,1,2,1,240),
    (1,1,2,2,240),
    (2,1,2,2,240),
    (3,1,2,2,240),
    (4,1,2,2,240),
    (5,1,2,2,240),
    (6,1,2,2,240),
    (7,1,2,2,240),
    (8,1,2,2,240),
    (9,1,2,2,240),
    (10,1,2,2,240),
    (11,1,2,2,240),
    (12,1,2,2,240),
    (13,1,2,2,240),
    (13,1,2,2,240),
    (15,1,2,2,240),
    (1,1,1,2,250),
    (2,1,1,2,250),
    (3,1,1,2,250),
    (4,1,1,2,250),
    (5,1,1,2,250),
    (6,1,1,2,250),
    (7,1,1,2,250),
    (8,1,1,2,250),
    (9,1,1,2,250),
    (10,1,1,2,260),
    (11,1,1,2,260),
    (12,1,1,2,260),
    (13,1,1,2,260),
    (13,1,1,2,260),
    (15,1,1,2,260),
    (1,1,4,2,200),
    (2,1,4,2,150),
    (3,1,4,2,150),
    (4,1,4,2,200),
    (5,1,4,2,200),
    (6,1,4,2,200),
    (7,1,4,2,200),
    (8,1,4,2,200),
    (9,1,4,2,200),
    (10,1,4,2,200),
    (11,1,4,2,200),
    (12,1,4,2,200),
    (13,1,4,2,200),
    (13,1,4,2,200),
    (15,1,4,2,200);

insert into Regime_sport (id_sport,id_objectif,id_imc,id_poids_statut,repetition,serie) values

    (1,1,2,1,12,3),
    (2,1,2,1,12,3),
    (3,1,2,1,12,3),
    (4,1,2,1,12,3),
    (5,1,2,1,12,3),

    (1,1,2,2,12,3),
    (2,1,2,2,12,3),
    (3,1,2,2,12,3),
    (4,1,2,2,12,3),
    (5,1,2,2,12,3),
    (1,1,1,2,12,3),
    (2,1,1,2,12,3),
    (3,1,1,2,12,3),
    (4,1,1,2,12,3),
    (5,1,1,2,12,3),
    (1,1,4,2,12,3),
    (2,1,4,2,12,3),
    (3,1,4,2,12,3),
    (4,1,4,2,12,3),
    (5,1,4,2,12,3);

insert into Code (code,montant) values 
    (2020,40000),
    (2050,40000),
    (1542,40000),
    (2563,40000),
    (1250,40000),
    (2513,80000),
    (2546,80000),
    (5584,80000),
    (1254,80000),
    (1552,80000),
    (5586,120000),
    (2145,120000),
    (7854,120000),
    (3654,120000),
    (5821,120000);

insert into Code_statut (id_code,id_utilisateur,date_envoi) values
    (1,4,'2023-05-14');
