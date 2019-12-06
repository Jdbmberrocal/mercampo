<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$this->load->model('ProductosModel');
		$data = array('app' => 'MerCampo', 'pagina' => 'Inicio');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		$productos = array('productos' => $this->ProductosModel->getProductos());
		$this->load->view('include/header');
		$this->load->view('inicio/index', $productos);
		$this->load->view('include/footer');
	}
}
