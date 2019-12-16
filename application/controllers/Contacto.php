<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

	public function index()
	{
		$data = array('app' => 'MerCampo', 'pagina' => 'Contáctos');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		$this->load->view('contacto/contacto');
		$this->load->view('include/footer');
    }
    
}