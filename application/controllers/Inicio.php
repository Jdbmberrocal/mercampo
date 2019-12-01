<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$this->load->view('include/head');
		$this->load->view('include/menu');
		$this->load->view('include/header');
		$this->load->view('inicio/index');
		$this->load->view('include/footer');
	}
}
