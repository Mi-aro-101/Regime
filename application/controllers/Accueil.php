<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Accueil_model");
        $this->load->library('session');
    }

    public function get_header(){
        if($_SESSION['utilisateur']->statut_utilisateur == 11){
            $this->load->view("backoffice/header_admin");
        }
        else{
            $this->load->view("header");
        }
    }

	public function accueil(){

        $this->get_header();
        $this->load->view('footer');
    }
	
}