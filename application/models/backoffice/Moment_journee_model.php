<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Moment_journee_model extends CI_Model
{
    function get_moment_journee($table){
        $result = $this->db->get($table)->result();
        return $result;
    }
}
?>