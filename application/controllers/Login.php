<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data = array('app' => 'MerCampo', 'pagina' => 'Login');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		//$this->load->view('include/header');
		$this->load->view('login/index');
		$this->load->view('include/footer');
    }
    

    public function sesion()
    {
    	$this->load->library('form_validation');
    	$this->load->model('LoginModel');
        $usuario = $this->input->post('usuario');
        $clave = $this->input->post('clave');
        $rol = $this->input->post('rol');
        $clave = hash_clave($clave);

        $this->form_validation->set_rules("usuario","Usuario","required|alpha_numeric|trim");
        $this->form_validation->set_rules("clave","Contraseña","required|min_length[6]|max_length[20]|regex_match[/^[A-Z0-9 *#-_áéíóúñÑÁÉÍÓÚ]+$/i]|trim");
        $this->form_validation->set_rules("rol","Rol","required|min_length[7]|max_length[9]|alpha_numeric|trim");
        
        if($this->form_validation->run())
        {
            if($rol == "cliente")
            {
                $estudiante = $this->LoginModel->getDatosCliente($usuario,$clave);
                if($estudiante)
                {
                    $data = array(
                        'rol' => $estudiante->rol,
                        'usuario' => $estudiante->usuario,
                        'idcliente' => $estudiante->idcliente,
                        'login' => true
                    );
                    $this->session->set_userdata($data);
                    $array = array(
                        'login' => 'exitoso',
                        'rol'=>'cliente',
                        'success' => '<div class="alert alert-success">Login exitoso </div>'
                    );
                }else{
                    $array = array(
                        'success' => '<div class="alert alert-danger">Usuario y/o Contraseña incorrectos</div>'
                    );	
                }
            }else if($rol == "productor"){
                $productor = $this->LoginModel->getDatosProductor($usuario,$clave);
                if($productor)
                {
                    $data = array(
                        'rol' => $productor->rol,
                        'usuario' => $productor->usuario,
                        'idproductor' => $productor->idproductor,
                        'login' => true
                    );
                    $this->session->set_userdata($data);
                    $array = array(
                        'login' => 'exitoso',
                        'rol'=>'productor',
                        'success' => '<div class="alert alert-success">Login exitoso </div>'
                    );
                }else{
                    $array = array(
                        'success' => '<div class="alert alert-danger">Usuario y/o Contraseña incorrectos</div>'
                    );	
                }
            }   
        	
            
             
        }else{
            $array = array(
                'error'   => true,
                'usuario_error' => form_error('usuario'),
                'clave_error' => form_error('clave'),
                'rol_error' => form_error('rol'),
            );
        }
        echo json_encode($array);
    }


    public function logout()
    {
        $this->session->sess_destroy();
        header("Location: " . base_url());
    }
}
