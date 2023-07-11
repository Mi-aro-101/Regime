<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Poids_statut_model extends CI_Model 
    {
        public function get_id_poids_statut($table,$statut_poids){
            
            $result = $this->db->get_where($table,['statut_poids' => $statut_poids])->row();
            return $result->id_poids_statut;
        }
    }
?>