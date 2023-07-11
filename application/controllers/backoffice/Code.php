<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("backoffice/Code_model");
    }

	public function nouveau_code(){
        $this->load->view('header');
        $this->load->view("backoffice/nouveau_code");
        $this->load->view('footer');
    }

    public function insert_code(){
        $data['code'] = $_POST['code'];
        $data['montant'] = $_POST['montant'];

        $this->Code_model->insert_code('code', $data);
        redirect(site_url("backoffice/Code/nouveau_code"));

    }
	
}