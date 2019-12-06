<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function index()
	{
		$data = array('app' => 'MerCampo', 'pagina' => 'Login');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		//$this->load->view('include/header');
		$this->load->view('login/index');
		$this->load->view('include/footer');
    }

    public function registrarse()
    {
        date_default_timezone_set("America/Bogota");
    	$this->load->library('form_validation');
    	$this->load->model('ClienteModel');
        $nombre = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $usuario = $this->input->post('usuario');
        $correo = $this->input->post('correo');
        $contrasena = $this->input->post('contrasena');
        $ccontrasena = $this->input->post('ccontrasena');
        $clave = hash_clave($contrasena);

        $this->form_validation->set_rules("nombre","nombre","required|min_length[3]|max_length[30]|regex_match[/^[A-Z0-9 áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
        $this->form_validation->set_rules("apellidos","apellidos","required|min_length[3]|max_length[50]|regex_match[/^[A-Z0-9 áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
        $this->form_validation->set_rules("usuario","usuario","required|regex_match[/^[A-Z0-9-_áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
        $this->form_validation->set_rules("correo","correo","required|valid_email|max_length[255]|trim");
        $this->form_validation->set_rules("contrasena","Contraseña","required|min_length[6]|max_length[20]|regex_match[/^[A-Z0-9 *#-_áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
        $this->form_validation->set_rules("ccontrasena","Confirmar Contraseña","required|matches[contrasena]|min_length[6]|max_length[20]|regex_match[/^[A-Z0-9 *#-_áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
        
        if($this->form_validation->run())
        {   
        	$data = array(
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'usuario' => $usuario,
                'correo' => $correo,
                'contrasena' => $clave,
                'rol' => 'cliente',
                'fecha' => date("Y-m-d h:i:sa"),
            );
        	if($this->ClienteModel->insertar($data))
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
                'nombre_error' => form_error('nombre'),
                'apellidos_error' => form_error('apellidos'),
                'usuario_error' => form_error('usuario'),
                'correo_error' => form_error('correo'),
                'ccontrasena_error' => form_error('ccontrasena'),
                'ccontrasena_error' => form_error('ccontrasena')
            );
        }
        echo json_encode($array);
    }

}