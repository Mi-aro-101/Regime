<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur_model extends CI_Model {

    public function insert($table, $data){
        $result = $this->db->insert($table, $data);
		return $result;
    }
	
}