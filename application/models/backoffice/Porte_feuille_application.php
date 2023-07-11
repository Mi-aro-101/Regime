<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Porte_feuille_application extends CI_Model {

    public function get_vola_appli(){
        $sql = "select sum(montant*statut_transaction_application) as vola from porte_feuille_application_historique;";
        $query = $this->db->query($sql);
        $res = array();

        foreach($query->result_array() as $row){
            $res[] = $row;
        }
        return $res;
    }

    public function insert($somme){
        $sql = "insert into porte_feuille_application_historique values(null,%d,1,CURDATE()) ";
        $req = sprintf($sql,$somme);
        $query = $this->db->query($req);
    }
	
}