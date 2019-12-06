<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClienteModel extends CI_Model {

    public function insertar($data)
    {
        if($this->db->insert('cliente',$data))
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
	public function getDatosUsuario($usuario='', $contrasena='')
	{
		$this->db->select('idproductor , usuario, rol');
		$this->db->from('productor');
		$this->db->where('usuario', $usuario);
		$this->db->where('contrasena', $contrasena);
		$datos = $this->db->get();
		if($datos)
		{
			return $datos->row();
		}else{
			return false;
		}

	}
}
