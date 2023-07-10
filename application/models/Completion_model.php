<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Completion_model extends CI_Model 
{
    public function get_completion_where($table, $id_utilisateur){
        $result = $this->db->get_where($table, ['id_utilisateur' => $id_utilisateur])->row();
        return $result;
    }
}

?>