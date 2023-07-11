-- requete pour avoir toutes les codes avec leur statut tout en considerons ce qui n'ont pas de statut comme null dans le champ des status
select cs.id_utilisateur, cs.date_envoi, cs.date_acceptation, cs.date_refus, c.*
    from Code c join Code_statut cs on c.id_code = cs.id_code
