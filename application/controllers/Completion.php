<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Completion extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("completion_model");
        $this->load->model("objectif_model");
        $this->load->model("suivi_poids_model");
        $this->load->model("programme_model");
        $this->load->model("regime_plat_model");
        $this->load->model("regime_journalier_model");
        $this->load->model("regime_journalier_detail_model");

    }

    public function assign_poids($suivis){
        $i = 0;
        $valiny = [];
        foreach($suivis as $suivi){
            $valiny[$i] =  $suivi['poids_suivi'];
            $i++;
        }

        return $valiny;
    }

    public function assign_date($suivis){
        $i = 0;
        $valiny=[];
        foreach($suivis as $suivi){
            $valiny[$i] = $suivi['date_suivi'];
            $i++;
        }

        return $valiny;
    }

    public function calcul_imc($suivi){
        $poids_actuel = $suivi[count($suivi)-1]['poids_suivi'];
        $taille_m_carre = ($suivi[0]['taille']/100)*($suivi[0]['taille']/100);
        $imc =  $poids_actuel/$taille_m_carre;
        $imc_real_number = number_format($imc, 2);
        $ref = $this->programme_model->get_reference_imc($imc_real_number);
        $refi = $ref['designation_imc'];

        return [$imc_real_number, $refi];
    }

    public function get_header(){
        if($_SESSION['utilisateur']->statut_utilisateur == 11){
            $this->load->view("backoffice/header_admin");
        }
        else{
            $this->load->view("header");
        }
    }

    public function index(){
        $utilisateur_completion = $this->completion_model->get_completion_where('Completion', $_SESSION['utilisateur']->id_utilisateur);
        $objectifs['objectifs'] = $this->objectif_model->get_objectif('Objectif');
        $suivis = $this->suivi_poids_model->get_Suivi_poids();
        $this->get_header();
        if($suivis == null){
            $this->load->view('completion_objectif', $objectifs);
        }
        else{
            $suiv['imc'] = $this->calcul_imc($suivis);
            $suivi_poids = $this->assign_poids($suivis);
            $date = $this->assign_date($suivis);
            $suivis['poids_suivis'] = json_encode($suivi_poids);
            $suivis['date_suivis'] = json_encode($date);
            $suivis['suivis'] = $suivis;
            // $suivi['imc'] = $this->calcul_imc($suivis);
            $suiv['poids_suivis'] = json_encode($suivi_poids);
            $suiv['date_suivis'] = json_encode($date);
            $suiv['suivis'] = $suivis;

            
            $this->load->view('suivi_poids', $suiv);
        }
        $this->load->view('footer.php');
    }
    
    public function insertion_objectif(){
        $data_completion['id_utilisateur'] = $_SESSION['utilisateur']->id_utilisateur;
        $data_completion['poids_completion'] = $_POST['poids_completion'];
        $data_completion['taille'] = $_POST['taille'];

        $data_objectif['id_utilisateur'] = $_SESSION['utilisateur']->id_utilisateur;
        $data_objectif['id_objectif'] = $_POST['id_objectif'];
        $data_objectif['poids_objectif'] = $_POST['poids_objectif'];

        $data_suivis['id_utilisateur'] = $_SESSION['utilisateur']->id_utilisateur;
        $data_suivis['poids_suivi'] = $_POST['poids_completion'];
        $data_suivis['date_suivi'] = $_POST['date_suivi'];
        $data_suivis['commentaire_suivi'] = 'Premier jour';

        $this->completion_model->insert('Completion',$data_completion);
        $this->completion_model->insert('Objectifs_utilisateur',$data_objectif);
        $this->suivi_poids_model->insert('Suivi_poids',$data_suivis);

        // //creation d'un programme
        // $data_programme['duree'] = number_format($this -> programme_model->calcul_duree_programme($_SESSION['utilisateur']->id_utilisateur,$_POST['poids_objectif']),0);
        // $data_programme['id_utilisateur'] = $this -> programme_model->generer($_SESSION['utilisateur']->id_utilisateur);
        // $this->programme_model->insert ('Programme',$data_programme);

        // //prendre le programme et creation d'un journalier selon la duree
        // $data_journalier['id_programme']= $this->programme_model->get_by_id_utilisateur('Programme',$_SESSION['utilisateur']->id_utilisateur);
        // $nombre_jour=  $data_programme['duree']*7;
        // for($i=0; $i<=nombre_jour; $i++) {
        //     $this->regime_journalier_model->insert
        // }


        redirect(site_url("completion"));
    }
}