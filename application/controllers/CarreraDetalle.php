<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarreraDetalle extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();    
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->helper('path');
        $this->load->library('session'); 
        $this->load->model('usuarios_model');       
        if (!$this->session->Session_Siit['id'] ) redirect('/'); 
    }


    public function index(){
        $carrera = $this->input->post("id_carrera");
        $data["page"] = "/sit_screens/carrera_".$carrera;
        $data["foot_page"] = "/footers/foot_carrera_".$carrera;
        $this->load->view(THEME_PROJECT.'/plantillas/dashboard', $data);
    }

    /* public function C1 (){
        $data["page"] = "/sit_screens/carrera_1";
        $data["foot_page"] = "/footers/foot_carrera_1";
        $this->load->view(THEME_PROJECT.'/plantillas/dashboard', $data);
    } */

}