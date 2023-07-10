<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Completion extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("completion_model");
    }

    public function index(){
        $utilisateur_completion = $this->completion_model->get_completion_where('Completion', $_SESSION['utilisateur']->id_utilisateur);
        if($utilisateur_completion == null){
            $this->load->view('header.php');
            $this->load->view('completion_objectif');
            $this->load->view('footer.php');
        }
    }
    

}