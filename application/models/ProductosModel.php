<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosModel extends CI_Model {

	public function getProductos()
	{
		$this->db->select('idproducto, nombre, imagen, precio, fecha');
		$this->db->from('producto');
		$datos = $this->db->get();
		if($datos)
		{
			return $datos->result();
		}else{
			return false;
		}

	}

}
