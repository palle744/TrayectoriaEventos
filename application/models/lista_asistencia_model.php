<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lista_asistencia_model extends CI_Model {

    public function insertarCodigo($codigo) {
        $data = array(
            'Codigo_Acceso' => $codigo
        );

        $this->db->insert('ListaAsistencia', $codigo);

        return ($this->db->affected_rows() > 0);
    }
    public function existeCodigo($codigo) {
        // Realiza una consulta para verificar si el código ya existe en la tabla ListaAsistencia
        $this->db->where('Codigo_Acceso', $codigo);
        $this->db->from('ListaAsistencia');
        $count = $this->db->count_all_results();

        // Devuelve true si el código existe, false en caso contrario
        return ($count > 0);
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

