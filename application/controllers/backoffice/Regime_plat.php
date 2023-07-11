<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime_plat extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("backoffice/regime_plat_model");
        $this->load->model("backoffice/plat_model");
    }

    public function get_header(){
        if($_SESSION['utilisateur']->statut_utilisateur == 11){
            $this->load->view("backoffice/header_admin");
        }
        else{
            $this->load->view("header");
        }
    }
    public function index() {
        $this->get_header();
        $plat_liste['plat_liste'] = $this->plat_model->get_plats('Plat');
        $plat_liste['objectifs'] = $this->plat_model->get_plats('Objectif');
        $plat_liste['imc'] = $this->plat_model->get_plats('Imc');
        $plat_liste['poids_statut'] = $this->plat_model->get_plats('Poids_statut');
        $this->load->view("backoffice/formulaire_regime_plat", $plat_liste);
        $this->load->view("footer");
    }
}