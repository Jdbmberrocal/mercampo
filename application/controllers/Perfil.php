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

	public function calificar($idproductor)
	{
		$this->load->model('CalificacionModel');
		$this->load->library('form_validation');
		$data = array('app' => 'Perfil', 'pagina' => 'Calificar productor');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		$this->load->view('perfil/calificar');
		$this->load->view('include/footer');
	}

	public function calificar_productor()
	{
		$this->load->model('CalificacionModel');
		date_default_timezone_set("America/Bogota");
    	$this->load->library('form_validation');
        $idproducto = $this->input->post('idproducto');
        $idproductor = $this->input->post('idproductor');
        $estrellas = $this->input->post('optradio');
        $calificacion = $this->input->post('calificacion');
		$comentario = $this->input->post('comentario');

		$idproducto = _decode($idproducto);
		$idproductor = _decode($idproductor);
		$this->form_validation->set_rules("comentario","comentario","required|min_length[3]|max_length[255]|regex_match[/^[A-Z0-9 áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
		$this->form_validation->set_rules("calificacion","calificación","required|min_length[3]|max_length[255]|regex_match[/^[A-Z0-9 áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
		$this->form_validation->set_rules("optradio","estrellas","required|min_length[1]|max_length[2]|regex_match[/^[0-9]+$/i]|trim");
        //$this->form_validation->set_rules("idproducto","","required|min_length[3]|max_length[50]|alpha_numeric|trim");
        
        if($this->form_validation->run())
        {   
        	$data = array(
                'idproducto' => $idproducto,
                'idproductor' => $idproductor,
                'idcliente' => $this->session->idcliente,
                'comentario' => $comentario,
                'estrellas' => $estrellas,
                'calificacion' => $calificacion,
                'fecha' => date("Y-m-d h:i:sa"),
			);

			if($this->CalificacionModel->insertar($data))
			{
				redirect(base_url('perfil/calificar/'._encode($idproductor)));
			}else{
				redirect(base_url('perfil/calificar/'._encode($idproductor)));
			}
			
		}else{
			$this->calificar(_encode($idproductor));
		}
	}
    
}