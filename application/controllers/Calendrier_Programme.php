<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendrier_Programme extends CI_Controller {

	public function calendrier(){
        $this->load->view('header');
        $this->load->view("calendrier_programme");
        $this->load->view('footer');
    }
	
}