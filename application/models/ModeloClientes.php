<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModeloClientes extends CI_Model
{
    function gettabla()
    {
        $nitGeneral   = $this->session->userdata('us_nitempresa');
        $tipoGeneral   = $this->session->userdata('us_tipo');

        if($tipoGeneral == 1) {
            //$this->db->select(' c.*,
                        //e.em_nombre AS nitnombre,
                        //IF(cl_estado = 1,"ACTIVO",IF(cl_estado = 2,"BLOQUEADO","")) AS estado1 ');
            //$this->db->from('clientes c');
            //$this->db->join('empresa e', 'e.em_nit = c.cl_nitempresa');
            //$rest=$this->db->get();
            //return $rest->result();
            $this->db->select(' c.*,
                        e.em_nombre AS nitnombre,
                        IF(c.cl_estado = 1,"ACTIVO",IF(c.cl_estado = 2,"BLOQUEADO","")) AS estado1 ');
            $this->db->from('clientes c');
            $this->db->join('empresa e', 'e.em_nit = c.cl_nitempresa');
            $rest=$this->db->get();
            return $rest->result();
        }
        else {
            $this->db->select(' c.*,
                        e.em_nombre AS nitnombre,
                        IF(c.cl_estado = 1,"ACTIVO",IF(c.cl_estado = 2,"BLOQUEADO","")) AS estado1 ');
            $this->db->from('clientes c');
            $this->db->join('empresa e', 'e.em_nit = c.cl_nitempresa');
            $this->db->where('c.cl_nitempresa',$nitGeneral);
            $rest=$this->db->get();
            return $rest->result();

            //$this->db->select(' * ');
            //$this->db->from('clientes');
            //$rest=$this->db->get();
            //return $rest->result();
        }
    }

    function getnit()
    {
        $searchTerm = $this->input->post('searchTerm');

        // Fetch users
        $this->db->select('em_nit,em_nombre');
        $this->db->where("em_nombre like '%".$searchTerm."%' ");
        $this->db->where("em_estado",1);
        $fetched_records = $this->db->get('empresa');
        $users = $fetched_records->result_array();
 
        // Initialize Array with fetched data
        $data = array();
        foreach($users as $user){
            $data[] = array("id"=>$user['em_nit'], "text"=>$user['em_nombre']);
        }
        return $data;
    }

    function getguardar()
    {
        $opcion     =  $this->input->post('opcion');
        $id         =  $this->input->post('id');
        $nombre     =  $this->input->post('nombre');
        $documento  =  $this->input->post('documento');
        $direccion  =  $this->input->post('direccion');
        $email      =  $this->input->post('email');
        $barrio     =  $this->input->post('barrio');
        $telefono   =  $this->input->post('telefono');
        $nit        =  $this->input->post('nit');
        $estado     =  $this->input->post('estado');

        $usuario = $this->session->userdata('us_id');
        $fecha = date("Y-m-d h:i:s");

        switch($opcion){
            case 1:
                $this->db->select(' * ');
                $this->db->from('clientes');
                $this->db->where('cl_documento',$documento);
                $rest=$this->db->get();
               
                if($rest->num_rows()==1)
                {
                    return 1;
                }else{
        
                    $data=array(

                        'cl_nombre'=>$nombre,
                        'cl_documento'=>$documento,
                        'cl_direccion'=>$direccion,
                        'cl_email'=>$email,
                        'cl_barrio'=>$barrio,
                        'cl_telefono'=>$telefono,
                        'cl_nitempresa'=>$nit,
                        'cl_estado'=> 1,
                    );
                
                    $sql_query=$this->db->insert('clientes',$data);
        
                    return 0;
                }            
                break;
            case 2:
                
                $data=array(
                    'cl_nombre'=>$nombre,
                    'cl_documento'=>$documento,
                    'cl_direccion'=>$direccion,
                    'cl_email'=>$email,
                    'cl_barrio'=>$barrio,
                    'cl_telefono'=>$telefono,
                    'cl_nitempresa'=>$nit,
                    'cl_fechamod'=>$fecha,
                    'cl_usuariomod'=>$usuario,
                );
            
                $sql_query=$this->db->where('cl_id', $id)->update('clientes', $data);
    
                return 2;
                break;      
                case 3:
                    
                    if($estado == 1){$valestado = 2; }else if($estado == 2){$valestado = 1;}
                    $data=array(
                        'cl_fechamod'=>$fecha,
                        'cl_usuariomod'=>$usuario,
                        'cl_estado'=>$valestado,
                    );
                
                    $sql_query=$this->db->where('cl_id', $id)->update('clientes', $data);

                    return 0;
                break;        
        }

       

    }
}