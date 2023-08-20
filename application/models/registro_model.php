<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class registro_model extends CI_Model{
    function registro ($data){
        $resp = $this-> db -> insert ('PersonaLista', $data);

        return array(
            'ok' => isset($resp) ? true : false
        );
    }

    function registroAjax($curp, $arrData){
        $resp = $this->db->where($curp)->update('PersonaLista', $arrData);

        return array(
            'ok' => isset($resp) ? true : false
        );
    }

    public function guardarCodigoAcceso($data) {
        $this->db->insert('PersonaLista', $data);
    }
}

?>