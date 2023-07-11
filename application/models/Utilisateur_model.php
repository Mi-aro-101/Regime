<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur_model extends CI_Model {

    public function insert($table, $data){
        $result = $this->db->insert($table, $data);
		return $result;
    }

    public function get_utilisateur($table){
        $result = $this->db->get($table)->result();
        return $result;
    }

    public function get_utilisateur_where($table, $mail, $password, $statut){
        $result = $this->db->get_where($table, ['mail_utilisateur' => $mail, 'mot_de_passe_utilisateur' => $password, 'statut_utilisateur' => $password])->row();
        return $result;
    }
	
}