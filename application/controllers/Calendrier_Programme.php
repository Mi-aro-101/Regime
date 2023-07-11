<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Calendrier_Programme extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Accueil_model");
        $this->load->model("Calendrier_model");
        $this->load->model("programme_model");
    }

    public function get_header(){
        if($_SESSION['utilisateur']->statut_utilisateur == 11){
            $this->load->view("backoffice/header_admin");
        }
        else{
            $this->load->view("header");
        }
    }

	public function calendrier(){
        $this->load->view('calendrier_programme');
        $this->get_header();
        $this->load->view('footer');
    }
    
	public function testProgramme(){
        // $this->load->library('pdf');
        require('Mypdf.php');
        $header = array('Jour', 'Petit Dejeuner','Dejeuner','Diner','Sport');
        // Data loading
    
        $id_utilisateur = $_SESSION['utilisateur']->id_utilisateur;
        try {
            // $data = array();
            $data = $this->programme_model->generer($id_utilisateur);

            $pdf = new Mypdf();
            $pdf->AddPage();
            $pdf->BasicTable($header,$data);
            $pdf->Output();
            // $this->load->view('testprogramme',$data);

            // $this->pdf->load_view('mypdf');
            // $this->pdf->render();
            // $this->pdf->stream("test.pdf");
            // $this -> testPDF();
        } catch (\Exception $e) {
            if ($e -> getMessage() == 'Programme non disponible pour votre imc') {
                $str1 = '<script language="javascript">alert("%s"); window.history.back();</script>';
                $str1 = sprintf($str1, $e->getMessage());
                echo $str1;
            }
        }
    }
}