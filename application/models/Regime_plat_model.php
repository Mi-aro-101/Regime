<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Regime_plat_model extends CI_Model 
    {
        public function get_regime_plat_parid($table,$id_objectif){
            
            $result = $this->db->get_where($table,['id_objectif' => $id_objectif])->result();
            return $result;
        }
    }
?>