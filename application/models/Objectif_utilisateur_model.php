<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Objectif_Utilisateur_model extends CI_Model 
    {
        public function get_objectif_utilisateur($table,$id_utilisateur){
            
            $result = $this->db->get_where($table,['id_utilisateur' => $id_utilisateur])->row();
            return $result;
        }
    }
?>