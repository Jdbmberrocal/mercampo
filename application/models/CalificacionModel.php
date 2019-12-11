<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalificacionModel extends CI_Model {

    public function insertar($data)
    {
        if($this->db->insert('calificacion',$data))
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
	public function getCalificacionProductor($idproductor='')
	{
		$datos = $this->db->query('SELECT c.idcalificacion, pr.nombre as "nombre_productor", pr.apellidos as "apellidos_productor", p.nombre as "producto", cl.nombre, cl.apellidos, c.calificacion, c.estrellas, c.comentario, c.fecha FROM calificacion c, productor pr, producto p, cliente cl WHERE pr.idproductor = c.idproductor AND p.idproducto = c.idproducto AND cl.idcliente = c.idcliente AND c.idproductor = "'.$idproductor.'" ');
		if($datos)
		{
			return $datos->result();
		}else{
			return FALSE;
		}

	}

	public function calificacion_positiva($idproductor ='')
	{
		$calificacion = $this->db->query('SELECT COUNT(calificacion) as "num_calificacion" FROM calificacion WHERE calificacion = "buena" AND idproductor = "'.$idproductor.'" ');
		if($calificacion)
		{
			return $calificacion->row();
		}else{
			return 0;
		}
		
	}

	public function calificacion_negativa($idproductor ='')
	{
		$calificacion = $this->db->query('SELECT COUNT(calificacion) as "num_calificacion" FROM calificacion WHERE calificacion = "mala" AND idproductor = "'.$idproductor.'" ');
		if($calificacion)
		{
			return $calificacion->row();
		}else{
			return 0;
		}
		
	}
}
