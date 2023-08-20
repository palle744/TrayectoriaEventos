<?php
// aforo_model.php

class aforo_model extends CI_Model
{
    public function obtenerAforoEvento($Nombre_Evento)
    {
        $response = 0;
        $this->db->select('Numero_Asistencia');
        $this->db->from('EventoLista');
        $this->db->where('Nombre_Evento', $Nombre_Evento);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $evento = $query->row();
            $aforo = $evento->Numero_Asistencia;

            $response = $aforo;
        } else {
            $response = 0;
        }

        return $response;
    }
}
