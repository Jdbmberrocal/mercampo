<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	public function index()
	{
		$data = array('app' => 'MerCampo', 'pagina' => 'Preguntas frecuentes');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		$this->load->view('faq/preguntas_frecuentes');
		$this->load->view('include/footer');
    }
    
}