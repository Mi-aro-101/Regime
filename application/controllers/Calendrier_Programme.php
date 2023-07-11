<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendrier_Programme extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Accueil_model");
        $this->load->model("Calendrier_model");
        $this->load->model("programme_model");
    }

    public function get_header(){
        if($_SESSION['utilisateur']->statut_utilisateur == 11){
            $this->load->view("backoffice/header_admin");
        }
        else{
            $this->load->view("header");
        }
    }

	public function calendrier(){
        $this->load->view('calendrier_programme');
        $this->get_header();
        $this->load->view('footer');
    }
    
	public function testProgramme(){
        $id_utilisateur = $_SESSION['utilisateur']->id_utilisateur;
        $data = array();
        $data['donnees'] = $this->programme_model->generer($id_utilisateur);
        $this->load->view('testprogramme',$data);
        $this->load->view('header');
        $this->load->view('footer');
    }
}