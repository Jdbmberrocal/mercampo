<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentasModel extends CI_Model {

	public function insertar($data)
    {
        if($this->db->insert('ventas',$data))
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getPedidosCliente($idcliente = '')
    {
        $query = $this->db->query('SELECT v.idventas, p.nombre, p.precio, p.idproductor, p.idproducto, v.cantidad, v.fecha, v.estado FROM ventas v, producto p WHERE p.idproducto = v.idproducto AND idcliente = "'.$idcliente.'"');
        if($query)
        {
            return $query->result();
        }else{
            return false;
        }

    }

    public function actualizar($idventas, $data)
    {
        $this->db->where('idventas',$idventas);
        if ($this->db->update('ventas',$data)) {
            return true;
        }else{
            return false;
        }
    }

    public function getPedidosProductor($idproductor)
    {
        $query = $this->db->query('SELECT v.idventas, p.idproductor, p.nombre,p.precio, c.nombre, c.apellidos, v.cantidad, v.fecha, v.estado FROM ventas v, producto p, cliente c WHERE p.idproducto = v.idproducto AND c.idcliente = v.idcliente AND p.idproductor = "'.$idproductor.'"');
        if($query)
        {
            return $query->result();
        }else{
            return false;
        }
    }
}