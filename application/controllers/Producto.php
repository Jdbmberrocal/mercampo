<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function index()
	{
        if(!$this->session->userdata('login'))
        {
            header("Location: ".base_url());
        }
        $this->load->model('ProductoModel');
		$data = array('app' => 'Productos', 'pagina' => 'Mis Productos');
		$this->load->view('include/head', $data);
        $this->load->view('include/menu');
        $idproductor = $this->session->idproductor;
        $data['productos'] = $this->ProductoModel->getProductosProductor($idproductor);
		$this->load->view('producto/listar', $data);
		$this->load->view('include/footer');
    }

    public function nuevo()
    {
        if(!$this->session->userdata('login'))
        {
            header("Location: ".base_url());
        }
        $data = array('app' => 'Productos', 'pagina' => 'Nuevo producto');
        $this->load->library('form_validation');
		$this->load->view('include/head', $data);
        $this->load->view('include/menu');
		$this->load->view('producto/agregar', $data);
		$this->load->view('include/footer');
    }

    public function insertar()
    {
        if(!$this->session->userdata('login'))
        {
            header("Location: ".base_url());
        }
        date_default_timezone_set("America/Bogota");
        $this->load->model('ProductoModel');
        $this->load->library('form_validation');

        $nombre = $this->input->post("nombre",TRUE);
        $cantidad = $this->input->post("cantidad",TRUE);
        $precio = $this->input->post("precio",TRUE);
        $descripcion = $this->input->post("descripcion",TRUE);
        $imagen = '';

        $this->form_validation->set_rules("nombre","nombre","required|min_length[5]|max_length[255]|regex_match[/^[A-Z0-9 -_áéíóúñÑÁÉÍÓÚ]+$/i]");
        $this->form_validation->set_rules("cantidad","cantidad","required|min_length[1]|max_length[5]|numeric");
        $this->form_validation->set_rules("precio","precio","required|min_length[1]|max_length[8]|numeric");
        $this->form_validation->set_rules("descripcion","descripcion","required|min_length[5]|max_length[255]|regex_match[/^[A-Z0-9 -_áéíóúñÑÁÉÍÓÚ]+$/i]");

        if($this->form_validation->run())
        {
            $config['upload_path']          = './plantilla/img/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2000;
            $config['max_width']            = 1024;
            $config['max_height']           = 1024;
            $config['remove_spaces']        = true;
            $config['overwrite']        = true;

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('imagen'))
            {
                echo $error = array('error' => $this->upload->display_errors());
            }
            else
            {
                $imagen = $this->upload->data('file_name');
            }
            $data = array(
                'idproductor' => $this->session->idproductor,
                'nombre' => $nombre,
                'imagen' => $imagen,
                'precio' => $precio,
                'cantidad' => $cantidad,
                'descripcion' => $descripcion,
                'fecha' => date("Y-m-d")
            );
            $resp = $this->ProductoModel->insertar_productos($data);
            if($resp)
            {
                redirect(base_url('producto'));
            }else{
                redirect(base_url('producto/nuevo'));
            }
        }else{
            $this->nuevo();
        }
        
    }

    public function eliminar($idproducto)
    {
        if(!$this->session->userdata('login'))
        {
            header("Location: ".base_url());
        }
        $this->load->model('ProductoModel');
        if($this->ProductoModel->eliminar(_decode($idproducto)))
        {
            //unlink("./public/contabilidad/".$allimagen->imagen);
            redirect(base_url()."producto");
        }else{
            redirect(base_url()."producto");
        }
    }
    

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
