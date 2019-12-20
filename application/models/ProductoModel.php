<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductoModel extends CI_Model {

    public function getProductosProductor($idproductor)
    {
        $query = $this->db->query('SELECT * FROM producto where idproductor = "'.$idproductor.'"');
        if($query)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    public function insertar_productos($data)
    {
        if($this->db->insert('producto',$data))
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function eliminar($idproducto)
    {
        $this->db->where('idproducto',$idproducto);
        if ($this->db->delete('producto')) {
            return true;
        }else{
            return false;
        }
    }

    public function insertar($data)
    {
        if($this->db->insert('comentarios',$data))
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
	public function getListadoComentarios($idproducto)
    {
        $comentarios = $this->db->query('SELECT c.idcomentarios, cl.nombre, cl.apellidos, p.idproducto, c.comentario, c.fecha, c.estado FROM comentarios c, cliente cl, producto p WHERE cl.idcliente = c.idcliente AND p.idproducto = c.idproducto AND c.idproducto = "'.$idproducto.'" AND estado = "activo"');
        return $comentarios->result();
    }
}
