<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorUsuarios extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ModeloUsuarios');
	}

	public function index()
	{
		$this->load->view('componentes/header');
		$this->load->view('componentes/menu');
		$this->load->view('usuarios/vistausuarios');
		$this->load->view('componentes/footer');
	}

	public function tabla()
	{
		$data=$this->ModeloUsuarios->gettabla();
		echo json_encode($data);
	}

	public function guardar()
	{
		$data=$this->ModeloUsuarios->getguardar();
		echo json_encode($data);
    }
    
    public function nit()
	{
		$data=$this->ModeloUsuarios->getnit();
		echo json_encode($data);
    }
    
    public function tipo()
	{
		$data=$this->ModeloUsuarios->gettipo();
		echo json_encode($data);
	}

	
}
