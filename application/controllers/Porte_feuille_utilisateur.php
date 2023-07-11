<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Porte_feuille_utilisateur extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("porte_feuille_model");
        $this->load->model("backoffice/code_model");
    }

    public function get_header(){
        if($_SESSION['utilisateur']->statut_utilisateur == 11){
            $this->load->view("backoffice/header_admin");
        }
        else{
            $this->load->view("header");
        }
    }

    public function index(){
        $mypocket = $this->porte_feuille_model->get_by_utilisateur('Porte_feuille_utilisateur', $_SESSION['utilisateur']->id_utilisateur);
        $this->get_header();
        if($mypocket == null){
            $this->load->view("creer_porte_feuille");
        }
        else{
            $codes['codes'] = $this->code_model->get_code_not_set();
            $this->load->view("charger_code", $codes);
        }
        $this->load->view('footer');
    }

    public function creer_porte_feuille(){
        $data['id_utilisateur'] = $_SESSION['utilisateur']->id_utilisateur;
        $this->porte_feuille_model->insert('Porte_feuille_utilisateur', $data);

        redirect(site_url("porte_feuille_utilisateur"));
    }

    /**
     * check if k is in the array code
     */
    public function k_in_array($k, $tab){
        $result = 0;
        foreach($tab as $arr){
            if($k == $arr['id_utilisateur']){
                $result = 1;
                break;
            }
        }

        return $result;
    }

    public function demander_code($id_code){

        $codes = $this->code_model->get_code_not_set();

        if($this->k_in_array($_SESSION['utilisateur']->id_utilisateur, $codes) == 1){
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Vous avez déjà envoyer une demande à cette code ou vous avez déjà pris.</div>');
            redirect(site_url("porte_feuille_utilisateur"));
        }

        $data['id_code'] = $id_code;
        $data['id_utilisateur'] = $_SESSION['utilisateur']->id_utilisateur;
        // Get now date 
        $data['date_envoi'] = date('Y-m-d');
        $data['date_acceptation'] = NULL;
        $data['date_refus'] = NULL;

        $this->porte_feuille_model->insert('Code_statut', $data);
        redirect(site_url("porte_feuille_utilisateur"));
    }
}