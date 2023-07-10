<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Accueil_model");
        $this->load->library('session');
    }

	public function accueil(){
        $this->load->view('header');
        $this->load->view('footer');
    }
	
}