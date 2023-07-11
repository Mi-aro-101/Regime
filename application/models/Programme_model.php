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

        $poids_objectif = $this->Objectif_utilisateur_model->get_objectif_utilisateur('Objectifs_utilisateur', $id_utilisateur);
        $duree = number_format($this-> calcul_duree_programme($id_utilisateur,$poids_objectif),0);
        $jourTotal = $duree *7;
        $result =array();
        for($i=0; $i<=$jourTotal; $i++) {
            $result[] = $this->generer_un_jour($id_utilisateur);
        }
        return $result;
    }
    public function generer_un_jour($id_utilisateur) {
        $imc_utilisateur = $this->calcul_imc_utilisateur($id_utilisateur);
        $imc_reference = $this->get_reference_imc($imc_utilisateur);
        $id_imc = $imc_reference['id_imc']; 
        $id_poids_statut = $this->get_id_statut_poids($id_utilisateur);
       
        $id_objectif = $this ->get_objectif($id_utilisateur); 
        
        //generer des plats random du moment de la journee
        $data['petit_dejeuner'] = $this->generer_plat($id_objectif,$id_imc,$id_poids_statut,1);
        $data['dejeuner'] = $this->generer_plat($id_objectif,$id_imc,$id_poids_statut,2);
        $data['diner'] = $this->generer_plat($id_objectif,$id_imc,$id_poids_statut,3);
        //generer un sport
        $data['sport'] = $this->generer_sport($id_objectif,$id_imc,$id_poids_statut);
        return $data;
    }
    
    public function calcul_imc_utilisateur($id_utilisateur){
        $result = $this->Completion_model->get_completion_where('Completion',$id_utilisateur);
        $taille = ($result -> taille)/100;
        $imc = ($result -> poids_completion)/ ($taille*$taille);
        return $imc;
    }
    
    public function get_reference_imc($imc_utilisateur) {
        $query = "Select * from Imc where intervalle_debut <= %s and intervalle_fin >= %s";
        $query = sprintf($query,$imc_utilisateur,$imc_utilisateur);
        $quest = $this->db->query($query);
        $result = $quest -> row_array();
        return $result;
    }

    public function get_objectif($id_utilisateur) {
        $result = $this->Objectif_utilisateur_model->get_objectif_utilisateur('Objectifs_utilisateur', $id_utilisateur);
        $id_objectif = $result -> id_objectif;

        return $id_objectif;
    }
    public function get_id_statut_poids($id_utilisateur){
        $result = $this->Objectif_utilisateur_model->get_objectif_utilisateur('Objectifs_utilisateur', $id_utilisateur);
        $poids_objectif =  $result ->poids_objectif;
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
        $result = $this->Objectif_utilisateur_model->get_objectif_utilisateur('Objectifs_utilisateur',$id_utilisateur);
        $id_obj = $result ->id_objectif;
        // echo $id_obj;
        if ($id_obj==1) {
            $duree = $result -> poids_objectif;
        }
        else{
            $duree = ($result -> poids_objectif)*2;
        }
        return $duree;
    }

    public function get_regimes_adequats($id_objectif){
        $regime = $this->Regime_plat_model->get_regime_plat_parid('Regime_plat',$id_objectif)->result();
        return $regime;
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
        // echo $query;
        $quest = $this->db->query($query);
        $test = $quest->row_array();
        $result = array();
        $i =0;
        if($test == null) {
            throw new Exception("Programme non disponible pour votre imc", 1);
            
        } else {
            foreach ($quest->result_array() as $row) {
                $result[$i] = $row; 
                $i++;
            }
            $random = rand(0,count($result)-1);
            // return $result[$random]['designation_plat'];
            return $result[$random];
        }
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
        $quest = $this->db->query($query);$test = $quest->row_array();
        $test = $quest->row_array();
        $result = array();
        $i =0;
        if($test == null) {
            throw new Exception("Programme non disponible pour votre imc", 1);
            
        } else {
            foreach ($quest->result_array() as $row) {
                $result[$i] = $row; 
                $i++;
            }
            $random = rand(0,count($result)-1);
            // return $result[$random]['designation_plat'];
            return $result[$random];
        }
    }

    public function inserer($table,$data){
        $result = $this->db->insert($table,$data);
        return $result;
    }
    public function get_by_id_utilisateur($table,$id_utilisateur) {
        $result = $this->db->get_Where($table,['id_utilisateur' => $id_utilisateur])->row();
        return $result;
    }
}

?>