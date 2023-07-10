<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Completion extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("completion_model");
        $this->load->model("objectif_model");
        $this->load->model("suivi_poids_model");
    }

    public function assign_poids($suivis){
        $i = 0;
        foreach($suivis as $suivi){
            $valiny[$i] =  $suivi['poids_suivi'];
            $i++;
        }

        return $valiny;
    }

    public function assign_date($suivis){
        $i = 0;
        foreach($suivis as $suivi){
            $valiny[$i] = $suivi['date_suivi'];
            $i++;
        }

        return $valiny;
    }

    public function index(){
        $utilisateur_completion = $this->completion_model->get_completion_where('Completion', $_SESSION['utilisateur']->id_utilisateur);
        $objectifs['objectifs'] = $this->objectif_model->get_objectif('Objectif');
        $this->load->view('header.php');
        if($utilisateur_completion == null){
            $this->load->view('completion_objectif', $objectifs);
        }
        else{
            $suivis = $this->suivi_poids_model->get_Suivi_poids();
            $suivi_poids = $this->assign_poids($suivis);
            $date = $this->assign_date($suivis);
            $suivis['poids_suivis'] = json_encode($suivi_poids);
            $suivis['date_suivis'] = json_encode($date);
            $suivis['suivis'] = $suivis;

            $this->load->view('suivi_poids', $suivis);
        }
        $this->load->view('footer.php');
    }
    

}