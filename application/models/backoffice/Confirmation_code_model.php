<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Confirmation_code_model extends CI_Model
{

    public function get_all_confirmation(){
        try {
            $script = " select code_statut.id_utilisateur,utilisateur.nom_utilisateur,code.id_code ,code.code,code.montant,code_statut.date_envoi from code_statut
                    join code on code_statut.id_code = code.id_code
                    join utilisateur on code_statut.id_utilisateur = utilisateur.id_utilisateur
                    WHERE code_statut.date_acceptation is null and code_statut.date_refus is null ORDER by code.id_code";
                    $query = $this->db->query($script);

                    $confirmation = array();

            foreach ($query->result_array() as $row) {
                $confirmation[] = $row;
            }

            return $confirmation;
        } catch (\Throwable $th) {
            throw $th;
           
        }
    } 

    public function confirmation_code($id_code,$id_utilisateur,$montant){
        try {
            $accepter = "Update code_statut set date_acceptation= CURDATE()
                    WHERE date_acceptation is null and date_refus is null and id_code=%d and id_utilisateur = %d";
            $sql1 = sprintf($accepter,$id_code,$id_utilisateur);
            $this->db->query($sql1);

            $refuser = "Update code_statut set date_refus= CURDATE()
            WHERE date_acceptation is null and date_refus is null and id_code=%d and id_utilisateur != %d";
            $sql2 = sprintf($refuser,$id_code,$id_utilisateur);
            $this->db->query($sql2);

            $statut_transaction_utilisateur = 1;
            $ajout_porte_feuille = "insert into porte_feuille_historique values (null,%d,%d,CURDATE())";
            $sql3 = sprintf($ajout_porte_feuille,$montant,$statut_transaction_utilisateur);
            $this->db->query($sql3);

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function refus_code($id_code,$id_utilisateur){
        try {
            $refuser = "Update code_statut set date_refus= CURDATE()
                    WHERE id_code=%d and id_utilisateur = %d and date_acceptation is null and date_refus is null ";
            $sql1 = sprintf($refuser,$id_code,$id_utilisateur);
            $this->db->query($sql1);

        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
