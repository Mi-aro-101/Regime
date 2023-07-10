<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Porte_feuille_utilisateur extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("porte_feuille_model");
        $this->load->model("code_model");
    }

    public function index(){
        $mypocket = $this->porte_feuille_model->get_by_utilisateur('Porte_feuille_utilisateur', $_SESSION['utilisateur']->id_utilisateur);
        $this->load->view('header');
        if($mypocket == null){
            $this->load->view("creer_porte_feuille");
        }
        else{
            $codes['codes'] = $this->code_model->get_code('Code');
            $this->load->view("charger_code", $codes);
        }
        $this->load->view('footer');
    }

    public function creer_porte_feuille(){
        $data['id_utilisateur'] = $_SESSION['utilisateur']->id_utilisateur;
        $this->porte_feuille_model->insert('Porte_feuille_utilisateur', $data);

        redirect(site_url("porte_feuille_utilisateur"));
    }

    public function demander_code($id_code){
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