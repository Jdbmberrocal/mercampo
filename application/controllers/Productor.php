<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productor extends CI_Controller {

	public function index()
	{
		$data = array('app' => 'MerCampo', 'pagina' => 'Productor');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		$this->load->view('include/header');
		$this->load->view('inicio/index');
		$this->load->view('include/footer');
    }
    

    public function registrarse()
    {
        date_default_timezone_set("America/Bogota");
    	$this->load->library('form_validation');
    	$this->load->model('ProductorModel');
        $nombre = $this->input->post('nombrep');
        $apellidos = $this->input->post('apellidosp');
        $usuario = $this->input->post('usuariop');
        $correo = $this->input->post('correop');
        $contrasena = $this->input->post('contrasenap');
        $ccontrasena = $this->input->post('ccontrasenap');
        $clave = hash_clave($contrasena);

        $this->form_validation->set_rules("nombrep","nombre","required|min_length[3]|max_length[30]|regex_match[/^[A-Z0-9 áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
        $this->form_validation->set_rules("apellidosp","apellidos","required|min_length[3]|max_length[50]|regex_match[/^[A-Z0-9 áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
        $this->form_validation->set_rules("usuariop","usuario","required|regex_match[/^[A-Z0-9-_áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
        $this->form_validation->set_rules("correop","correo","required|valid_email|max_length[255]|trim");
        $this->form_validation->set_rules("contrasenap","Contraseña","required|min_length[6]|max_length[20]|regex_match[/^[A-Z0-9 *#-_áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
        $this->form_validation->set_rules("ccontrasenap","Confirmar Contraseña","required|matches[contrasenap]|min_length[6]|max_length[20]|regex_match[/^[A-Z0-9 *#-_áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
        
        if($this->form_validation->run())
        {   
        	$data = array(
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'usuario' => $usuario,
                'correo' => $correo,
                'contrasena' => $clave,
                'rol' => 'productor',
                'fecha' => date("Y-m-d h:i:sa"),
            );
        	if($this->ProductorModel->insertar($data))
        	{
                
        		$array = array(
	                'login' => 'exitoso',
	                'success' => '<div class="alert alert-success">Usuario registrado con exito </div>'
	            );
        	}else{
        		$array = array(
                	'success' => '<div class="alert alert-danger">Error al intentar registrar el usuario</div>'
            	);	
        	}
            
             
        }else{
            $array = array(
                'error'   => true,
                'nombrep_error' => form_error('nombrep'),
                'apellidosp_error' => form_error('apellidosp'),
                'usuariop_error' => form_error('usuariop'),
                'correop_error' => form_error('correop'),
                'contrasenap_error' => form_error('contrasenap'),
                'ccontrasenap_error' => form_error('ccontrasenap')
            );
        }
        echo json_encode($array);
    }
}
