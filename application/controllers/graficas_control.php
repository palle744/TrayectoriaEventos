<?php
class graficas_control extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('busqueda_model');
        $this->load->library('session');
        $usuario = $this->session->userdata('UsuarioAcceso_Id');
        if(!isset($usuario)){
            redirect(base_url());
            
        }

    }
    public function index() {
        
        // Cargar el modelo para interactuar con la base de datos
        $this->load->model('EventoListaModel');

        // Obtener los nombres de los eventos
        $eventos = $this->EventoListaModel->obtenerNombresEventos();

        // Pasar los nombres de los eventos a la vista
        $data['eventos'] = $eventos;

        // Cargar la vista y pasar los datos
        $this->load->view('estadisticas', $data);
    }
}
