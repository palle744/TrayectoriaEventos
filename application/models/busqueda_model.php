<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class busqueda_model extends CI_Model {

    public function obtener_datos() {
        $this->db->select('PersonaLista_Id, Nombre_Asistente, Correo_Electronico_Asistente, CURP_Asistente, Fecha_Captura');
        $this->db->from('PersonaLista');
        $query = $this->db->get();
        return $query->result();
    }
}
