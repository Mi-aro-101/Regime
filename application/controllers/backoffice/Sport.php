<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sport extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("backoffice/sport_model");
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
        $this->get_header();
        $sports['sports'] = $this->sport_model->get_sport("Sport");
        $this->load->view("backoffice/display_sport", $sports);
        $this->load->view("footer.php");
    }

    public function inserer(){
        $data['designation_sport'] = $_POST['designation_sport'];

        $this->sport_model->insert("Sport", $data);
        redirect("backoffice/sport");
    }
}