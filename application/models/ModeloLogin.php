<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class ModeloLogin extends CI_Model{

  function validate($email,$password){

   

    $this->db->select(' u.* ');
    $this->db->from('usuarios u');
    $this->db->join('empresa e', 'e.em_nit  = u.us_nitempresa');
    $this->db->where('u.us_usuario',$email);
    $this->db->where('u.us_password',$password);
    $this->db->where('u.us_estado',1);
    $this->db->where('e.em_estado',1);
    $rest=$this->db->get();
    return $rest;
  }

}
