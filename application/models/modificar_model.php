<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class modificar_model extends CI_Model
{

    public $variable;


    public function buscar_usuario($id)
    {
        $query = $this->db->get_where('Nombre_Evento', array('id' => $id));
        return $query->row();
    }

    public function consultarEvento($id)
    {
        $query = "Select EventoLista_Id, Nombre_Evento, Fecha_Evento, Numero_Asistencia, 
        Organizador_evento, Imagen_evento , Descripcion_Evento from EventoLista where EventoLista_Id = " . $id;
        $resultado = $this->db->query($query);
        return $resultado->row_array();
    }
    public function actualizar($data, $id){
        $this->db->where ("EventoLista_Id" , $id);
        $resultado = $this->db->update("EventoLista", $data);
        return $resultado;

    }
}
