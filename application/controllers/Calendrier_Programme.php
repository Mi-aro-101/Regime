<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendrier_Programme extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Accueil_model");
        $this->load->model("Calendrier_model");
        $this->load->model("programme_model");
    }

	public function calendrier(){
        $this->load->view('calendrier_programme');
        $this->load->view('header');
        $this->load->view('footer');
    }
    
	public function testProgramme(){
        $id_utilisateur = $_SESSION['utilisateur']->id_utilisateur;
        try {
            $data = array();
            $data['donnees'] = $this->programme_model->generer($id_utilisateur);
            $this->load->view('testprogramme',$data);
            $this->load->view('header');
            $this->load->view('footer');
        } catch (\Exception $e) {
            if ($e -> getMessage() == 'Programme non disponible pour votre imc') {
                $str1 = '<script language="javascript">alert("%s"); window.history.back();</script>';
                $str1 = sprintf($str1, $e->getMessage());
                echo $str1;
            }
        }
    }
}