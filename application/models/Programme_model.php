<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programme_model extends CI_Model 
{
    
    public function calcul_imc_utilisateur($id_utilisateur){
        $result = $this->Completion_model->get_completion_where('Completion',['id_utilisateur' => $id_utilisateur])->result();
        $imc = $result[0]/ ($result[1]*$result[1]);
        return $imc;
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


}

?>