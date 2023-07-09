<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("utilisateur_model");
    }

	public function index()
	{
		$this->load->view('index');
	}

    /**
     * Function that load the inscription view
     */
    public function inscription(){
        $this->load->view('inscription');
    }

    public function store(){
        $data['nom_utilisateur'] = $this->input->post('nom_utilisateur');

        $this->utilisateur_model->insert('Utilisateur', $data);
        $this->session->set_flashdata('Vous avez bien été enregistré', '<div class="alert alert-success">Record has been saved successfully.</div>');
		redirect(base_url());
    }
	
}