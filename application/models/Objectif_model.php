<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Objectif_model extends CI_Model 
    {
        public function get_objectif($table){
            $result = $this->db->get($table)->result();
            return $result;
        }
    }
?>