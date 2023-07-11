<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suivi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("suivi_poids_model");
        $this->load->model("completion_model");
    }

    public function index(){
        $this->load->view("header");
        $completions = $this->completion_model->get_completion_where('Completion', $_SESSION['utilisateur']->id_utilisateur);
        if($completions == null){
            $this->load->view("suivi_null");
        }
        else{
            $this->load->view("inserer_suivi");
        }

        $this->load->view("footer");
    }

    public function inserer(){
        $data['id_utilisateur'] = $_SESSION['utilisateur']->id_utilisateur;
        $data['date_suivi'] = $_POST['date_suivi'];
        $data['poids_suivi'] = $_POST['poids_suivi'];
        $data['commentaire_suivi'] = " ";

        $this->suivi_poids_model->insert('Suivi_poids', $data);
        redirect(site_url("completion"));

    }
}