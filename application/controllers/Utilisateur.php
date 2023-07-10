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

    /**
     * During inscription, check if the password and the 'reconfirm' password matches
     */
    public function verifier_mdp($pass1, $pass2){
        if($pass1 != $pass2){
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Votre ne mot de passe me correpond pas.</div>');
            redirect(site_url("utilisateur/inscription"));
        }
        else { return true; }
    }

    /**
     * Called for insertion
     */
    public function store(){
        $data['nom_utilisateur'] = $_POST['nom_utilisateur'];
        $data['mail_utilisateur'] = $_POST["mail_utilisateur"];
        $data['mot_de_passe_utilisateur'] = $_POST["mot_de_passe_utilisateur1"];
        $password2 = $_POST["mot_de_passe_utilisateur2"];
        $data['statut_utilisateur'] = 1;

        if($this->verifier_mdp($data['mot_de_passe_utilisateur'], $password2)) {
            $this->utilisateur_model->insert('Utilisateur', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Vous avez bien été enregistré.</div>');
            redirect(base_url());
        }

    }


    /**
     * Check if the password and mail match the credentials
     */
    public function authentifier(){
        $mail = $_POST["mail_utilisateur"];
        $password = $_POST["mot_de_passe_utilisateur"];

        $utilisateur = $this->utilisateur_model->get_utilisateur_where('Utilisateur', $mail, $password);
        
        if($utilisateur != null){
            $_SESSION['user']= $utilisateur;
            redirect(site_url("Accueil/accueil"));
        }
        else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Mot de passe ou mail invalide.</div>');
            redirect(base_url());
        }
    }
	
}