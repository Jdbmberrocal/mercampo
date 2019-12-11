<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function index()
	{
		//$this->load->model('ProductosModel');
		$data = array('app' => 'MerCampo', 'pagina' => 'Perfil');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		//$productos = array('productos' => $this->ProductosModel->getProductos());
		$this->load->view('perfil/perfil');
		$this->load->view('include/footer');
	}
	
	public function calificacion($idproductor)
	{
		$this->load->model('CalificacionModel');
		$data = array('app' => 'Perfil', 'pagina' => 'Calificación');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		$calificacion = array('calificacion' => $this->CalificacionModel->getCalificacionProductor(_decode($idproductor)));
		$this->load->view('perfil/calificacion', $calificacion);
		$this->load->view('include/footer');
	}
    
}