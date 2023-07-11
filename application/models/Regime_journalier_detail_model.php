<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Regime_journalier_detail_model extends CI_Model 
    {
        public function insert($table, $data){
            $result = $this->db->insert($table, $data);
            return $result;
        }

        public function get_by_journalier($table, $id_regime_journalier){
            $result = $this->db->insert($table, ['id_regime_journalier' => $id_regime_journalier]);
            return $result;
        }
    }
?>