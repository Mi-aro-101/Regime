<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regime_plat_model extends CI_Model
{
    function insert($table,$data){
        $result = $this->db->insert($table,$data);
        return $result;
    }

    function get_objects($table){
        $result = $this->db->get($table)->result();
        return $result;
    }
    
}
?>