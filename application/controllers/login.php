<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class login extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('usuario_model');
        $this->load->library('session');
    }

    public function index()
    {

        $this->loadBaseView('login');
        //$this->load->view('login');
    }

    public function buscarusuario()
    {
        // if (isset($_POST['Pass_Usuario'])) {
        $usuario = $this->input->post('Nombre_Usuario');
        $contraseña = $this->input->post('Pass_Usuario');
        $consulta = $this->usuario_model->login($usuario, $contraseña);
        if ($consulta['total'] == 1) {
            // Inicio de sesión exitoso, redireccionar al usuario

            $this->session->set_userdata($consulta['datos']);

            // $this->loadBaseView('administrador');
            // $this->load->view('administrador');


        }
        // Inicio de sesión fallido, mostrar alerta
        echo json_encode($consulta);


        // } else {
        //     redirect(base_url().'login');
        //     print_r(3);
        // }
    }

    public function cerrarsesion()
    {
        $this->session->unset_userdata(array('Nombre_Usuario', 'Pass_Usuario' ,'UsuarioAcceso_Id' ));
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
