<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class inicio_control extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('usuario_model');
        $this->load->library('session');
        $usuario = $this->session->userdata('UsuarioAcceso_Id');
        if(!isset($usuario)){
            redirect(base_url());
            
        }
        
    }
    
    public function index() {
    
    
        $this->loadBaseView('administrador');
        //$this->load->view('login');
    }

    
}