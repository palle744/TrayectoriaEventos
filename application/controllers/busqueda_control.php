<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Busqueda_control extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('busqueda_model');
        $this->load->library('session');
        $usuario = $this->session->userdata('UsuarioAcceso_Id');
        if (!isset($usuario)) {
            redirect(base_url());
        }
    }
    public function index()
    {
        $this->load->view('busqueda');
    }

    public function busqueda()
    {
        $this->load->database();
        $query = $this->db->query('SELECT PersonaLista_Id, Nombre_Asistente, Correo_Electronico_Asistente, CURP_Asistente, Fecha_Captura FROM PersonaLista');
        // $data = $query->result_array();
        $data = $this->Busqueda_model->obtener_datos();
        echo json_encode($data);
    }

    public function cargarPersona()
    {
        $this->load->database();
        $query = $this->db->query('SELECT PersonaLista_Id, Nombre_Asistente, Correo_Electronico_Asistente, CURP_Asistente, Fecha_Captura,Codigo_Acceso, Primer_Apellido_Asistente, Segundo_Apellido_Asistente, Nombre_Evento FROM PersonaLista');
        $data = $query->result_array();
        echo json_encode(array('data' => $data));
    }
    public function cargarIngresos()
    {
        $this->load->database();
        $query = $this->db->query('SELECT pl.PersonaLista_Id, pl.Nombre_Asistente, pl.Correo_Electronico_Asistente, pl.CURP_Asistente, pl.Fecha_Captura, pl.Codigo_Acceso, pl.Primer_Apellido_Asistente, pl.Segundo_Apellido_Asistente, pl.Nombre_Evento 
                            FROM PersonaLista pl
                            JOIN ListaAsistencia la ON pl.Codigo_Acceso = la.Codigo_Acceso');
        $data = $query->result_array();
        echo json_encode(array('data' => $data));
    }
}
