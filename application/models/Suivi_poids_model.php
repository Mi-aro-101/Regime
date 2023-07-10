<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Suivi_poids_model extends CI_Model 
    {
        public function get_Suivi_poids(){
            $query = "select u.*, sp.*, c.* 
                    from Utilisateur u join Suivi_poids sp on u.id_utilisateur=sp.id_utilisateur 
                    join Completion c on u.id_utilisateur=c.id_utilisateur 
                where u.id_utilisateur=%s";
            $query = sprintf($query, $_SESSION['utilisateur']->id_utilisateur);
            $query = $this->db->query($query);
            $suivis = array();

            foreach($query->result_array() as $row){
                $suivis[] = $row;
            }

            return $suivis;
        }
    }
?>