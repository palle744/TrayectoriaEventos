<?php
// QRController.php
defined('BASEPATH') OR exit('No direct script access allowed');

class QRController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('encryption');
        $this->load->library('session');
        $usuario = $this->session->userdata('UsuarioAcceso_Id');
        if(!isset($usuario)){
            redirect(base_url());
            
        }
    }

    public function index()
    {
        $this->load->view('qr_view');
    }

    public function save_qr_value()
    {
        $qrValue = $this->input->post('qr_value');

        // Insertar el valor del código QR en la base de datos
        // Aquí debes escribir tu código para interactuar con la base de datos y realizar la inserción

        // Ejemplo:
        $data = array(
            'qr_value' => $qrValue
        );
        $this->db->insert('ListaAsistencia', $data);

        echo 'OK'; // Respuesta al cliente
    }

}
