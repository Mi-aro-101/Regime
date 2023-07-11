<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendrier_Programme extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Accueil_model");
        $this->load->model("Calendrier_model");
    }

	public function calendrier(){
        $this->load->view('calendrier_programme');
        $this->load->view('header');
        $this->load->view('footer');
    }
    
	public function testProgramme(){
        $this->load->view('header');
        $this->load->view('footer');
    }
}