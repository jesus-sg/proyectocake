<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorEmpresas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ModeloEmpresas');
	}

	public function index()
	{
		$this->load->view('componentes/header');
		$this->load->view('componentes/menu');
		$this->load->view('empresas/vistaempresas');
		$this->load->view('componentes/footer');
	}

	public function tabla()
	{
		$data=$this->ModeloEmpresas->gettabla();
		echo json_encode($data);
	}

	public function guardar()
	{
		$data=$this->ModeloEmpresas->getguardar();
		echo json_encode($data);
	}

	
}
