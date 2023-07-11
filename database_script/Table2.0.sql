select  r.id_regime_plat as id_regime_plat,
        r.id_plat as id_plat,  
        r.id_objectif as id_objectif, 
        r.id_imc as id_imc,
        r.id_poids_statut as id_poids_statut,
        r.quantite as quantite, 
        p.designation_plat as designation_plat, 
        p.id_moment_journee as id_moment_journee,
        m.reference_moment_journee as reference_moment_journee 
    from Regime_plat as r 
    inner join Plat as p 
    on r.id_plat = p.id_plat 
    inner join Moment_journee m 
    on p.id_moment_journee = m.id_moment_journee 
    where   p.id_moment_journee = 1 
        and r.id_objectif = 1 
        and r.id_imc=1 
        and id_poids_statut = 2


select r.id_regime_plat as id_regime_plat,
        r.id_plat as id_plat,r.id_objectif as id_objectif,
         r.id_imc as id_imc,r.id_poids_statut as id_poids_statut,r.quantite as quantite, 
         p.designation_plat as designation_plat, p.id_moment_journee as id_moment_journee,
         m.reference_moment_journee as reference_moment_journee 
    from Regime_plat as r inner join Plat as p on r.id_plat = p.id_plat 
    inner join Moment_journee m on p.id_moment_journee = m.id_moment_journee
    where p.id_moment_journee = 2 and r.id_objectif = 1 and r.id_imc=2 and 
    id_poids_statut = 1