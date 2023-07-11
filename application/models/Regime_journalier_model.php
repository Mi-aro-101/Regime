<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Regime_journalier_model extends CI_Model 
    {
        public function insert($table, $data){
            $result = $this->db->insert($table, $data);
            return $result;
        }

        public function get_by_programme($table, $id_programme){
            $result = $this->db->insert($table, ['id_programme' => $id_programme]);
            return $result;
        }
    }
?>