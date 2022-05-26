<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();    
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->helper('path');
        $this->load->library('session'); 
        $this->load->model('usuarios_model');                       
    }

	public function index(){
        $data["page"] = $this->load->view(THEME_PROJECT."/login/modal_registro");
		$this->load->view(THEME_PROJECT.'/login/'.Login, $data);
	}

	public function loginUsuario(){
		try { 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user', 'E-mail', 'required');            // valida email
            $this->form_validation->set_rules('password', 'Contraseña', 'required');    // valida password

            if ($this->form_validation->run() == FALSE) {
                echo "".validation_errors()."";                
            } else {
                echo $this->usuarios_model->loginUserModel();
            }
        }
        catch(Exception $e){
            return $e->getMessage();
        }
		/* redirect(base_url()."/llega");
		print_r("llego"); */
	}
    

    /* public function loginUsuario(){
        print_r("hola");
    } */
}

