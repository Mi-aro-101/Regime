<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programme_model extends CI_Model 
{
    public function generer($id_utilisateur) {
        $imc = calcul_imc_utilisateur($id_utilisateur);

    }
    
    public function calcul_imc_utilisateur($id_utilisateur){
        $result = $this->Completion_model->get_completion_where('Completion',['id_utilisateur' => $id_utilisateur])->result();
        $imc = $result[0]/ ($result[1]*$result[1]);
        return $imc;
    }
    
    public function get_reference_imc($imc_utilisateur) {
        
    }

    public function check_objectif($id_utilisateur){
        $result = $this->Objectif_Utilisateur_model->get_objectif_utilisateur(['id_utilisateur' => $id_utilisateur])->result();
        return $result[3];
    }

    public function calcul_duree_programme($id_utilisateur,$poids_objectif){
        $result = $this->Objectif_Utilisateur_model->get_objectif_utilisateur(['id_utilisateur' => $id_utilisateur])->result();
        $id_obj = $result['1'];
        if ($id_obj==1) {
            $duree = $poids_objectif;
        }
        else{
            $duree = $poids_objectif*2;
        }
        return $duree;
    }

    public function get_regimes_adequats($id_objectif){
        $regime = $this->Regime_plat_model->get_regime_plat_parid('Regime_plat',$id_objectif)->result();
        
    }


    public function generer_petit_dejeuner($id_objectif,$id_imc,$id_poids_statut){
        $query = ("select r.id_regime_plat as id_regime_plat,r.id_plat as id_plat,r.id_objectif as id_objectif, r.id_imc as id_imc,r.id_poids_statut as id_poids_statut,r.quantite as quantite,
                    p.designation_plat as designation_plat, p.id_moment_journee as id_moment_journee,m.reference_moment_journee  as reference_moment_journee
                from Regime_plat as r
                inner join Plat as p
                on r.id_plat = p.id_plat 
                inner join Moment_journee m
                on p.id_moment_journee = m.id_moment_journee

                where p.id_moment_journee = 1 and r.id_objectif = %s and r.id_imc=%s and id_poids_statut = %s");
        $query = sprintf($query,$id_objectif,$id_imc,$id_poids_statut);
        $quest = $this->db->query($query);
        $result = $quest -> row_array();
        return $result;
    }

    public function generer_dejeuner($id_objectif,$id_imc,$id_poids_statut){
        $query = ("select r.id_regime_plat as id_regime_plat,r.id_plat as id_plat,r.id_objectif as id_objectif, r.id_imc as id_imc,r.id_poids_statut as id_poids_statut,r.quantite as quantite,
                    p.designation_plat as designation_plat, p.id_moment_journee as id_moment_journee,m.reference_moment_journee  as reference_moment_journee
                from Regime_plat as r
                inner join Plat as p
                on r.id_plat = p.id_plat 
                inner join Moment_journee m
                on p.id_moment_journee = m.id_moment_journee

                where p.id_moment_journee = 2 and r.id_objectif = %s and r.id_imc=%s and id_poids_statut = %s");
        $query = sprintf($query,$id_objectif,$id_imc,$id_poids_statut);
        $quest = $this->db->query($query);
        $result = $quest -> row_array();
        return $result;
    }
    public function generer_dinner($id_objectif,$id_imc,$id_poids_statut){
        $query = ("select r.id_regime_plat as id_regime_plat,r.id_plat as id_plat,r.id_objectif as id_objectif, r.id_imc as id_imc,r.id_poids_statut as id_poids_statut,r.quantite as quantite,
                    p.designation_plat as designation_plat, p.id_moment_journee as id_moment_journee,m.reference_moment_journee  as reference_moment_journee
                from Regime_plat as r
                inner join Plat as p
                on r.id_plat = p.id_plat 
                inner join Moment_journee m
                on p.id_moment_journee = m.id_moment_journee

                where p.id_moment_journee = 3 and r.id_objectif = %s and r.id_imc=%s and id_poids_statut = %s");
        $query = sprintf($query,$id_objectif,$id_imc,$id_poids_statut);
        $quest = $this->db->query($query);
        $result = $quest -> row_array();
        return $result;
    }

    public function generer_sport($id_objectif,$id_imc,$id_poids_statut){
        $query = ("
            select  r.id_regime_sport as id_regime_sport,r.id_sport as id_sport,r.id_objectif as id_objectif, r.id_imc as id_imc,r.id_poids_statut as id_poids_statut,
                    r.repetition as repetition,
                    r.serie as serie,
                    p.designation_sport as designation_sport
            from Regime_sport as r
                inner join Sport as p
                    on r.id_sport = p.id_sport 
            where  r.id_objectif = %s and r.id_imc=%s and id_poids_statut = %s ;");
        $query = sprintf($query,$id_objectif,$id_imc,$id_poids_statut);
        $quest = $this->db->query($query);
        $result = $quest -> row_array();
        return $result;
    }

}

?>