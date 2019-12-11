<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

	/*public function index()
	{
		$data = array('app' => 'MerCampo', 'pagina' => 'Productor');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		$this->load->view('include/header');
		$this->load->view('inicio/index');
		$this->load->view('include/footer');
    }*/
    

    public function comentar()
    {
        date_default_timezone_set("America/Bogota");
    	$this->load->library('form_validation');
    	$this->load->model('ProductoModel');
        $comentario = $this->input->post('comentario');
        $idproducto = $this->input->post('idproducto');
        
        $this->form_validation->set_rules("comentario","comentario","required|min_length[3]|max_length[255]|regex_match[/^[A-Z0-9 áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
        //$this->form_validation->set_rules("idproducto","","required|min_length[3]|max_length[50]|alpha_numeric|trim");
        
        if($this->form_validation->run())
        {   
        	$data = array(
                'idproducto' => _decode($idproducto),
                'idcliente' => $this->session->idcliente,
                'comentario' => $comentario,
                'estado' => 'activo',
                'fecha' => date("Y-m-d h:i:sa"),
            );
        	if($this->ProductoModel->insertar($data))
        	{
                
        		$array = array(
	                'login' => 'exitoso',
	                'success' => '<div class="alert alert-success">Comentario exitoso </div>'
	            );
        	}else{
        		$array = array(
                	'success' => '<div class="alert alert-danger">Error al insertar el comentario!</div>'
            	);	
        	}
            
             
        }else{
            $array = array(
                'error'   => true,
                'comentario_error' => form_error('comentario')
            );
        }
        echo json_encode($array);
    }


    public function listado_comentarios($idproducto)
    {
        $this->load->model('ProductoModel');
        $comentarios = $this->ProductoModel->getListadoComentarios(_decode($idproducto));

        $html = '';

        foreach ($comentarios as $val) {
            $html .='<div class="media border p-3">
            <img src="http://localhost/mercampo/plantilla/img/yuca.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
            <div class="media-body">
            <h4>'.$val->nombre.' '.$val->apellidos.' <small><i>Posted on '.$val->fecha.'</i></small></h4>
            <p>'.$val->comentario.'</p>
            </div>
        </div>';

        }
        echo json_encode($html);
    }
}
