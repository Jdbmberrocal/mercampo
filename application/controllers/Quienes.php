<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quienes extends CI_Controller {

	public function index()
	{
		$data = array('app' => 'MerCampo', 'pagina' => 'Quienes Somos');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		$this->load->view('quienes/quienes_somos');
		$this->load->view('include/footer');
    }
    
}