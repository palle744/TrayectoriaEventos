<?php
// if (!defined('BASEPATH')) exit('No direct script access allowed');
defined('BASEPATH') or exit('No direct script access allowed');

class administrador_control extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('usuario_model');
        $this->load->model('EventosListaModel');
        $this->load->library('session');
    }

    public function index()
    {
        $this->formulario();
    }
    public function formulario()
    {
        if (!in_array($this->session->userdata('Rol_Usuario'), array('admin', 'editor'))) {
            $this->load->view('perdido');
        } else {
            $this->loadBaseView('formulario_eventos');
        }
    }
    public function modificar()
    {
        if (!in_array($this->session->userdata('Rol_Usuario'), array('admin', 'editor'))) {
            $this->load->view('perdido');
        } else {
            $data = array(
                'EstadoEvento' => 0
            );
            $this->loadBaseView('modificar_evento');
        }
    }
    public function eliminar()
    {
        if (!in_array($this->session->userdata('Rol_Usuario'), array('admin', 'editor'))) {
            $this->load->view('perdido');
        } else {
            $this->loadBaseView('eliminar');
        }
    }
    public function eventos()
    {
        $this->loadBaseView('eventosgto');
        //$this->load->view("eliminar_evento");
    }
    public function busqueda()
    {
        if (!in_array($this->session->userdata('Rol_Usuario'), array('admin', 'editor'))) {
            $this->load->view('perdido');
        } else {
            $this->loadBaseView('busqueda');
        }
    }
    public function asistencias()
    {
        if (!in_array($this->session->userdata('Rol_Usuario'), array('admin', 'editor', 'analista'))) {
            $this->load->view('perdido');
        } else {
            $this->loadBaseView('ingresos');
        }
    }
    public function inicio()
    {
        $this->loadBaseView('administrador');
    }
    public function estadisticas()
    {
        if (!in_array($this->session->userdata('Rol_Usuario'), array('admin', 'analista', 'editor'))) {
            $this->load->view('perdido');
        } else {
            $data = array();
            $data['eventos'] = $this->db->get('EventoLista')->result_array();
            $this->loadBaseView('asistencia_view', $data);
        }
    }
}
