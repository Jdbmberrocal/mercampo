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
    
    public function addcart()
    {
        $this->load->library('cart');
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $name = $this->input->post('name');
        $data = array(
            array(
                    'id'      => $id,
                    'qty'     => $qty,
                    'price'   => $price,
                    'name'    => $name
            )
        );
        
        $this->cart->insert($data);
        redirect(base_url('carrito'));
    }

    public function vaciar()
    {
        $this->load->library('cart');
        if($this->cart->destroy())
        {
            redirect(base_url('carrito'));
        }else{
            redirect(base_url('carrito'));
        }
    }

    public function prueba()
    {
        $this->load->helper('form');
        $this->load->library('cart');
        $this->load->view('carrito/prueba');
    }

    public function data()
    {
        $this->load->library('cart');
        $data = array(
            array(
                    'id'      => 'sku_123ABC',
                    'qty'     => 1,
                    'price'   => 39.95,
                    'name'    => 'T-Shirt',
                    'options' => array('Size' => 'L', 'Color' => 'Red')
            ),
            array(
                    'id'      => 'sku_567ZYX',
                    'qty'     => 1,
                    'price'   => 9.95,
                    'name'    => 'Coffee Mug'
            ),
            array(
                    'id'      => 'sku_965QRS',
                    'qty'     => 1,
                    'price'   => 29.95,
                    'name'    => 'Shot Glass'
            )
    );
    
    $this->cart->insert($data);
    }

    public function listado()
    {
        $this->load->library('cart');
        foreach($this->cart->get_item() as $b => $a )
        {
            echo $a['price'];
        }
        
    }
}
