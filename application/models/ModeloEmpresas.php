<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModeloEmpresas extends CI_Model
{
    function gettabla()
    {
        $this->db->select(' * ');
        $this->db->from('empresa');
       // $this->db->where('p.p_tipo',1);
        $rest=$this->db->get();
        return $rest->result();
    }

    function getguardar()
    {
        $opcion     =  $this->input->post('opcion');
        $id         =  $this->input->post('id');
        $nit        =  $this->input->post('nit');
        $nombre     =  $this->input->post('nombre');
        $direccion  =  $this->input->post('direccion');
        $ciudad     =  $this->input->post('ciudad');
        $pais       =  $this->input->post('pais');
        $telefono   =  $this->input->post('telefono');
        $correo     =  $this->input->post('correo');
        echo $estado     =  $this->input->post('estado');

        $usuario = $this->session->userdata('us_id');
        $fecha = date("Y-m-d h:i:s");

        switch($opcion){
            case 1:
                $this->db->select(' * ');
                $this->db->from('empresa');
                $this->db->where('em_nit',$nit);
                $rest=$this->db->get();
               
                if($rest->num_rows()==1)
                {
                    return 1;
                }else{
        
                    $data=array(
                        'em_nit'=>$nit,
                        'em_nombre'=>$nombre,
                        'em_direccion'=>$direccion,
                        'em_ciudad'=>$ciudad,
                        'em_pais'=>$pais,
                        'em_telefono'=>$telefono,
                        'em_correo'=>$correo,
                        'em_fechacrea'=>$fecha,
                        'em_fechamod'=>$fecha,
                        'em_usuariocrea'=>$usuario,
                        'em_usuariomod'=>$usuario,
                        'em_estado'=>1,
                    );
                
                    $sql_query=$this->db->insert('empresa',$data);
        
                    return 0;
                }            
                break;
            case 2:
                
                $data=array(
                    'em_nombre'=>$nombre,
                    'em_direccion'=>$direccion,
                    'em_ciudad'=>$ciudad,
                    'em_pais'=>$pais,
                    'em_telefono'=>$telefono,
                    'em_correo'=>$correo,
                    'em_fechamod'=>$fecha,
                    'em_usuariomod'=>$usuario,
                );
            
                $sql_query=$this->db->where('em_id', $id)->update('empresa', $data);
    
                return 2;
                break;      
                case 3:
                    
                    if($estado == 1){$valestado = 2; }else if($estado == 2){$valestado = 1;}
                    $data=array(
                        'em_fechamod'=>$fecha,
                        'em_usuariomod'=>$usuario,
                        'em_estado'=>$valestado,
                    );
                
                    $sql_query=$this->db->where('em_id', $id)->update('empresa', $data);

                    return 0;
                break;        
        }

       

    }
}