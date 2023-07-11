<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programme_model extends CI_Model 
{
    public function __construct(){
        parent::__construct();
        $this->load->model("Objectif_utilisateur_model");
        $this->load->model("Regime_plat_model");
        $this->load->model("Poids_statut_model");
        $this->load->model("Completion_model");
    }

    public function generer ($id_utilisateur) {

        $poids_objectif = $this->Objectif_Utilisateur_model->get_objectif_utilisateur('Objectif_utilisateur', $id_utilisateur);
        $duree = $this-> calcul_duree_programme($id_utilisateur,$poids_objectif);
        $jourTotal = $duree *7;
        $result =array();
        for($i=0; $i<$jourTotal; $i++) {
            $result[] = $this->generer_un_jour($id_utilisateur);
        }
        return $result;
    }
    public function generer_un_jour($id_utilisateur) {
        $imc_utilisateur = $this->calcul_imc_utilisateur($id_utilisateur);
        $imc_reference = $this->get_reference_imc($imc_utilisateur);
        $id_imc = $imc_reference[0];
        $id_poids_statut = $this->get_id_statut_poids($id_utilisateur);
       
        $id_objectif = $this ->get_objectif($id_utilisateur); 
        
        //generer des plats random du moment de la journee

        $data['petit_dejeuner'] = $this->generer_plat(1,$id_objectif,$id_imc,$id_poids_statut);
        $data['dejeuner'] = $this->generer_plat(2,$id_objectif,$id_imc,$id_poids_statut);
        $data['diner'] = $this->generer_plat(3,$id_objectif,$id_imc,$id_poids_statut);
        //generer un sport
        $data['sport'] = $this->generer_sport($id_objectif,$id_imc,$id_poids_statut);
        return $data;
    }
    
    public function calcul_imc_utilisateur($id_utilisateur){
        $result = $this->Completion_model->get_completion_where('Completion',['id_utilisateur' => $id_utilisateur])->result();
        $taille = $result[1]/100;
        $imc = $result[0]/ ($taille*$taille);
        return $imc;
    }
    
    public function get_reference_imc($imc_utilisateur) {
        $query = "Select * from Imc where intervalle_debut <= %s and intervalle_fin >= %s";
        $query = sprintf($query,$imc_utilisateur,$imc_utilisateur);
        echo $query;
        $quest = $this->db->query($query);
        $result = $quest -> row_array();
        return $result;
    }

    public function get_objectif($id_utilisateur) {
        $result = $this->Objectif_Utilisateur_model->get_objectif_utilisateur('Objectif_utilisateur', $id_utilisateur);
        $id_objectif = $result[1];

        return $id_objectif;
    }
    public function get_id_statut_poids($id_utilisateur){
        $result = $this->Objectif_Utilisateur_model->get_objectif_utilisateur('Objectif_utilisateur', $id_utilisateur);
        $poids_objectif =  $result[3];
        $statut_poids_perdre = 0;
        if($poids_objectif < 10) {
            $statut_poids_perdre = 1;
        } else {
            $statut_poids_perdre = 5;
        }
       $id_poids_statut = $this->Poids_statut_model->get_id_poids_statut('Poids_statut',$statut_poids_perdre);
        
        return $id_poids_statut;
    }

    public function calcul_duree_programme($id_utilisateur,$poids_objectif){
        $result = $this->Objectif_Utilisateur_model->get_objectif_utilisateur('Objectif_utilisateur',$id_utilisateur);
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


    public function generer_plat($id_objectif,$id_imc,$id_poids_statut,$id_moment_journee){
        $query = ("select r.id_regime_plat as id_regime_plat,r.id_plat as id_plat,r.id_objectif as id_objectif, r.id_imc as id_imc,r.id_poids_statut as id_poids_statut,r.quantite as quantite,
                    p.designation_plat as designation_plat, p.id_moment_journee as id_moment_journee,m.reference_moment_journee  as reference_moment_journee
                from Regime_plat as r
                inner join Plat as p
                on r.id_plat = p.id_plat 
                inner join Moment_journee m
                on p.id_moment_journee = m.id_moment_journee

                where p.id_moment_journee = %s and r.id_objectif = %s and r.id_imc=%s and id_poids_statut = %s");
        $query = sprintf($query,$id_moment_journee,$id_objectif,$id_imc,$id_poids_statut);
        $quest = $this->db->query($query);
        $result = $quest -> row_array();
        $random = rand(0,count($result))-1;

        return $result[$random];
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
        $random = rand(0,count($result))-1;

        return $result[$random];
    }

    public function inserer($table,$data){
        $result = $this->db->insert($table,$data);
        return $result;
    }
}

?>