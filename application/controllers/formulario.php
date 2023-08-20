
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Formulario extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('formulario_model');
        $this->load->library('session');
        $this->load->model('modificar_model');
        $this->load->model('eliminar_model');
        $this->load->library('form_validation');
        // $this->lang->load('form_validation', 'spanish');
        $this->load->helper('url');
        $this->load->library('session');
        // $usuario = $this->session->userdata('Nombre_Usuario');
        // if(!isset($usuario)){
        //     redirect(base_url());
        // }

    }

    public function index()
    {
        $this->loadBaseView('formulario');
        // $this->load->view('formulario');
    }


    public function crearevento()
    {
        $this->load->library('upload'); // Cargar la librería de carga de archivos

        $this->form_validation->set_rules('Nombre_Evento', 'Nombre del evento', 'required');
        $this->form_validation->set_rules('Fecha_Evento', 'Fecha del evento', 'required');
        $this->form_validation->set_rules('Numero_Asistencia', 'Número de asistencia', 'required|numeric');
        $this->form_validation->set_rules('Organizador_evento', 'Organizador del evento', 'required');
        $this->form_validation->set_rules('Descripcion_evento', 'Descripcion del evento', 'required');
        // $this->form_validation->set_rules('imagen', 'Imagen del evento', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            $resp = array(
                'ok' => false,
                'errors' => $errors
            );
            echo json_encode($resp);
            return false;
        }

        $Nombre_Evento = $this->input->post("Nombre_Evento");
        $Fecha_Evento = $this->input->post("Fecha_Evento");
        $Numero_Asistencia = $this->input->post("Numero_Asistencia");
        $Organizador_evento = $this->input->post("Organizador_evento");
        $Imagen_evento = $this->input->post("Imagen_evento");
        $Descripcion_evento = $this->input->post("Descripcion_evento");
        $resp = array(
            'ok' => true
        );

        $rutaImagen = '';

        // Validar que se haya cargado una imagen
        if (empty($_FILES['imagen']['name'])) {
            $resp = array(
                'ok' => false,
                'errors' => 'Debe cargar una imagen.'
            );
            echo json_encode($resp);
            return false;
        }

        // Configuración de la carga de archivos
        $config['upload_path'] = './Imagenes/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 5120; // 5MB

        $this->upload->initialize($config);

        if ($this->upload->do_upload('imagen')) {
            $upload_data = $this->upload->data();
            $rutaImagen = "Imagenes/" . $upload_data['file_name'];

            // Validar el tamaño del archivo
            if ($upload_data['file_size'] > $config['max_size'] * 1024) {
                $error = 'El tamaño de la imagen no puede ser mayor a 5MB.';
                $resp = array(
                    'ok' => false,
                    'errors' => $error
                );
                // Eliminar el archivo subido
                unlink($upload_data['full_path']);
                echo json_encode($resp);
                return false;
            }
        } else {
            $error = $this->upload->display_errors();
            $resp = array(
                'ok' => false,
                'errors' => $error
            );
            echo json_encode($resp);
            return false;
        }

        $timestamp = strtotime($Fecha_Evento);
        $Fecha_Evento = date('d/m/Y', $timestamp);

        if ($timestamp < time()) {
            $resp = array(
                'ok' => false,
                'errors' => 'La fecha del evento debe ser posterior a la fecha actual'
            );
            echo json_encode($resp);
            return false;
        }

        $datos = array(
            "Nombre_Evento" => $Nombre_Evento,
            "Fecha_Evento" => $Fecha_Evento,
            "Numero_Asistencia" => $Numero_Asistencia,
            "Organizador_evento" => $Organizador_evento,
            "Descripcion_evento" => $Descripcion_evento,
        );

        if (!empty($rutaImagen)) {
            $datos["Imagen_evento"] = $rutaImagen;
        }

        if ($resp['ok']) {
            $query = $this->formulario_model->guardar($datos);
            if (!$query['ok']) {
                $resp['ok'] = false;
                $resp['errors'] = 'Registro no válido';
            }
        }

        echo json_encode($resp);
    }


    public function modificar($id)
    {
        $evento = $this->usuarios_model->buscar_usuario($id);
        if ($evento) {
            // mostrar sus datos
            echo 'Nombre_Evento: ' . $evento->Nombre_Evento . '<br>';
        } else {

            echo 'Evento no encontrado.';
        }
    }
    public function admin()
    {
        $this->load->view('administrador');
    }

    public function cargar()
    {
        $this->load->database();
        $query = $this->db->query('SELECT EventoLista_Id, Nombre_Evento,Fecha_Evento,Organizador_evento,Descripcion_Evento, Numero_Asistencia,Fecha_Captura,Imagen_evento, EstadoEvento FROM EventoLista ORDER BY Fecha_Evento desc');
        $data = $query->result_array();
        // echo json_encode(array('data' => $data));
        echo json_encode(array('data' => $data,'total'=> $query->num_rows()));

    }
    



    public function editar()
    {
        $id = $this->input->post("id");
        $response = $this->modificar_model->consultarEvento($id);
        echo json_encode($response);
    }

    //     public function eliminar($id)
    // {
    //     $this->formulario_model->eliminar($id);
    //     redirect('formulario/index');
    // }
    public function eliminar()
    {
        $IdEvento = $this->input->post("eventoId");

        // Llama al método del modelo para eliminar el evento
        $response = $this->eliminar_model->eliminar($IdEvento);

        echo json_encode($response);
    }


    public function actualizar()

    {

        $IdEvento = $this->input->post("editarID");
        $NombreEvento = $this->input->post("editarNombre");
        $FechaEvento = $this->input->post("editarFecha");
        $OrganEvento = $this->input->post("editarOrga");
        $AsisteEvento = $this->input->post("editarAsis");
        $DescEvento = $this->input->post("editDescr");
        $ImgEvento = "editarImg";

        $this->form_validation->set_rules('editarNombre', 'Nombre del evento', 'required');
        $this->form_validation->set_rules('editarFecha', 'Fecha del evento', 'required');
        $this->form_validation->set_rules('editarOrga', 'Organizador del evento', 'required');
        $this->form_validation->set_rules('editarAsis', 'Número de asistencia', 'required|numeric');
        $this->form_validation->set_rules('editDescr', 'Descripción del evento', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            $resp = array(
                'ok' => false,
                'errors' => $errors
            );
            echo json_encode($resp);
            return false;
        }



        $config["upload_path"] = "./Imagenes/";
        $config["allowed_types"] = "jpg|jpeg|png";


        $timestamp = strtotime($FechaEvento);
        $Fecha_Evento = date('d/m/Y', $timestamp);

        $this->load->library("upload", $config);

        if ($this->upload->do_upload($ImgEvento)) {

            $imagencarga = array("imagen_data" => $this->upload->data());
            $datos = array(
                "Nombre_Evento" => $NombreEvento,
                "Fecha_Evento" => $Fecha_Evento,
                "Numero_Asistencia" => $AsisteEvento,
                "Organizador_evento" => $OrganEvento,
                "Descripcion_evento" => $DescEvento,
                "Imagen_evento" => "Imagenes/" . $imagencarga["imagen_data"]["file_name"],


            );

            $response = $this->modificar_model->actualizar($datos, $IdEvento);

            echo json_encode($response);
        } else {

            $datos = array(
                "Nombre_Evento" => $NombreEvento,
                "Fecha_Evento" => $Fecha_Evento,
                "Numero_Asistencia" => $AsisteEvento,
                "Organizador_evento" => $OrganEvento,
                "Descripcion_evento" => $DescEvento,
            );
            $response = $this->modificar_model->actualizar($datos, $IdEvento);
            //trim($response, '"');
            echo json_encode($response);
        }
    }
}
