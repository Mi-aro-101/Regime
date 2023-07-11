<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sport_model extends CI_Model {

    public function get_sport($table){
        $result = $this->db->get($table)->result();
        return $result;
    }

    public function insert($table, $data){
        $result = $this->db->insert($table, $data);
		return $result;
    }
	
}