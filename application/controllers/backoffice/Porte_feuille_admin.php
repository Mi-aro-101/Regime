<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Porte_feuille_admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("porte_feuille_model");
        $this->load->model("backoffice/code_model");
        $this->load->model("backoffice/Porte_feuille_application");
    }

    public function get_vola(){
        $data = array();
        $data['vola'] = $this->Porte_feuille_application->get_vola_appli();
        $this->load->view("backoffice/header_admin");
        $this->load->view("backoffice/Porte_feuille_appli",$data);
        $this->load->view("footer");
    }

}