<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Code_model extends CI_Model
{
    function get_code($table){
        $result = $this->db->get($table)->result();
        return $result;
    }

    public function insert_code($table,$data) {
        $result = $this->db->insert($table,$data);
        return $result;
    }

    public function get_code_not_set(){
        $query = "select cs.id_utilisateur, cs.date_envoi, cs.date_acceptation, cs.date_refus, c.*
                    from Code c left join Code_statut cs on c.id_code = cs.id_code";
        $query = $this->db->query($query);
        $code = array();

        foreach ($query->result_array() as $row) {
            $code[] = $row;
        }

        return $code;
    }

    // Inty Miaro a
}