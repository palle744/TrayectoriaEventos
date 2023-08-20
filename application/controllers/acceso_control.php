<?php
defined('BASEPATH') or exit('No direct script access allowed');

class acceso_control extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('lista_asistencia_model'); // Ajusta el nombre del modelo según tu estructura
        $this->load->helper('url');
        $this->load->library('encryption');
        $this->load->model('evento_model');
        $this->load->library('session');
        if (!in_array($this->session->userdata('Rol_Usuario'), array('staff', 'admin'))) {
            if (!isset($usuario)) {
                // redirect(base_url());
                redirect('https://juventudesgto.guanajuato.gob.mx/');
            }
        }
        // $usuario = $this->session->userdata('UsuarioAcceso_Id');
    }

    // public function index()
    // {
    //     $codigo = $this->input->get('codigo');
    //     $usuario = $this->session->userdata('Nombre_Usuario');

    //     // Verifica si se recibió el parámetro del código
    //     if (!empty($codigo)) {
    //         $codigo_existe = $this->validarCodigo($codigo);

    //         if ($codigo_existe) {
    //             // Verifica si el código ya existe en la tabla ListaAsistencia
    //             if ($this->lista_asistencia_model->existeCodigo($codigo)) {
    //                 // redirect(base_url('index.php/error_control'));
    //                 $this->loadBaseView('error2');
    //             } else {
    //                 // El código no existe, inserta el código en la tabla ListaAsistencia
    //                 $data = array(
    //                     'Codigo_Acceso' => $codigo,
    //                     'Usuario_Captura' => $usuario,
    //                 );
    //                 $this->lista_asistencia_model->insertarCodigo($data);
    //                 // $this->lista_asistencia_model->insertar($data); // Ajusta el nombre del método del modelo según tu estructura
    //                 // Redirige a la página de éxito o cualquier otra página que desees
    //                 // redirect(base_url('index.php/exito_control'));
    //                 $this->loadBaseView('exito2');
    //             }
    //         } else {
    //             // El código no existe, muestra la página "no existe"
    //             $this->loadBaseView('no_existe');
    //         }
    //     } else {
    //         // No se recibió el parámetro del código, muestra la página "no existe"
    //         $this->loadBaseView('no_existe');
    //     }
    // }
    // public function index()
    // {
    //     $codigo = $this->input->get('codigo');
    //     $usuario = $this->session->userdata('Nombre_Usuario');

    //     // Verifica si se recibió el parámetro del código
    //     if (!empty($codigo)) {
    //         $codigo_existe = $this->validarCodigo($codigo);

    //         if ($codigo_existe) {
    //             // Obtén el estado del evento desde la base de datos
    //             $estado_evento = $this->evento_model->obtenerEstadoEvento($codigo);

    //             // Verifica si el estado del evento es igual a 1
    //             if ($estado_evento === 1) {

    //                 // Continúa con las demás validaciones
    //                 if ($this->lista_asistencia_model->existeCodigo($codigo)) {
    //                     $this->loadBaseView('error2');
    //                 } else {
    //                     $data = array(
    //                         'Codigo_Acceso' => $codigo,
    //                         'Usuario_Captura' => $usuario,
    //                     );
    //                     $this->lista_asistencia_model->insertarCodigo($data);
    //                     $this->loadBaseView('exito2');
    //                 }
    //             } else {
    //                 // El estado del evento es 0 (inactivo), redirige a la página "Evento inactivo"
    //                 $this->loadBaseView('evento_inactivo');
    //             }
    //         } else {
    //             $this->loadBaseView('no_existe');
    //         }
    //     } else {
    //         $this->loadBaseView('no_existe');
    //     }
    // }

    public function index()
    {
        $codigo = $this->input->get('codigo');
        $usuario = $this->session->userdata('Nombre_Usuario');

        // Verifica si se recibió el parámetro del código
        if (!empty($codigo)) {
            $codigo_existe = $this->validarCodigo($codigo);

            if ($codigo_existe) {
                // Obtén el estado del evento desde la base de datos
                $estado_evento = $this->evento_model->obtenerEstadoEvento($codigo);
                // Verifica si el estado del evento es igual a 1
                if ($estado_evento == 1) {
                    // Obtiene la fecha del evento desde la base de datos
                    $fecha_evento = $this->evento_model->obtenerFechaEvento($codigo);
                    // Obtiene la fecha actual
                    $fecha_actual = date('Y-m-d'); // Ajusta el formato de fecha según tus necesidad
                    // Compara la fecha del evento con la fecha actual
                    // print_r($fecha_evento);
                    // print_r($fecha_actual);
                    if ($fecha_evento === $fecha_actual) {
                        // Continúa con las demás va    lidaciones
                        if ($this->lista_asistencia_model->existeCodigo($codigo)) {
                            $this->loadBaseView('error2');
                        } else {
                            $data = array(
                                'Codigo_Acceso' => $codigo,
                                'Usuario_Captura' => $usuario,
                            );
                            $this->lista_asistencia_model->insertarCodigo($data);
                            $this->loadBaseView('exito2');
                        }
                    } else {
                        // La fecha del evento no es igual a la fecha actual, redirige a la página "Evento inactivo"
                        $this->loadBaseView('registro_cerrado');
                    }
                } else {
                    // El estado del evento es 0 (inactivo), redirige a la página "Evento inactivo"
                    $this->loadBaseView('evento_inactivo');
                }
            } else {
                $this->loadBaseView('no_existe');
            }
        } else {
            $this->loadBaseView('no_existe');
        }
    }


    private function validarCodigo($codigo)
    {
        // Consulta la tabla PersonaLista para verificar si el código existe
        $this->db->from('PersonaLista');
        $this->db->where('Codigo_Acceso', $codigo);
        $query = $this->db->get();

        return $query->num_rows() > 0; // Retorna true si hay al menos un resultado
    }
}
