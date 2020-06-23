<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModeloUsuarios extends CI_Model
{
    function gettabla()
    {
        $nitGeneral   = $this->session->userdata('us_nitempresa');
        $tipoGeneral   = $this->session->userdata('us_tipo');

        if($tipoGeneral == 1){
            $this->db->select(' u.*,
                        e.em_nombre AS nitnombre,
                        t.ti_nombre AS tiponombre,
                        IF(us_estado = 1,"ACTIVO",IF(us_estado = 2,"BLOQUEADO","")) AS estado1 ');
            $this->db->from('usuarios u');
            $this->db->join('empresa e', 'e.em_nit = u.us_nitempresa');
            $this->db->join('tipo t', 't.ti_id  = u.us_tipo');
            //$this->db->where('u.us_nitempresa',$nitGeneral);
            $rest=$this->db->get();
            return $rest->result();
        }else{
        
            $this->db->select(' u.*,
                                e.em_nombre AS nitnombre,
                                t.ti_nombre AS tiponombre,
                                IF(us_estado = 1,"ACTIVO",IF(us_estado = 2,"BLOQUEADO","")) AS estado1 ');
            $this->db->from('usuarios u');
            $this->db->join('empresa e', 'e.em_nit = u.us_nitempresa');
            $this->db->join('tipo t', 't.ti_id  = u.us_tipo');
            $this->db->where('u.us_nitempresa',$nitGeneral);
            $rest=$this->db->get();
            return $rest->result();
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

    function gettipo()
    {
        $searchTerm = $this->input->post('searchTerm');

        // Fetch users
        $this->db->select('ti_id ,ti_nombre');
        $this->db->where("ti_nombre like '%".$searchTerm."%' ");
        //$this->db->where("em_estado",1);
        $fetched_records = $this->db->get('tipo');
        $users = $fetched_records->result_array();
 
        // Initialize Array with fetched data
        $data = array();
        foreach($users as $user){
            $data[] = array("id"=>$user['ti_id'], "text"=>$user['ti_nombre']);
        }
        return $data;
    }

    function getguardar()
    {
        $opcion     =  $this->input->post('opcion');
        $id         =  $this->input->post('id');
        $nit        =  $this->input->post('nit');
        $usuario    =  $this->input->post('usuario');
        $nombre     =  $this->input->post('nombre');
        $tipo       =  $this->input->post('tipo');
        $direccion  =  $this->input->post('direccion');
        $ciudad     =  $this->input->post('ciudad');
        $pais       =  $this->input->post('pais');
        $telefono   =  $this->input->post('telefono');
        $correo     =  $this->input->post('correo');
        $estado     =  $this->input->post('estado');

        $usuario2   = $this->session->userdata('us_id');
        $fecha      = date("Y-m-d h:i:s");

        switch($opcion){
            case 1:
                $this->db->select(' * ');
                $this->db->from('usuarios');
                $this->db->where('us_usuario',$usuario);
                $rest=$this->db->get();
               
                if($rest->num_rows()==1)
                {
                    return 1;
                }else{
        
                    $data=array(
                        'us_nitempresa'=>$nit,
                        'us_usuario'=>$usuario,
                        'us_nombre'=>$nombre,
                        'us_password'=>md5($usuario),
                        'us_tipo'=>$tipo,
                        'us_telefono'=>$telefono,
                        'us_direccion'=>$direccion,
                        'us_ciudad'=>$ciudad,
                        'us_pais'=>$pais,
                        'us_correo'=>$correo,
                        'us_fechacrea'=>$fecha,
                        'us_fechamod'=>$fecha,
                        'us_usuariocrea'=>$usuario2,
                        'us_usuariomod'=>$usuario2,
                        'us_estado'=>1,
                    );
                
                    $sql_query=$this->db->insert('usuarios',$data);
        
                    return 0;
                }            
                break;
            case 2:
                
                $data=array(
                    'us_nitempresa'=>$nit,
                    'us_nombre'=>$nombre,
                    'us_tipo'=>$tipo,
                    'us_telefono'=>$telefono,
                    'us_direccion'=>$direccion,
                    'us_ciudad'=>$ciudad,
                    'us_pais'=>$pais,
                    'us_correo'=>$correo,
                    'us_fechamod'=>$fecha,
                    'us_usuariomod'=>$usuario2,
                );
            
                $sql_query=$this->db->where('us_id', $id)->update('usuarios', $data);
    
                return 2;
                break;      
                case 3:
                    
                    if($estado == 1){$valestado = 2; }else if($estado == 2){$valestado = 1;}
                    $data=array(
                        'us_fechamod'=>$fecha,
                        'us_usuariomod'=>$usuario2,
                        'us_estado'=>$valestado,
                    );
                
                    $sql_query=$this->db->where('us_id', $id)->update('usuarios', $data);

                    return 0;
                break;        
        }

       

    }
}