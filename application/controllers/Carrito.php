<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

	public function index()
	{
        //$this->load->model('ProductosModel');
        $this->load->library('cart');
		$data = array('app' => 'MerCampo', 'pagina' => 'Carrito');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		//$productos = array('productos' => $this->ProductosModel->getProductos());
		//$this->load->view('include/header');
		$this->load->view('carrito/carrito');
		$this->load->view('include/footer');
    }

    public function pedidos()
	{
        $this->load->model('VentasModel');
		$data = array('app' => 'Carrito', 'pagina' => 'Pedidos');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		//$productos = array('productos' => $this->ProductosModel->getProductos());
        //$this->load->view('include/header');
        if($this->session->rol == 'cliente')
        {
            $data['pedidos'] = $this->VentasModel->getPedidosCliente($this->session->idcliente);
            $this->load->view('carrito/pedidos_cliente', $data);
        }elseif($this->session->rol == 'productor')
        {
            $data['pedidos'] = $this->VentasModel->getPedidosProductor($this->session->idproductor);
            $this->load->view('carrito/pedidos_productor', $data);
        }
		
		$this->load->view('include/footer');
    }

    public function estado($idventa)
    {
        $this->load->model('VentasModel');
        $data = array(
            'estado '=>'0'
        );
        if($this->VentasModel->actualizar(_decode($idventa), $data))
        {
            redirect(base_url('carrito/pedidos'));
        }else{
            redirect(base_url('carrito/pedidos'));
        }
    }
    
    public function addcart()
    {
        $this->load->model('VentasModel');
        date_default_timezone_set("America/Bogota");
        $idproducto = $this->input->post('idproducto');
        $idcliente = $this->input->post('idcliente');
        $cantidad = $this->input->post('cantidad');
         
        $data = array(
                    'idproducto'      => _decode($idproducto),
                    'idcliente'     => $this->session->idcliente,
                    'cantidad'    => $cantidad,
                    'fecha'    => date("Y-m-d h:i:sa"),
            );
            $this->VentasModel->insertar($data);
        redirect(base_url('carrito/pedidos'));
    }

    
}
