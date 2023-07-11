<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plat_model extends CI_Model {

    public function get_plats($table){
        $result = $this->db->get($table)->result();
        return $result;
    }
	
}