<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorLogin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ModeloLogin');
	}

	public function index()
	{
		$this->load->view('vistalogin');
	}

	public function auth()
	{
		$email    = $this->input->post('email',TRUE);
		$password = md5($this->input->post('password',TRUE));

		$validate = $this->ModeloLogin->validate($email,$password);


		if($validate->num_rows() > 0)
		{
			$data  = $validate->row_array();
	
			$us_id  		= $data['us_id'];
			$us_nitempresa	= $data['us_nitempresa'];
			$us_usuario  	= $data['us_usuario'];
			$us_nombre		= $data['us_nombre'];
			$us_tipo 		= $data['us_tipo'];
			
			$sesdata = array(
				'us_id'  		=> $us_id,
				'us_nitempresa'	=> $us_nitempresa,
				'us_usuario'  	=> $us_usuario,
				'us_nombre'     => $us_nombre,
				'us_tipo'     	=> $us_tipo,
				'logged_in' 	=> TRUE
			);
			$this->session->set_userdata($sesdata);
			// access login for admin
			if($us_tipo === '1'){
				redirect('ControladorPage');
	
			// access login for staff
			}elseif($us_tipo === '2'){
				redirect('ControladorPage');
	
			// access login for author
			}else{
				redirect('ControladorPage');
			}
		}else{
			$this->session->set_flashdata("msg"," 
				<script>
					$(document).ready(function(){
						Notiflix.Report.Failure('ALERTA',
						'Algo salio mal revise el Usuario o contraseña',
						'OK');
					});
				</script>
				");
			redirect('ControladorLogin');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('ControladorLogin');
	}
}
