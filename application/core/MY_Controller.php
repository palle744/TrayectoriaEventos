<?php 
// if (!defined('BASEPATH')) exit('No direct script access allowed');
defined('BASEPATH') OR exit ('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // $this->load->helper("url");
        // $this->load->model('usuario_model');
    }
    
    function loadBaseView($view, $data = array()){
        $this->load->view('base/header');

        if(count($data) == 0){
            $this->load->view($view);
        }else{
            $this->load->view($view, $data);
        }
        //$this->load->view('base/footer');
        $this->load->view('base/footer');
        $this->load->view('base/footer_js');
    } 
}
?>