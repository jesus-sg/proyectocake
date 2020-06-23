<?php
class ControladorPage extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE)
    {
      redirect('ControladorLogin');
    }
  }

  function index()
  {
    //Allowing akses to admin only
      if($this->session->userdata('us_tipo')==='1')
      {
          $this->load->view('componentes/header');
          $this->load->view('componentes/menu');
          $this->load->view('vistawelcome');
          $this->load->view('componentes/footer');
         
      }
      elseif($this->session->userdata('us_tipo')==='2')
      {
          $this->load->view('componentes/header');
          $this->load->view('componentes/menu');
          $this->load->view('vistawelcome');
          $this->load->view('componentes/footer');
      }
      elseif($this->session->userdata('us_tipo')==='3')
      {
          $this->load->view('componentes/header');
          $this->load->view('componentes/menu');
          $this->load->view('vistawelcome');
          $this->load->view('componentes/footer');
      }
      else
      {
        echo "Access Denied";
      }
  }

  /*function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('level')==='2'){
          $this->load->view('componentes/header');
          $this->load->view('componentes/menu');
          $this->load->view('dashboard_view');
          $this->load->view('componentes/footer');
    }else{
        echo "Access Denied";
    }
  }

  function author(){
    //Allowing akses to author only
    if($this->session->userdata('level')==='3'){
          $this->load->view('componentes/header');
          $this->load->view('componentes/menu');
          $this->load->view('dashboard_view');
          $this->load->view('componentes/footer');
    }else{
        echo "Access Denied";
    }
  }
*/
}
