<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/*public function index()
	{
		$this->load->model('ProductosModel');
		$data = array('app' => 'MerCampo', 'pagina' => 'Inicio');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		$productos = array('productos' => $this->ProductosModel->getProductos());
		$this->load->view('include/header');
		$this->load->view('inicio/index', $productos);
		$this->load->view('include/footer');
	}*/

	public function index($value='')
    {
            header("Location: ".base_url('inicio/post'));
    }

    public function post()
    {
		$this->load->model('ProductosModel');
		$this->load->library('pagination');
        $mostrar_por = 12;

        /*$data = array(
            'pagina' => 'Contabilidad',
            'app' => 'Mis Impuestos',
            'title' => '',
            'image' => '',
            'url' => $_SERVER['REQUEST_URI'],
            'site' => base_url(),
            'descripction' => '',
            'keywords' => 'Contabilidad, Decretos y leyes contables, Leyes, Decretos'
        );*/

        $data = array('app' => 'MerCampo', 'pagina' => 'Inicio');
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		$this->load->view('include/header');

        $config['base_url'] = base_url()."inicio/post/";
        $config['total_rows'] = $this->ProductosModel->num_post();
        $config['per_page'] = $mostrar_por;
        $config['uri_segment'] = 3;
        $config['num_links'] = 4;
        $config['full_tag_open'] ='<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';       
        $config['full_tag_close'] = '</ul></nav>';
        $config['attributes'] = array('class' => 'page-link');
        $config['first_link'] = 'First';        
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';        
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';//
        $config['prev_tag_open'] = '<li class="page-item">';        
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';//
        $config['next_tag_open'] = '<li>';        
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';        
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';        
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $result = $this->ProductosModel->get_pagination($config['per_page']);
        $data['productos'] = $result;
        $data['pagination'] = $this->pagination->create_links();
        
        $this->load->view('inicio/index', $data);
		$this->load->view('include/footer');
	}
	

	public function articulo($day='', $month='', $year='', $name='')
    {
		$this->load->model('ProductosModel');
		$this->load->model('CalificacionModel');
        //$fila = $this->post->getPostByName($id);
        $fila = $this->ProductosModel->getPostByYearAndName($day, $month, $year, urldecode($name));
        if($fila == null)
        {
                echo "<Error al cargar el post";
                return;
        }

        $cal_negativa = $this->CalificacionModel->calificacion_negativa($fila->idproductor);
        $cal_positiva = $this->CalificacionModel->calificacion_positiva($fila->idproductor);
        $total = $cal_negativa->num_calificacion + $cal_positiva->num_calificacion;
        $porcentaje_positivo = (100*$cal_positiva->num_calificacion)/$total;
        $porcentaje_negativo = (100*$cal_negativa->num_calificacion)/$total;
        
        $data = array(
			'app' => 'MerCampo', 
			'pagina' => $fila->nombre_producto,
            'idproducto' => $fila->idproducto,
            'idproductor' => $fila->idproductor,
			'nombre_productor' => $fila->nombre,
			'apellidos_productor' => $fila->apellidos,
			'imagen' => $fila->imagen,
			'precio' => $fila->precio,
            'cantidad' => $fila->cantidad,
            'descripcion' => $fila->descripcion,
            'porcentaje_pos' => $porcentaje_positivo, 
            'porcentaje_neg' => $porcentaje_negativo, 
		);
		$this->load->view('include/head', $data);
		$this->load->view('include/menu');
		//$this->load->view('include/header');
        $this->load->view('inicio/detalles', $data);
		$this->load->view('include/footer', $data);
    }
}
