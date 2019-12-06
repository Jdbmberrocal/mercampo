<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function getDatosProductor($usuario='', $contrasena='')
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


	public function getDatosCliente($usuario='', $contrasena='')
	{
		$this->db->select('idcliente , usuario, rol');
		$this->db->from('cliente');
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
