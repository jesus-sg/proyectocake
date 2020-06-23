<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorClientes extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ModeloClientes');
	}

	public function index()
	{
		$this->load->view('componentes/header');
		$this->load->view('componentes/menu');
		$this->load->view('clientes/vistaclientes');
		$this->load->view('componentes/footer');
	}

	public function tabla()
	{
		$data=$this->ModeloClientes->gettabla();
		echo json_encode($data);
	}

	public function guardar()
	{
		$data=$this->ModeloClientes->getguardar();
		echo json_encode($data);
	}
	
	public function nit()
	{
		$data=$this->ModeloClientes->getnit();
		echo json_encode($data);
    }

	
}
