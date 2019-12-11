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


    public function getPostByYearAndName($day='', $month='', $year='', $name='')
    {
        $result = $this->db->query("SELECT p.idproducto, pr.idproductor ,pr.nombre, pr.apellidos, p.nombre as nombre_producto, p.imagen, p.precio, p.cantidad, p.descripcion, p.fecha FROM producto p, productor pr WHERE pr.idproductor = p.idproductor  AND day(p.fecha) = '$day' AND month(p.fecha) = '$month' AND  year(p.fecha) = '$year' AND p.nombre LIKE '$name'");
        return $result->row();
    }
    

    public function num_post()
    {
        $number = $this->db->query("SELECT count(*) as number FROM producto")->row()->number;
        return intval($number);
    }

    public function get_pagination($number_per_page)
    {
        return $this->db->get("producto", $number_per_page, $this->uri->segment(3));
    }

}
