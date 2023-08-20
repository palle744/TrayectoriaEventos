<?php
// if (!defined('BASEPATH')) exit('No direct script access allowed');
defined('BASEPATH') or exit('No direct script access allowed');

class pagina_publica_control extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('usuario_model');
        $this->load->model('EventosListaModel');
    }

    public function eventos()
    {
        $this->loadBaseView('eventosgto');
        //$this->load->view("eliminar_evento");
    }
}

