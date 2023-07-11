<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plat_model extends CI_Model {

    public function get_plats_moment_journee(){
        $query = "select p.*, mj.reference_moment_journee
                    from Plat p join Moment_journee mj on p.id_moment_journee = mj.id_moment_journee";
        $query = sprintf($query, $_SESSION['utilisateur']->id_utilisateur);
        $query = $this->db->query($query);
        $plats = array();

        foreach ($query->result_array() as $row) {
            $plats[] = $row;
        }

        return $plats;
    }
    
    function get_plats($table){
        $result = $this->db->get($table)->result();
        return $result;
    }

    public function insert($table, $data){
        $result = $this->db->insert($table, $data);
		return $result;
    }
	
}