<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Porte_feuille_model extends CI_Model 
    {
        public function insert($table, $data){
            $result = $this->db->insert($table, $data);
            return $result;
        }

        public function get_by_utilisateur($table, $id_utilisateur){
            $result = $this->db->get_where($table, ['id_utilisateur' => $id_utilisateur])->row();
            return $result;
        }
    }
?>