<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmation_code extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("backoffice/Confirmation_code_model");
    }

    public function get_header(){
        if($_SESSION['utilisateur']->statut_utilisateur == 11){
            $this->load->view("backoffice/header_admin");
        }
        else{
            $this->load->view("header");
        }
    }

	public function confirmation_code(){
        $this->get_header();
        $this->load->view("backoffice/confirmation_code");
        $this->load->view('footer');
    }

    public function insert_code(){
        $data['code'] = $_POST['code'];
        $data['montant'] = $_POST['montant'];

        $this->Code_model->insert_code('code', $data);
        redirect(site_url("backoffice/Code/nouveau_code"));

    }

    public function acceptation_code(){
        $data['id_code'] = $_GET['id_code'];
        $data['id_utilisateur'] = $_GET['id_utilisateur'];
        $data['montant']= $_GET['montant'];
        $this->Confirmation_code_model->confirmation_code($data['id_code'],$data['id_utilisateur'],$data['montant']);
        redirect(site_url("backoffice/Confirmation_code/confirmation_code"));
    }

    public function refus_code(){
        $data['id_code'] = $_GET['id_code'];
        $data['id_utilisateur'] = $_GET['id_utilisateur'];
        // $data['montant']= $_POST['montant'];
        $this->Confirmation_code_model->refus_code($data['id_code'],$data['id_utilisateur']);
        redirect(site_url("backoffice/Confirmation_code/confirmation_code"));
    }

    public function get_all_confirmation(){
        $data = array();
        $data['donnees'] = $this->Confirmation_code_model->get_all_confirmation();
        $this->load->view('header');
        $this->load->view("backoffice/confirmation_code",$data);
        $this->load->view('footer');
    }
	
}