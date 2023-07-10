<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Genre_model extends CI_Model 
{
    public function get_genre($table){
        $result = $this->db->get($table)->result();
        return $result;
    }
}

?>