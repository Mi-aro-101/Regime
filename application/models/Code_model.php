<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Code_model extends CI_Model
{
    function get_code($table){
        $result = $this->db->get($table)->result();
        return $result;
    }
}