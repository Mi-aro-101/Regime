<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmation_code extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // $this->load->model("backoffice/Confirmation_code_model");
    }

	public function confirmation_code(){
        $this->load->view('header');
        $this->load->view("backoffice/confirmation_code");
        $this->load->view('footer');
    }

    public function insert_code(){
        $data['code'] = $_POST['code'];
        $data['montant'] = $_POST['montant'];

        $this->Code_model->insert_code('code', $data);
        redirect(site_url("backoffice/Code/nouveau_code"));

    }
	
}