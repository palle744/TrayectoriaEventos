
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class asistencia_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
    }


    public function index()
    {

        $data = array();
        $data['eventos'] = $this->db->get('EventoLista')->result_array();


        $this->loadBaseView('asistencia_view', $data);
    }

    public function obtenerGrafica()
    {
        $eventoSeleccionado = $this->input->post('evento');

        // Obtener los registros de asistencia desde la tabla ListaAsistencia

        $this->db->select('count(*) as totalAsistentes');
        $this->db->from('ListaAsistencia');
        $this->db->join('PersonaLista', 'ListaAsistencia.Codigo_Acceso = PersonaLista.Codigo_Acceso', 'left');
        $this->db->where('PersonaLista.Nombre_Evento', $eventoSeleccionado);
        $query = $this->db->get();
        $data = $query->result_array();
        // Obtener los registros de personas desde la tabla PersonaLista
        // $personas = $this->db->get('PersonaLista')->result();
        $this->db->select('Numero_Asistencia');
        $this->db->from('EventoLista');
        $this->db->where('Nombre_Evento', $eventoSeleccionado);
        $query = $this->db->get();
        $data2 = $query->result_array();

        // Contar las coincidencias entre los códigos de acceso en ambas tablas
        $asistentes = 0;
        $noAsistentes = 0;

        $noAsistentes = $data2[0]['Numero_Asistencia'] - $data[0]['totalAsistentes'];

        // Construir el arreglo de datos para la gráfica
        $data = [
            'asistentes' => $data[0]['totalAsistentes'],
            'noAsistentes' => $noAsistentes,
            'totalRegistros' => $data2[0]['Numero_Asistencia']
        ];

        echo json_encode($data);
    }

    public function obtenerRegistros()
    {
        $eventoSeleccionado = $this->input->post('evento');

        $this->db->select('Numero_Asistencia');
        $this->db->from('EventoLista');
        $this->db->where('Nombre_Evento', $eventoSeleccionado);
        $query = $this->db->get();
        $data = $query->result_array();
        //----
        $this->db->select('count(*) as totalRegistros');
        $this->db->from('PersonaLista');
        $this->db->where('Nombre_Evento', $eventoSeleccionado);
        $query = $this->db->get();
        $data2 = $query->result_array();
        // Obtener los registros de personas desde la tabla PersonaLista
        // $personas = $this->db->get('PersonaLista')->result();
        // $this->db->select('Numero_Asistencia');
        // $this->db->from('EventoLista');
        // $this->db->where('Nombre_Evento', $eventoSeleccionado);
        // $query = $this->db->get();
        // $data2 = $query->result_array();

        // Contar las coincidencias entre los códigos de acceso en ambas tablas
        $asistentes = 0;
        $noAsistentes = 0;

        $disponibles = $data[0]['Numero_Asistencia'] - $data2[0]['totalRegistros'];

        // Construir el arreglo de datos para la gráfica
        $datos = array(
            'asistentes' => $data[0]['Numero_Asistencia'],
            'noAsistentes' => $disponibles,
            'totalRegistros' => $data2[0]['totalRegistros']

        );

        echo json_encode($datos);
    }
}
