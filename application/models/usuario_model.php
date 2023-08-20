<?php 
if (! defined('BASEPATH')) exit('No direct script access allowed');

class usuario_model extends CI_Model {

    public $variable;
        
    

    public function login($usuario, $password) {
        
        $this->db->select('Nombre_Usuario, Pass_Usuario, UsuarioAcceso_Id, Rol_Usuario');
        $this->db->from('UsuarioAcceso');
        $this->db->where('Nombre_Usuario', $usuario);
        $this->db->where('Pass_Usuario', $password);

        $query = $this->db->get();
        return array(
            'total'=>$query->num_rows(),
            'datos'=>$query->row_array()
        );
    }
}
