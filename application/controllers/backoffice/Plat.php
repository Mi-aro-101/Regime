<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("backoffice/plat_model");
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
        $plat_liste = $this->plat_model->get_plats('Plat');
        $this->load->view("backoffice/display_plat");
        $this->load->view("footer");
    }

}
