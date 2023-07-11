<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("backoffice/plat_model");
        $this->load->model("backoffice/moment_journee_model");
    }

    public function get_header(){
        if($_SESSION['utilisateur']->statut_utilisateur == 11){
            $this->load->view("backoffice/header_admin");
        }
        else{
            $this->load->view("header");
        }
    }

    public function index() {
        
        $this->get_header();
        $plat_liste['plat_liste'] = $this->plat_model->get_plats_moment_journee();
        $plat_liste['categories'] = $this->moment_journee_model->get_moment_journee('Moment_journee');
        $this->load->view("backoffice/display_plat", $plat_liste);
        $this->load->view("footer");
    }

    public function inserer(){
        $data['designation_plat'] = $_POST['designation_plat'];
        $data['id_moment_journee'] = $_POST['moment_journee'];

        $this->plat_model->insert('Plat', $data);
        redirect(site_url("backoffice/plat"));
    }

}
